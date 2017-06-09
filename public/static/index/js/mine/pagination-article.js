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
                            'pgSize':4,
                        },
                        success:function(result){
                            if(result.status === 1){
                                $('#content').html('');
                                $.each(result.list,function (k,v) {
                                    $('#content').append('<article class="excerpt">'+
                                        '<header><a  class="label label-important" href="#">'+v.article_type+'<i class="label-arrow"></i></a><h2><a id="title" style="color: #00a67c;text-decoration: none;" target="_blank" href="'+location.protocol+'//'+window.location.host+'/d/'+v.id+'.volt">'+v.title+' </a></h2>'+
                                        '</header>'+
                                        '<div class="focus"><a target="_blank" href="'+location.protocol+'//'+window.location.host+'/d/'+v.id+'.volt"><img style="width: 200px;height: 123px" class="thumb" src="'+v.image_url+'"></a></div>'+
                                        '<span class="note">'+
                                        v.content+'......'+
                                    '</span>'+
                                    '<p class="auth-span">'+
                                        '<span class="muted"><i class="glyphicon glyphicon-user"></i> <a href="http://ihuiyi.cn/?author=1">'+v.author+'</a></span>'+
                                        '<span class="muted"><i class="glyphicon glyphicon-time"></i> '+v.create_time+'</span>	<span class="muted"><i class="glyphicon glyphicon-eye-open"></i> 26℃</span>	<span class="muted"><i class="glyphicon glyphicon-pencil"></i> <a target="_blank" href="http://ihuiyi.cn/?p=91#comments">2评论</a></span><span class="muted">'+
                                        '<a href="javascript:;" data-action="ding" data-id="91" id="Addlike" class="action"><i class="glyphicon glyphicon-heart"></i><span class="count">'+v.click+'</span>喜欢</a></span></p>'+
                                        '</article>');
                                })
                            }
                        }
                    });
                }
            }
        });
    });
});