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

});

