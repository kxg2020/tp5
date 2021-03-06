/**
 * Created by Administrator on 2017/5/24.
 */
$(function () {

    /**
     * 分页文章
     */
    layui.use(['laypage', 'layer'], function(){
        var laypage = layui.laypage,layer = layui.layer;
        laypage({
            cont: 'demo',
            skin:'#B0AD8F'
            ,pages: $('input[name = pages]').val()
            ,jump: function(obj, first){
                if(!first){
                    $.ajax({
                        'type':'post',
                        'dataType':'json',
                        'url':location.protocol+'//'+window.location.host+'/Article/index',
                        'data':{
                            'pgNum':obj.curr,
                            'pgSize':10,
                        },
                        success:function(result){
                            $('#sortable-todo').html('');
                            $.each(result.articles,function(k,v){
                                if(v.is_active == 1){
                                    $('#sortable-todo').append('<li class="clearfix"><span class="drag-marker"><i></i>'+ '</span>'+
                                        '<div class="todo-check pull-left">'+
                                        '<input type="checkbox" value="None" id="todo-check'+v.id+'">'+
                                        '<label for="todo-check'+v.id+'"></label>'+
                                        '</div>'+ '<p class="todo-title">'+v.title+'</p>'+ '<div class="todo-actionlist pull-right clearfix"><a href="#" class="todo-edit detail" data-id="'+v.id+'"><i class="icon-eye-open"></i></a><a href="'+location.protocol+'//'+window.location.host+'/Article/edit/id/'+v.id+ '" class="todo-edit" data-id="'+v.id+'"><i class="icon-pencil "></i></a> <a class="todo-remove" data-id="'+v.id+'"><i class="icon-remove icon-muted"></i></a> </div></li>'
                                    );
                                }

                            });
                        }
                    });
                }
            }
        });
    });

    /**
     * 文章详情
     */
    $('body').on('click','.detail',function () {

        var id = $(this).attr('data-id');

        //iframe层
        layer.open({
            type: 2,
            title: '文章预览',
            shadeClose: true,
            shade: 0.8,
            area: ['70%', '90%'],
            content: location.protocol+'//'+window.location.host+'/Article/detail/id/'+id //iframe的url
        });

    });
});