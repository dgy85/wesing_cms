define(function (require) {
    var contentEditor;

    require('lib/js/kindeditor/kindeditor-min.js');
    KindEditor.ready(function (K) {
        var items = ['source','fullscreen', 'undo', 'redo', 'justifyleft', 'justifycenter', 'justifyright',
            'justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent','forecolor', '|', 'title', 'fontname', 'fontsize', '|', 'textcolor', 'bgcolor', 'bold',
            'italic', 'underline', 'strikethrough', 'removeformat', '|', 'image', 'media', 'advtable', 'link', 'unlink']
        contentEditor = K.create('#art_content');
        contentEditor.items = items;
    });

    $('form').on('submit',function(e){
        e.preventDefault();
        var categoryid = $('#category option:selected').val();
        var arttitle = $('#art_title').val();
        var artdescription = $('#art_description').val();
        var categoryError = '';
        var arttitleError = '';

        if(!categoryid || !/^\d+$/.test(categoryid)){
            categoryError = '请选择分类';
        }

        if(arttitle.length<3 || arttitle.length > 100){
            arttitleError = '内容标题字符长度为3~100';
        }


        $('#category').next().children().text(categoryError);
        $('#art_title').next().children().text(arttitleError);

        if(categoryError || arttitleError) return;
        contentEditor.sync();
        $.post(
            PAGE_VAR.SITE_URL+'articles/save_art',
            $('form').serialize(),
            function (response) {
                if(response.responseCode==200){
                    return window.location.href=PAGE_VAR.SITE_URL+'articles';
                }
                layer.msg(response.responseMsg,{icon:2});
            },'json'
        );
    });
});