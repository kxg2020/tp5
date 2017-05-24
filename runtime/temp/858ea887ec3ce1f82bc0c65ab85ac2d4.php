<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:70:"D:\phpStudy\WWW\tp5\public/../application/admin\view\image\insert.html";i:1495619656;s:71:"D:\phpStudy\WWW\tp5\public/../application/admin\view\public\layout.html";i:1495603978;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <title>Macarinal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="/static/admin/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="/static/admin/css/thin-admin.css" rel="stylesheet" media="screen">
    <link href="/static/admin/css/font-awesome.css" rel="stylesheet" media="screen">
    <link href="/static/admin/style/style.css" rel="stylesheet">
    <link href="/static/admin/style/dashboard.css" rel="stylesheet">
    <link href="/static/base/layer/skin/default/layer.css" rel="stylesheet" media="screen">
    <link href="/static/base/layer/css/admin-layui.css" rel="stylesheet" media="screen">
    <link href="/static/admin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    
<link rel="stylesheet" href="/static/admin/css/mine/mine.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="/static/admin/assets/js/html5shiv.js"></script>
    <script src="/static/admin/assets/js/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<div class="container">
    <div class="top-navbar header b-b"> <a data-original-title="Toggle navigation" class="toggle-side-nav pull-left" href="#"><i class="icon-reorder"></i> </a>
        <div class="brand pull-left"> <a href="index.html"><img src="/static/admin/images/logo.png" width="147" height="33"></a></div>
        <ul class="nav navbar-nav navbar-right  hidden-xs">
            <li class="dropdown user  hidden-xs"> <a data-toggle="dropdown" class="dropdown-toggle" href="#"> <i class="icon-male"></i> <span class="username">John Doe</span> <i class="icon-caret-down small"></i> </a>
                <ul class="dropdown-menu">
                    <li><a href="user_profile.html"><i class="icon-user"></i> My Profile</a></li>
                    <li><a href="fullCalendar.html"><i class="icon-calendar"></i> My Calendar</a></li>
                    <li><a href="#"><i class="icon-tasks"></i> My Tasks</a></li>
                    <li class="divider"></li>
                    <li><a href="login.html"><i class="icon-key"></i> Log Out</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<div class="wrapper">
    <div class="left-nav">
        <div id="side-nav">
            <ul id="nav">
                <li class="current"> <a href="<?php echo url('Index/index'); ?>"> <i class="icon-dashboard"></i> 我的首页 </a> </li>
                <li> <a href="#"> <i class="icon-desktop"></i> 图片管理 <span class="label label-info pull-right"></span> <i class="arrow icon-angle-left"></i></a>
                    <ul class="sub-menu">
                        <li> <a href="<?php echo url('Image/index'); ?>"> <i class="icon-angle-right"></i> 图片列表 </a> </li>
                        <li> <a href="<?php echo url('Image/insert'); ?>"> <i class="icon-angle-right"></i> 图片添加 </a> </li>
                    </ul>
                </li>
                <li> <a href="#"> <i class="icon-edit"></i>  文章管理 <span class="label label-info pull-right"></span> <i class="arrow icon-angle-left"></i></a>
                    <ul class="sub-menu">
                        <li> <a href="<?php echo url('Article/index'); ?>"> <i class="icon-angle-right"></i> 文章列表 </a> </li>
                        <li> <a href="<?php echo url('Article/insert'); ?>"> <i class="icon-angle-right"></i> 文章添加</a> </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div class="page-content">

        
    <div class="content container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-title">Multiple File Upload <small>Multiple upload sample</small></h2>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="widget">
                    <div class="widget-header"> <i class="icon-external-link"></i>
                        <h3> 图片添加 </h3>
                    </div>
                    <div class="widget-content">



                        <div class="panel-body">
                            <div class="alert alert-info">
                                <i class="icon-info-sign"></i> 脸色苍白的伙伴
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            </div>
                            <p style="margin-bottom: 10px">第二天上学，我但心坐地虎阿龙会对我们实施报复，<br><br>但我的担心是多余的了，他没来找我们碴；<br><br>在走廊上擦肩而过，他都不敢抬眼来瞪我们；<br><br>操场上远远望见我们，他都宁愿绕个大圈避开。他害怕了，尽管他长和像头小公牛。我体会到，正义必然战胜邪恶。<br><br>
                                我不让史潜文替我背书包了。我坦白地告诉他，我只能砸断中间有裂纹的红砖，而且必须戴手套，他笑了，说他连有裂纹的红砖也砸不断。这倒是真话。<br><br>君子协定，每天下午放学后，史潜文帮我和张福庆补习数学，累了，我们就在操场上踢足球玩。我们班那些好汉当面笑我倒过来做了史潜文的伙伴。<br><br>我没生气，也没反驳。我觉得这种伙伴关系很无聊，没意思。史潜文说得对，我们是好同学、好朋友.</p>

                            <br>
                            <!-- The file upload form used as target for the file upload widget -->
                                <!-- Redirect browsers with JavaScript disabled to the origin page -->

                                <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                                <div class="row fileupload-buttonbar">
                                    <div class="col-lg-7">
                                        <div class="btn-toolbar">
                                            <!-- The fileinput-button span is used to style the file input field as button -->
                                            <span class="btn btn-success fileinput-button" style="position: relative">
                                        <i class="icon-plus"></i>
                                        <span>开始上传</span>
                                                <div id="shangChuan">
                                        <input type="file" name="files" id="file_upload" multiple="" style="opacity: 0;position: absolute;top: 0;left: 0;width: 100%;height: 100%;cursor: pointer">
                                                </div>
                                    </span>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <!-- The table listing the files available for upload/download -->
                                <table role="presentation" class="table table-striped">
                                    <tbody class="files"></tbody>
                                </table>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="progress progress-striped active" id="progress" style="display: none">
    <div class="progress-bar" role="progressbar"  aria-valuemin="0" aria-valuemax="100" style="width: 45%">
        <span class="sr-only" style="border: 1px solid red">4Complete</span>
    </div>
</div>

    </div>
</div>
<div class="bottom-nav footer"> 2013 &copy; Thin Admin by Riaxe Systems. </div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/static/admin/js/jquery.js"></script>
<script src="/static/admin/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/static/admin/js/smooth-sliding-menu.js"></script>
<script class="include" type="text/javascript" src="/static/admin/javascript/jquery191.min.js"></script>
<script class="include" type="text/javascript" src="/static/admin/javascript/jquery.jqplot.min.js"></script>
<script src="/static/admin/assets/sparkline/jquery.sparkline.js" type="text/javascript"></script>
<script src="/static/admin/assets/sparkline/jquery.customSelect.min.js" ></script>
<script src="/static/admin/assets/sparkline/sparkline-chart.js"></script>
<script src="/static/admin/js/select-checkbox.js"></script>

<!--switcher html start-->
<div class="demo_changer active" style="right: 0px;">
    <div class="demo-icon"></div>
    <div class="form_holder">
        <div class="predefined_styles"> <a class="styleswitch" rel="a" href=""><img alt="" src="/static/admin/images/a.jpg"></a> <a class="styleswitch" rel="b" href=""><img alt="" src="/static/admin/images/b.jpg"></a> <a class="styleswitch" rel="c" href=""><img alt="" src="/static/admin/images/c.jpg"></a> <a class="styleswitch" rel="d" href=""><img alt="" src="/static/admin/images/d.jpg"></a> <a class="styleswitch" rel="e" href=""><img alt="" src="/static/admin/images/e.jpg"></a> <a class="styleswitch" rel="f" href=""><img alt="" src="/static/admin/images/f.jpg"></a> <a class="styleswitch" rel="g" href=""><img alt="" src="/static/admin/images/g.jpg"></a> <a class="styleswitch" rel="h" href=""><img alt="" src="/static/admin/images/h.jpg"></a> <a class="styleswitch" rel="i" href=""><img alt="" src="/static/admin/images/i.jpg"></a> <a class="styleswitch" rel="j" href=""><img alt="" src="/static/admin/images/j.jpg"></a> </div>
    </div>
</div>

<!--switcher html end-->
<script src="/static/admin/assets/switcher/switcher.js"></script>
<script src="/static/admin/assets/switcher/moderziner.custom.js"></script>
<script src="/static/base/layer/layer.js"></script>
<script src="/static/base/layer/laypage.js"></script>
<script src="/static/base/layer/layui.js"></script>

<script src="/static/admin/js/jquery.html5upload.js"></script>
<script src="/static/admin/js/mine/mine.js"></script>

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
