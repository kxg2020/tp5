<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:69:"D:\phpStudy\WWW\tp5\public/../application/admin\view\video\index.html";i:1496735517;s:71:"D:\phpStudy\WWW\tp5\public/../application/admin\view\public\layout.html";i:1496730314;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <title>Macarinal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="/static/admin/favicon.ico"  rel="shortcut icon"  type="image/x-icon" >
    <link href="/static/admin/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="/static/admin/css/thin-admin.css" rel="stylesheet" media="screen">
    <link href="/static/admin/css/font-awesome.css" rel="stylesheet" media="screen">
    <link href="/static/admin/style/style.css" rel="stylesheet">
    <link href="/static/admin/style/dashboard.css" rel="stylesheet">
    <link href="/static/base/layer/skin/default/layer.css" rel="stylesheet" media="screen">
    <link href="/static/base/layer/css/admin-layui.css" rel="stylesheet" media="screen">
    <link href="/static/admin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="/static/admin/assets/js/html5shiv.js"></script>
    <script src="/static/admin/assets/js/respond.min.js"></script>
    <![endif]-->

</head>
<body style="position: relative">
<div class="container">
    <div class="top-navbar header b-b"> <a data-original-title="Toggle navigation" class="toggle-side-nav pull-left" href="#"><i class="icon-reorder"></i> </a>
        <div class="brand pull-left"> <a href="index.html"><img src="/static/admin/images/logo.png" width="147" height="33"></a></div>
        <ul class="nav navbar-nav navbar-right  hidden-xs">
            <li class="dropdown user  hidden-xs"> <a data-toggle="dropdown" class="dropdown-toggle" href="#"> <i class="icon-male"></i> <span class="username"><?php if(!empty($userInfo)): ?> <?php echo $userInfo['username']; endif; ?></span> <i class="icon-caret-down small"></i> </a>
                <ul class="dropdown-menu">
                    <li><a href="user_profile.html"><i class="icon-user"></i> My Profile</a></li>
                    <li><a href="fullCalendar.html"><i class="icon-calendar"></i> My Calendar</a></li>
                    <li><a href="#"><i class="icon-tasks"></i> My Tasks</a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo url('login/logout'); ?>"><i class="icon-key"></i>退出</a></li>
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

                <li> <a href="#"> <i class="icon-desktop"></i> 视频管理 <span class="label label-info pull-right"></span> <i class="arrow icon-angle-left"></i></a>
                    <ul class="sub-menu">
                        <li> <a href="<?php echo url('video/index'); ?>"> <i class="icon-angle-right"></i> 视频列表 </a> </li>
                        <li> <a href="<?php echo url('video/insert'); ?>"> <i class="icon-angle-right"></i> 视频添加 </a> </li>
                    </ul>
                </li>
                <li> <a href="#"> <i class="icon-desktop"></i> 网站配置 <span class="label label-info pull-right"></span> <i class="arrow icon-angle-left"></i></a>
                    <ul class="sub-menu">
                        <li> <a href="<?php echo url('Send/config'); ?>"> <i class="icon-angle-right"></i> 短信配置 </a> </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div class="page-content">

        

<div class="content container">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-title">Static Tables <small>Different variations</small></h2>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="widget">
                <div class="widget-header"> <i class="icon-table"></i>
                    <h3>视频列表</h3>
                </div>
                <div class="widget-content">
                    <div class="body">
                        <table class="table table-striped table-images">
                            <thead >
                            <tr >
                                <th >#</th>
                                <th>视频</th>
                                <th class="hidden-xs">创建时间</th>
                                <th class="hidden-xs">操作</th>
                            </tr>
                            </thead>
                            <tbody id="image_table">
                            <?php if(is_array($videos) || $videos instanceof \think\Collection || $videos instanceof \think\Paginator): $i = 0; $__LIST__ = $videos;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vi): $mod = ($i % 2 );++$i;?>
                            <tr>
                                <td style="line-height: 50px"><?php echo $vi['id']; ?></td>
                                <td style="line-height: 50px"><img style="height: 50px;width: 50px" src="<?php echo $vi['video_image']; ?>"></td>
                                <td style="line-height: 50px"> <?php echo date('Y-m-d H:i:s',$vi['create_time']); ?></td>
                                <td style="line-height: 50px"><a href="#"><input type="button" class="btn btn-danger delete" value="删除" data-id="<?php echo $vi['id']; ?>"></a></td>
                            </tr>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                            </tbody>
                        </table>
                        <?php echo $pages; ?>

                        <div class="clearfix">
                            <div class="pull-right">
                                <div class="btn-group">
                                     <span class="btn btn-success fileinput-button" style="position: relative">
                                        <i class="icon-plus"></i>
                                        <span>上传</span>
                                                <div id="shangChuan">
                                       <a href="<?php echo url('video/insert'); ?>">
                                           <input type="button"   style="opacity: 0;position: absolute;top: 0;left: 0;width: 100%;height: 100%;cursor: pointer">
                                       </a>
                                                </div>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

    </div>
</div>
<div class="bottom-nav footer" style="position: absolute;left: 0;bottom: -37px;"> 2017 &copy; Created by Macarinal.

</div>

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

<script src="/static/admin/js/mine/video-delete.js"></script>

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