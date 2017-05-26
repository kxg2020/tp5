/**
 * Created by Administrator on 2017/5/22.
 */
$(function () {
    $("#file_upload").h5upload({
        url: location.protocol+'//'+window.location.host+'/Image/upload',
        fileObjName: 'image',
        fileTypeExts: 'jpg,png,gif,bmp,jpeg',
        multi: true,
        accept: '*/*',
        fileSizeLimit: 1024 * 1024 * 1024 * 1024,
        formData: {
            type: 'card_positive'
        },
        onUploadProgress: function (file, uploaded, total) {
            $('#progress').css({'display':'block'});
            percent = 100 * (uploaded / total);
            $('.progress-bar').css('width',percent+'%');
        },
        onUploadSuccess: function (file, data) {
            data = $.parseJSON(data);
            if (data.status == 0) {
                layer.alert(data.msg, {time: 1000})
            }else {
                $('#progress').css({'display':'none'});
                $('.files').append('<tr class="template-download fade in" align="center" style="text-align: center">'+
                    '<td>'+
                    '<span class="preview">'+
                    '<a href="#"  data-gallery=""><img style="height: 50px;width: 50px" src="'+data.data.url+'"></a>'+
                    '</span>'+
                    '</td>'+
                    '<td>'+
                    '<p class="name">'+
                    '<a href="#"   data-gallery="">'+data.data.savename+'</a>'+
                '</p>'+
                '</td>'+
                '<td>'+
                '<p class="size">'+Math.round((data.data.size/1000))+'kb</p>'+
                '</td>'+
                '<td>'+'<p>'+
                '<button type="button" class="btn btn-danger delete" data-id="'+data.id+'">'+
                    '<i class="icon-trash"></i>'+
                    '<span>删除</span>'+
                    '</button>'
                    +'</p>'+
                    '</td>'+
                    '</tr>');
            }
        },
        onUploadError: function (file) {
            layer.msg('上传失败');
        }
    });


    /**
     * 点击删除图片
     */
    $('body').on('click','.delete',function () {

        var id = $(this).attr('data-id');
        $.ajax({
            'type':'post',
            'dataType':'json',
            'url':location.protocol+'//'+window.location.host+'/Image/delete',
            'data':{'id':id},
            success:function (e) {
                if(e.status == 1){
                    $(this).parent().parent().parent().remove();
                }
            }.bind(this)
        })
    });

    /**
     * 分页图片
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
                        'url':location.protocol+'//'+window.location.host+'/Image/index',
                        'data':{
                            'pgNum':obj.curr,
                            'pgSize':6,
                        },
                        success:function(result){
                            $('#image_table').html('');
                            $.each(result.list,function(k,v){
                                if(v.is_active == 1 && v.type == 1){
                                    $('#image_table').append('<tr >'+
                                        '<td>'+v.id+'</td>'+
                                        '<td><img style="height: 50px;width: 50px" src="'+v.image_url+'"></td>'+
                                        '<td>'+v.type+'</td>'+
                                        '<td>'+v.sort+'</td>'+
                                        '<td class="hidden-xs">'+'<span class="status" data-status="'+v.is_active+'" style="cursor: pointer" data-id="'+v.id+'"><span  style="cursor: pointer" class="icon-ok"></span></span>'+'</td>'+
                                        '<td class="hidden-xs"><span class="banner" data-id="'+v.id+'" data-status="'+v.type+'"><span style="cursor: pointer" class="icon-remove" data-id="'+v.id+'" data-status="'+v.type+'"></span></span></td>'+
                                        '<td class="hidden-xs">'+v.create_time+'</td>'+
                                        '<td class="hidden-xs">'+
                                        '<button data-toggle="button" data-id="'+v.id+'" class="btn btn-sm btn-warning image-delete"> 删除 </button></td>'+
                                        '</tr>'
                                    );
                                }
                                if(v.is_active == 1 && v.type == 2){
                                    $('#image_table').append('<tr >'+
                                        '<td>'+v.id+'</td>'+
                                        '<td><img style="height: 50px;width: 50px" src="'+v.image_url+'"></td>'+
                                        '<td>'+v.type+'</td>'+
                                        '<td>'+v.sort+'</td>'+
                                        '<td class="hidden-xs">'+'<span class="status" data-status="'+v.is_active+'" style="cursor: pointer" data-id="'+v.id+'"><span  style="cursor: pointer" class="icon-ok"></span></span>'+'</td>'+
                                        '<td class="hidden-xs"><span class="banner" data-id="'+v.id+'" data-status="'+v.type+'"><span style="cursor: pointer" class="icon-ok " ></span></span></td>'+
                                        '<td class="hidden-xs">'+v.create_time+'</td>'+
                                        '<td class="hidden-xs">'+
                                        '<button data-toggle="button" data-id="'+v.id+'" class="btn btn-sm btn-warning image-delete"> 删除 </button></td>'+
                                        '</tr>'
                                    );
                                }


                                if(v.is_active == 0 && v.type == 1){
                                    $('#image_table').append('<tr >'+
                                        '<td>'+v.id+'</td>'+
                                        '<td><img style="height: 50px;width: 50px" src="'+v.image_url+'"></td>'+
                                        '<td>'+v.type+'</td>'+
                                        '<td>'+v.sort+'</td>'+
                                        '<td class="hidden-xs">'+'<span class="status" data-status="'+v.is_active+'" style="cursor: pointer" data-id="'+v.id+'" ><span  style="cursor: pointer" class="icon-remove" ></span></span>'+'</td>'+'<td class="hidden-xs"><span class="banner" data-id="'+v.id+'" data-status="'+v.type+'"><span style="cursor: pointer" class="icon-remove" data-id="'+v.id+'" data-status="'+v.type+'"></span></span></td>'+
                                        '<td class="hidden-xs">'+v.create_time+'</td>'+
                                        '<td class="hidden-xs">'+
                                        '<button data-toggle="button" data-id="'+v.id+'" class="btn btn-sm btn-warning image-delete"> 删除 </button></td>'+
                                        '</tr>'
                                    );
                                }

                                if(v.is_active == 0 && v.type == 2){
                                    $('#image_table').append('<tr >'+
                                        '<td>'+v.id+'</td>'+
                                        '<td><img style="height: 50px;width: 50px" src="'+v.image_url+'"></td>'+
                                        '<td>'+v.type+'</td>'+
                                        '<td>'+v.sort+'</td>'+
                                        '<td class="hidden-xs">'+'<span class="status" data-status="'+v.is_active+'" style="cursor: pointer" data-id="'+v.id+'" ><span  style="cursor: pointer" class="icon-remove" ></span></span>'+'</td>'+'<td class="hidden-xs"><span class="banner" data-id="'+v.id+'" data-status="'+v.type+'"><span style="cursor: pointer" class="icon-ok " ></span></span></td>'+
                                        '<td class="hidden-xs">'+v.create_time+'</td>'+
                                        '<td class="hidden-xs">'+
                                        '<button data-toggle="button" data-id="'+v.id+'" class="btn btn-sm btn-warning image-delete"> 删除 </button></td>'+
                                        '</tr>'
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
     * 修改状态
     */
    $('body').on('click','.status',function () {
        status = $(this).attr('data-status');
        cstatus = 1 ^ status;
        id = $(this).attr('data-id');
        $.ajax({
            'type':'post',
            'dataType':'json',
            'url':location.protocol+'//'+window.location.host+'/Image/update',
            'data':{'is_active':status,'id':id},
            success:function (e) {
                if(e.status == 1){
                    if(status == 1){
                        $(this).attr({'data-status':cstatus});
                        $(this).html('<span style="cursor: pointer" class="icon-remove " ></span>');
                    }else {
                        $(this).attr({'data-status':cstatus});
                        $(this).html('<span style="cursor: pointer" class="icon-ok " ></span>');
                    }
                    layer.msg(e.msg,{time:300});
                }else {

                    layer.msg(e.msg);
                }
            }.bind(this)
        });
    });

    /**
     * 修改轮播
     */
    $('body').on('click','.banner',function () {
        status = $(this).attr('data-status');
        cstatus = 1 ^ status;
        id = $(this).attr('data-id');
        $.ajax({
            'type':'post',
            'dataType':'json',
            'url':location.protocol+'//'+window.location.host+'/Image/banner',
            'data':{'type':status,'id':id},
            success:function (e) {
                if(e.status == 1){
                    if(status == 2){
                        $(this).attr({'data-status':cstatus});
                        $(this).html('<span style="cursor: pointer" class="icon-remove " ></span>');
                    }else {
                        $(this).attr({'data-status':cstatus});
                        $(this).html('<span style="cursor: pointer" class="icon-ok " ></span>');
                    }
                    layer.msg(e.msg,{time:300});
                }else {

                    layer.msg(e.msg);
                }
            }.bind(this)
        });
    });

    /**
     * 删除图片
     */
    $('body').on('click','.image-delete',function () {
        var id = $(this).attr('data-id');
        $.ajax({
            'type':'post',
            'dataType':'json',
            'url':location.protocol+'//'+window.location.host+'/Image/delete',
            'data':{'id':id},
            success:function (e) {
                if(e.status == 1){
                    layer.msg(e.msg,{time:300},function () {
                    });
                }
            }.bind(this)
        })
    });
});

