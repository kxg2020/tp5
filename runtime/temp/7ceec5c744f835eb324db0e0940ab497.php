<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:69:"D:\phpStudy\WWW\tp5\public/../application/admin\view\login\index.html";i:1495781820;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <title>登录</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="/static/admin/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="/static/admin/css/thin-admin.css" rel="stylesheet" media="screen">
    <link href="/static/admin/css/font-awesome.css" rel="stylesheet" media="screen">
    <link href="/static/admin/style/style.css" rel="stylesheet">



</head>
<body>
<div class="login-logo">
    <img src="/static/admin/images/logo.png" width="147" height="33">
</div>

<div class="widget">
    <div class="login-content">
        <div class="widget-content" style="padding-bottom:0;">
            <form method="get" action="index.html" class="no-margin">
                <h3 class="form-title"></h3>

                <fieldset>
                    <div class="form-group no-margin">
                        <label for="username">用户</label>

                        <div class="input-group input-group-lg">
                                <span class="input-group-addon">
                                    <i class="icon-user"></i>
                                </span>
                            <input type="text" placeholder="请输入用户" name="username" class="form-control input-lg" id="username">
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="password">密码</label>

                        <div class="input-group input-group-lg">
                                <span class="input-group-addon">
                                    <i class="icon-lock"></i>
                                </span>
                            <input type="password" placeholder="请输入密码" class="form-control input-lg" id="password" name="password">
                        </div>

                    </div>

                    <div class="form-group no-margin">
                        <div class="input-group input-group-lg" style="display: inline-block">

                            <input style="border-radius: 3px" type="text" placeholder="请输入验证码" class="form-control input-lg" name="captcha">

                        </div>
                        <img style="height: 42px;width: 106px;border-radius: 3px;cursor: pointer" src="<?php echo url('login/captcha'); ?>" class="captcha">

                    </div>
                </fieldset>
                <div class="form-actions">
                    <label class="checkbox">
                        <div class="checker"><span><input type="checkbox" value="1" name="remember"></span></div> 记住我
                    </label>
                    <button class="btn btn-warning pull-right button" type="button">
                        登录 <i class="m-icon-swapright m-icon-white"></i>
                    </button>
                    <div class="forgot"><a href="#" class="forgot">忘记密码?</a></div>
                </div>


            </form>


        </div>
    </div>
</div>








<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/static/admin/js/jquery.js"></script>
<script src="/static/admin/js/bootstrap.min.js"></script>





<!--switcher html start-->
<div class="demo_changer active" style="right: 0px;">
    <div class="demo-icon"></div>
    <div class="form_holder">


        <div class="predefined_styles">
            <a class="styleswitch" rel="a" href=""><img alt="" src="/static/admin/images/a.jpg"></a>
            <a class="styleswitch" rel="b" href=""><img alt="" src="/static/admin/images/b.jpg"></a>
            <a class="styleswitch" rel="c" href=""><img alt="" src="/static/admin/images/c.jpg"></a>
            <a class="styleswitch" rel="d" href=""><img alt="" src="/static/admin/images/d.jpg"></a>
            <a class="styleswitch" rel="e" href=""><img alt="" src="/static/admin/images/e.jpg"></a>
            <a class="styleswitch" rel="f" href=""><img alt="" src="/static/admin/images/f.jpg"></a>
            <a class="styleswitch" rel="g" href=""><img alt="" src="/static/admin/images/g.jpg"></a>
            <a class="styleswitch" rel="h" href=""><img alt="" src="/static/admin/images/h.jpg"></a>
            <a class="styleswitch" rel="i" href=""><img alt="" src="/static/admin/images/i.jpg"></a>
            <a class="styleswitch" rel="j" href=""><img alt="" src="/static/admin/images/j.jpg"></a>
        </div>

    </div>
</div>


<!--switcher html end-->
<script src="/static/admin/assets/switcher/switcher.js"></script>
<script src="/static/admin/js/mine/login.js"></script>
<script src="/static/base/layer/layer.js"></script>
<script src="/static/admin/assets/switcher/moderziner.custom.js"></script>
<link href="/static/admin/assets/switcher/switcher.css" rel="stylesheet">
<link href="/static/admin/assets/switcher/switcher-defult.css" rel="stylesheet">
<link rel="alternate stylesheet" type="text/css" href="/static/admin/assets/switcher/a.css" title="a" media="all" />
<link rel="alternate stylesheet" type="text/css" href="/static/admin/assets/switcher/b.css" title="b" media="all" />
<link rel="alternate stylesheet" type="text/css" href="/static/admin/assets/switcher/c.css" title="c" media="all" />
<link rel="alternate stylesheet" type="text/css" href="/static/admin/assets/switcher/d.css" title="d" media="all" />
<link rel="alternate stylesheet" type="text/css" href="/static/admin/assets/switcher/e.css" title="e" media="all" />
<link rel="alternate stylesheet" type="text/css" href="/static/admin/assets/switcher/f.css" title="f" media="all" />
<link rel="alternate stylesheet" type="text/css" href="/static/admin/assets/switcher/g.css" title="g" media="all" />
<link rel="alternate stylesheet" type="text/css" href="/static/admin/assets/switcher/h.css" title="h" media="all" />
<link rel="alternate stylesheet" type="text/css" href="/static/admin/assets/switcher/i.css" title="i" media="all" />
<link rel="alternate stylesheet" type="text/css" href="/static/admin/assets/switcher/j.css" title="j" media="all" />
</body>
</html>