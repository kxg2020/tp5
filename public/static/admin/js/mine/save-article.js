/**
 * Created by Administrator on 2017/5/24.
 */
$(function () {
    $('.save-article').click(function () {

        /**
         * 获取纯文本
         */
        var content =  CKEDITOR.instances.ckeditor.document.getBody().getText();
        var title = $('input[name = title]').val();
        var is_top = $('input[name = is-top]:checked').val();
        var article_type = $('input[name = article-type]').val();
        var image_url = $('input[name = image_url]').val();

        /**
         * 获取标签文本
         */
        var html = CKEDITOR.instances.ckeditor.getData();

        if(content === '' || title === '' || html === ''){

            layer.msg('标题或内容不能为空',{time:800});
            return false;
        }
        if(image_url === ''){
            layer.msg('封面图不能为空',{time:800});
            return false;
        }

        if(article_type === ''){
            layer.msg('文章类型不能为空',{time:800});
            return false;
        }





        $.ajax({
            'type':'post',
            'dataType':'json',
            'url':location.protocol+'//'+window.location.host+'/Article/insert',
            'data':{'content':content,'title':title,'html':html,'is_top':is_top,
                'article_type':article_type,'image_url':image_url},
            success:function (e) {
                if(e.status ===1){

                    layer.msg(e.msg,{time:400},function () {
                        location.href = location.protocol+'//'+window.location.host+'/Article/index'
                    });
                }
            }
        })

    });

    /**
     * 文章类型
     */
    $('.article-type').click(function () {
        $('.crr-type').text($(this).text());
        $('input[name = article-type]').val($(this).text());
    });

    /**
     * 文章封面
     */

    $("#file_upload").h5upload({
        url: location.protocol+'//'+window.location.host+'/Article/uploadOne',
        fileObjName: 'image',
        fileTypeExts: 'jpg,png,gif,bmp,jpeg',
        multi: true,
        accept: '*/*',
        fileSizeLimit: 1024 * 1024 * 5,
        formData: {
            type: 'card_positive'
        },
        onUploadProgress: function (file, uploaded, total) {



        },
        onUploadSuccess: function (file, data) {
            data = $.parseJSON(data);
            if (data.status === 0) {
                layer.msg(data.msg, {time: 1000})
            }else {
                $('#cover').css({'display':'block','background':'url('+data.data.url+')'});
                $('input[name = image_url]').val(data.data.url);
            }
        },
        onUploadError: function (file) {
            layer.msg('上传失败');
        }
    });

});