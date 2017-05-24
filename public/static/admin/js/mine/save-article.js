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

        if(content == '' || title == ''){
            layer.msg('标题或内容不能为空',{time:800});return false;
        }

        /**
         * 获取标签文本
         */
        var html = CKEDITOR.instances.ckeditor.getData();

        $.ajax({
            'type':'post',
            'dataType':'json',
            'url':location.protocol+'//'+window.location.host+'/Article/insert',
            'data':{'content':content,'title':title},
            success:function (e) {
                if(e.status == 1){

                    layer.msg(e.msg,{time:400},function () {
                        location.href = location.protocol+'//'+window.location.host+'/Article/index'
                    });
                }
            }
        })

    });
});