define(function (require) {
    require('lib/js/kindeditor/kindeditor-min.js');
    KindEditor.ready(function (K) {
        var uploadmetabutton = K.uploadbutton({
            button : K('#uploadmetaButton')[0],
            fieldName : 'imgFile',
            url : '/assets/lib/js/kindeditor/php/upload_json.php?dir=image',
            afterUpload : function(data) {
                if (data.error === 0) {
                    var url = K.formatUrl(data.url, 'absolute');
                    K('#thub').val(url);
                } else {
                    alert(data.message);
                }
            },
            afterError : function(str) {
                alert('自定义错误信息: ' + str);
            }
        });
        uploadmetabutton.fileBox.change(function(e) {
            uploadmetabutton.submit();
        });
    });


    $('form').on('submit',function(e){
        e.preventDefault();
        var slidername = $('#slidername').val();
        var thub = $('#thub').val();
        var target = $('#target').val();
        var slidernameError = '';
        var thubError = '';
        var targetError = '';

        if(slidername.length<2 || slidername.length>20){
            slidernameError = '标题为2~20个字符';
        }
        if(thub.length==0){
            slidernameError = '请上传展示图片';
        }
        if(target.length<2 || target.length>200){
            target = '链接地址无效';
        }



        $('#slidername').next().children().text(slidernameError);
        $('#thub').next().children().text(thubError);
        $('#target').next().children().text(targetError);

        if(slidernameError || thubError || targetError) return;

        $.post(
            PAGE_VAR.SITE_URL+'slider/save_slider',
            $('form').serialize(),
            function (response) {
                if(response.responseCode==200){
                    return window.location.href=PAGE_VAR.SITE_URL+'slider';
                }
                layer.msg(response.responseMsg,{icon:2});
            },'json'
        );
    });
});