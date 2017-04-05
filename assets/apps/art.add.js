define(function (require) {
    require('lib/js/kindeditor/kindeditor-min.js');
    KindEditor.ready(function (K) {
        var contentEditor;
        var items = ['fullscreen', 'undo', 'redo', 'justifyleft', 'justifycenter', 'justifyright',
            'justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', '|', 'title', 'fontname', 'fontsize', '|', 'textcolor', 'bgcolor', 'bold',
            'italic', 'underline', 'strikethrough', 'removeformat', '|', 'image', 'media', 'advtable', 'link', 'unlink']
        contentEditor = K.create('#art_content');
        contentEditor.items = items;
    });

    $('form').on('submit',function(e){
        e.preventDefault();
        var categoryname = $('#categoryname').val();
        var sort = $('#sort').val();
        var categorynameError = '';
        var sortError = '';

        if(categoryname.length<2 || categoryname.length>20){
            categorynameError = '分类为2~20个字符';
        }

        if(!/^\d+$/.test(sort)){
            sortError = '排序只能为数字';
        }


        $('#categoryname').next().children().text(categorynameError);
        $('#sort').next().children().text(sortError);

        if(categorynameError || sortError) return;

        $.post(
            PAGE_VAR.SITE_URL+'category/add_category',
            $('form').serialize(),
            function (response) {
                if(response.responseCode==200){
                    return window.location.href=PAGE_VAR.SITE_URL+'category';
                }
                layer.msg(response.responseMsg,{icon:2});
            },'json'
        );
    });
});