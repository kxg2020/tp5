/**
 * Created by Administrator on 2017/6/6.
 */
$(function () {
    $('body').on('click','.delete',function () {
        var id = $(this).attr('data-id');
        $.ajax({type:'post',dataType:'json',url:location.protocol+'//'+window.location.host+'/video/delete',
            data:{'id':id},
            success:function (e) {

            if(e.status === 1){

                $(this).parent().parent().parent().remove();

            }
        }.bind(this)
        });

    });
});