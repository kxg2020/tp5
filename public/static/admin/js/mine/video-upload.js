/**
 * Created by Administrator on 2017/6/5.
 */
$(function () {
    var uploader = Qiniu.uploader({
        runtimes: 'html5,flash,html4', // 上传模式，依次退化
        browse_button: 'upload-video',       // 上传选择的点选按钮，必需
        container: 'btn-toolbar',        // 上传区域DOM ID，默认是browser_button的父元素
        filters : {                    // 可以使用该参数来限制上传文件的类型，大小等，该参数以对象的形式传入，它包括三个属性：
            max_file_size : '100mb',   // 最大文件体积限制
            prevent_duplicates: true,
            // Specify what files to browse for
            mime_types: [
                //{title : "flv files", extensions : "flv"}, // 文件上传
                {title : "Video files", extensions : "flv,mpg,mpeg,avi,wmv,mov,asf,rm,rmvb,mkv,m4v,mp4"} // 视频上传
                //{title : "Image files", extensions : "jpg,gif,png,jpeg"} // 图片上传

            ]
        },
        flash_swf_url: 'javascripts/Moxie.swf',   //引入flash，相对路径
        chunk_size: '4mb',                 // 分块上传时，每块的体积  不需要时就为0就可以了
        uptoken_url:location.protocol+'//'+window.location.host+'/video/token', // 获取上传token
        domain: "http://on58ea572.bkt.clouddn.com",   // bucket域名，下载资源时用到，必需
        get_new_uptoken: false,     // 设置上传文件的时候是否每次都重新获取新的uptoken
        auto_start: true,           // 选择文件后自动上传，若关闭需要自己绑定事件触发上传
        log_level: 5,
        multi_selection: false,     //是否允许同时选择多文件
        init: {
            'UploadProgress': function (up, file) {
                // 每个文件上传时，处理相关的事情
                $('.contain').css('display','block');
                // 修改进度条长度
                $('.uploadPro').css('width', file.percent + '%');
                // 修改进度条当前进度
                $('.uploadPro').attr('aria-valuenow', file.percent);
                // 修改显示内容
                $('.uploadPro').find('span').text(((file.speed/1024).toFixed(2)) + 'kb   ' + file.percent + '%');

            },
            'FileUploaded': function (up, file, info) {

                $('.contain').css('display','none');

                // 每个文件上传成功后，处理相关的事情
                var domain = up.getOption('domain');
                var res = JSON.parse(info);
                var videoLink = domain +"/"+ res.key;
                var videoImage = videoLink+'?vframe/jpg/offset/1/w/150/h/100';
                // 文件名
                var name = res.key;

                // 把视频地址保存到数据库
                $.ajax({
                    dataType:'json',
                    type:'post',
                    data:{'video_url':videoLink,'video_image':videoImage,'name':name},
                    async : false,
                    url:location.protocol+'//'+window.location.host+'/video/insert',
                });

               
                $('.video').append(' <tr align="center">'+
                    '<td  style="line-height: 100px"><img src="'+videoImage+'" alt=""></td>'+
                    '<td  style="line-height: 100px">'+videoLink+'</td>'+
                    '<td  style="line-height: 100px"><input type="button" class="btn btn-danger delete-video" value="删除"></td>'+
                    '</tr>')

            },
            'Error': function (up, err, errTip) {
                //上传出错时，处理相关的事情
                console.debug(errTip);
            }
        }
    });
});