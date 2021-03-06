/**
 * Created by Administrator on 2017/5/24.
 */
$(function () {
    $('.edit-article').click(function () {

        var id = $('input[name = article-id]').val();

        var is_top = $('input[name = is-top]:checked').val();
        /**
         * 获取纯文本
         */
        var content =  CKEDITOR.instances.ckeditor.document.getBody().getText();
        var title = $('input[name = title]').val();
        /**
         * 获取标签文本
         */
        var html = CKEDITOR.instances.ckeditor.getData();

        if(content == '' || title == '' || html == ''){

            layer.msg('标题或内容不能为空',{time:800});
            return false;
        }



        $.ajax({
            'type':'post',
            'dataType':'json',
            'url':location.protocol+'//'+window.location.host+'/Article/update',
            'data':{'content':content,'title':title,'html':html,'id':id,'is_top':is_top},
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
