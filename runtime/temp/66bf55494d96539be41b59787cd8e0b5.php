<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:69:"D:\phpStudy\WWW\tp5\public/../application/index\view\about\index.html";i:1498009658;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>

<link rel="stylesheet" href="/static/base/datepiker/dateRange.css">
<link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

<body>

<div class="ta_date" id="div-date" style=";height: 32px;padding-top: 5px">
    <span class="date_title" id="date" style=""></span>

    <a class="opt_sel" id="input-trigger" href="#">

        <i class="i_orderd"></i>
    </a>
   <div><?php echo $articles->render(); ?></div>
</div>
<input type="button" id="btn" value="点击跨域请求">
<input type="button" id="bto" value="点击异步请求">
<form action="<?php echo url('about/example'); ?>" method="post">
    账号:<input type="text" name="username" value="">
    密码:<input type="text" name="password" value="">
    <input type="submit" value="点击提交">
</form>

</body>
<script src="/static/index/js/jquery.js"></script>
<script src="/static/base/datepiker/dateRange.js"></script>

<script>
    var yesterday = '2017/01/01';
    var time=new Date();
    var now=time.getFullYear()+'-'+(time.getMonth()+1)+'-'+time.getDate();
    var dateRange = new pickerDateRange('date', {
        isTodayValid : true,
        startDate : yesterday,
        endDate : now,
        needCompare : false,
        defaultText : ' 至 ',
        autoSubmit : true,
        inputTrigger : 'input-trigger',
        theme : 'ta',
        success : function(obj) {
            console.log(endDate);

        }
    });
</script>

<script>

    /**
     * jsonp跨域
     */
    $("#btn").click(function(k) {
        $.ajax({
        type: 'GET',  //这里用GET
        url: location.protocol+'//'+'backend.macarin.cn/about/example',
        dataType: 'jsonp',  //类型
        data: {'name':'kxg2020'},
        jsonp: 'callback', //jsonp回调参数，必需.
        jsonpCallback:'jsonpCallBack',
        async: false,
        success: function(result){
        alert('实现了跨域请求,结果:名字是'+result.author);
        },
        timeout: 3000
        })

    });


    /**
     * ajax请求
     */
    $('#bto').click(function () {
        $.ajax({
            type: 'post',  //这里用GET
            url: location.protocol+'//'+'backend.macarin.cn/about/example',
            dataType: 'json',  //类型
            data: {'name':'张三'},
            success: function(result){
                console(result);return; //回调输出
            },
            timeout: 3000
        })
    });
</script>
</html>