/**
 * Created by Administrator on 2017/6/1.
 */
$(function(){
    layui.use(['laypage', 'layer'], function(){
        var laypage = layui.laypage,layer = layui.layer;
        laypage({
            cont: 'demo'
            ,pages: $('input[name = pages]').val()
            ,skip: true
            ,jump: function(obj, first){
                if(!first){
                    $.ajax({
                        'type':'post',
                        'dataType':'json',
                        'url':location.protocol+'//'+window.location.host+'/a',
                        'data':{
                            'pgNum':obj.curr,
                            'pgSize':10,
                        },
                        success:function(result){
                            if(result.status === 1){
                                $('#lists').html('');
                                $.each(result.list,function (k,v) {

                                    $('#lists').append('<li >'+
                                        '<h2 style="margin-top: 10px;border-bottom: 1px dotted #aeaeae">'+
                                        '<a   href="'+location.protocol+'//'+window.location.host+'/d/'+v.id+'.volt"  title="">'+
                                        '<span>【原创】'+v.title+'</span>'+
                                    '</a>'+
                                    '<span><a href="'+location.protocol+'//'+window.location.host+'/d/'+v.id+'.volt"><img src="http://js.bokee.com/newbokee_home/default/images/pl_list_pic.png" title="此博文包含图片" alt="此博文包含图片"></a></span>'+
                                        '<span style="float: right">'+v.create_time+'</span>'+
                                    '</h2>'+
                                    '</li>');
                                })
                            }
                        }
                    });
                }
            }
        });
    });
});