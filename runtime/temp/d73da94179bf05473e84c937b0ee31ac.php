<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:69:"D:\phpStudy\WWW\tp5\public/../application/admin\view\index\index.html";i:1495428669;s:71:"D:\phpStudy\WWW\tp5\public/../application/admin\view\public\layout.html";i:1496649087;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <title>

</title>
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
            </ul>
        </div>
    </div>
    <div class="page-content">

        

        <div class="content container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-title">Dashboard <small>Statistics and more</small></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-3 col-xs-12 col-sm-6"> <a href="#" class="stats-container">
                            <div class="stats-heading">Profit</div>
                            <div class="stats-body-alt">

                                <div class="text-center"><span class="text-top">$</span>345</div>
                                <small>+4.7% from last period</small> </div>
                            <div class="stats-footer">more info</div>
                        </a> </div>
                        <div class="col-md-3 col-xs-12 col-sm-6"> <a href="#" class="stats-container">
                            <div class="stats-heading">Revenue</div>
                            <div class="stats-body-alt">

                                <div class="text-center"><span class="text-top">$</span>34.7k</div>
                                <small>-14.7% from last week</small> </div>
                            <div class="stats-footer">go to account</div>
                        </a> </div>
                        <div class="col-md-3 col-xs-12 col-sm-6"> <a href="#" class="stats-container">
                            <div class="stats-heading">Members</div>
                            <div class="stats-body-alt">

                                <div class="text-center"><span class="text-top"></span>207</div>
                                <small>new user registered</small> </div>
                            <div class="stats-footer">manage members</div>
                        </a> </div>
                        <div class="col-md-3 col-xs-12 col-sm-6"> <a href="#" class="stats-container">
                            <div class="stats-heading">Orders</div>
                            <div class="stats-body-alt">

                                <div class="text-center"><span class="text-top">$</span>345</div>
                                <small>new orders received</small> </div>
                            <div class="stats-footer">manage orders</div>
                        </a> </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="widget">
                        <div class="widget-header"> <i class="icon-bookmark"></i>
                            <h3>Important Shortcuts</h3>
                        </div>
                        <!-- /widget-header -->
                        <div class="widget-content">
                            <div class="shortcuts"> <a class="shortcut" href="javascript:;"><i class="shortcut-icon icon-list-alt"></i><span class="shortcut-label">Apps</span> </a><a class="shortcut" href="javascript:;"><i class="shortcut-icon icon-bookmark"></i><span class="shortcut-label">Fav</span> </a><a class="shortcut" href="javascript:;"><i class="shortcut-icon icon-signal"></i> <span class="shortcut-label">Stats</span> </a><a class="shortcut" href="javascript:;"> <i class="shortcut-icon icon-comment"></i><span class="shortcut-label">Msg</span> </a><a class="shortcut" href="javascript:;"><i class="shortcut-icon icon-user"></i><span class="shortcut-label">Users</span> </a><a class="shortcut" href="javascript:;"><i class="shortcut-icon icon-file"></i><span class="shortcut-label">Notes</span> </a><a class="shortcut" href="javascript:;"><i class="shortcut-icon icon-picture"></i> <span class="shortcut-label">Photos</span> </a><a class="shortcut" href="javascript:;"> <i class="shortcut-icon icon-tag"></i><span class="shortcut-label">Tags</span> </a> </div>
                            <!-- /shortcuts -->
                        </div>
                        <!-- /widget-content -->
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="widget-container">
                        <div class="padded"> <a href="#" class="pull-right"><i class="icon-map-marker"></i></a> <span class="h4">McLean, VA</span>
                            <div class="text-center padder m-t"> <span class="h1"><i class="icon-cloud text-muted"></i> 68A</span> </div>
                        </div>
                        <div class="widget-footer lt">
                            <div class="row">
                                <div class="col-xs-4"> <small class="text-muted block">Humidity</small> <span>56 %</span> </div>
                                <div class="col-xs-4"> <small class="text-muted block">Precip.</small> <span>0.00 in</span> </div>
                                <div class="col-xs-4"> <small class="text-muted block">Winds</small> <span>7 mp</span> </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget-container">
                        <div class="panel-body"> <a class="thumb pull-left m-r" href="#"> <img class="img-circle" src="images/user.jpg"></a>
                            <div class="clear"> <a class="text-info" href="#">@John Doe <i class="icon-twitter"></i></a> <small class="block text-muted">7,257 followers / 342 tweets</small> <a class="btn btn-xs btn-info m-t-xs" href="#">Follow</a> </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-4">
                    <!--new earning start-->
                    <div class="panel terques-chart">
                        <div class="panel-body chart-texture">
                            <div class="chart">
                                <div class="heading"> <span>Friday</span> <strong>$ 48,00 | 13%</strong> </div>
                                <div class="sparkline" data-type="line" data-resize="true" data-height="90" data-width="90%" data-line-width="1" data-line-color="#fff" data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff" data-spot-radius="4" data-data="[200,135,667,333,526,996,564,123,890,564,455]"></div>
                            </div>
                        </div>
                        <div class="chart-tittle"> <span class="title">New Earning</span> <span class="value-pie"> <a href="#" class="active">Market</a> | <a href="#">Referal</a> | <a href="#">Online</a> </span> </div>
                    </div>
                    <!--new earning end-->
                </div>
                <div class="col-lg-4">
                    <!--total earning start-->
                    <div class="panel green-chart">
                        <div class="panel-body">
                            <div class="chart">
                                <div class="heading"> <span>June</span> <strong>18 Days | 55%</strong> </div>
                                <div id="barchart"></div>
                            </div>
                        </div>
                        <div class="chart-tittle"> <span class="title">Total Earning</span> <span class="value-pie">$, 85,34,577</span> </div>
                    </div>
                    <!--total earning end-->
                </div>
                <div class="col-lg-4">
                    <!--pie chart start-->
                    <div class="panel">
                        <div class="panel-body text-center">
                            <div class="chart" style="height: 110px;">
                                <div id="pie-chart" ></div>
                            </div>
                        </div>
                        <div class="chart-tittle"> Free: 240GB </div>
                    </div>
                    <!--pie chart start-->
                </div>
            </div>






            <div class="row">
                <div class="col-lg-6">
                    <div class="widget">
                        <div class="widget-header"> <i class="icon-check"></i>
                            <h3>To Do List </h3>
                        </div>
                        <div class="widget-content">
                            <ul class="to-do-list ui-sortable" id="sortable-todo">
                                <li class="clearfix"> <span class="drag-marker"> <i></i> </span>
                                    <div class="todo-check pull-left">
                                        <input type="checkbox" value="None" id="todo-check">
                                        <label for="todo-check"></label>
                                    </div>
                                    <p class="todo-title"> Lorem ipsum dolor sit amet, consectetuer adipiscing </p>
                                    <div class="todo-actionlist pull-right clearfix"> <a href="#" class="todo-done"><i class="icon-ok"></i></a> <a href="#" class="todo-edit"><i class="icon-pencil"></i></a> <a class="todo-remove"><i class="icon-remove icon-muted"></i></a></div>
                                </li>
                                <li class="clearfix"><span class="drag-marker"> <i></i> </span>
                                    <div class="todo-check pull-left">
                                        <input type="checkbox" value="None" id="todo-check1">
                                        <label for="todo-check1"></label>
                                    </div>
                                    <p class="todo-title"> Lorem ipsum dolor sit amet, consectetuer adipiscing </p>
                                    <div class="todo-actionlist pull-right clearfix"> <a href="#" class="todo-done"><i class="icon-ok"></i></a> <a href="#" class="todo-edit"><i class="icon-pencil"></i></a> <a class="todo-remove"><i class="icon-remove icon-muted"></i></a> </div>
                                </li>
                                <li class="clearfix"><span class="drag-marker"> <i></i> </span>
                                    <div class="todo-check pull-left">
                                        <input type="checkbox" value="None" id="todo-check2">
                                        <label for="todo-check2"></label>
                                    </div>
                                    <p class="todo-title"> Lorem ipsum dolor sit amet, consectetuer adipiscing </p>
                                    <div class="todo-actionlist pull-right clearfix"> <a href="#" class="todo-done"><i class="icon-ok"></i></a> <a href="#" class="todo-edit"><i class="icon-pencil"></i></a> <a class="todo-remove"><i class="icon-remove icon-muted"></i></a> </div>
                                </li>
                                <li class="clearfix"><span class="drag-marker"> <i></i> </span>
                                    <div class="todo-check pull-left">
                                        <input type="checkbox" value="None" id="todo-check3">
                                        <label for="todo-check3"></label>
                                    </div>
                                    <p class="todo-title"> Lorem ipsum dolor sit amet, consectetuer adipiscing </p>
                                    <div class="todo-actionlist pull-right clearfix"> <a href="#" class="todo-done"><i class="icon-ok"></i></a> <a href="#" class="todo-edit"><i class="icon-pencil"></i></a> <a class="todo-remove"><i class="icon-remove icon-muted"></i></a> </div>
                                </li>
                                <li class="clearfix"><span class="drag-marker"> <i></i> </span>
                                    <div class="todo-check pull-left">
                                        <input type="checkbox" value="None" id="todo-check4">
                                        <label for="todo-check4"></label>
                                    </div>
                                    <p class="todo-title"> Lorem ipsum dolor sit amet, consectetuer adipiscing </p>
                                    <div class="todo-actionlist pull-right clearfix"> <a href="#" class="todo-done"><i class="icon-ok"></i></a> <a href="#" class="todo-edit"><i class="icon-pencil"></i></a> <a class="todo-remove"><i class="icon-remove icon-muted"></i></a> </div>
                                </li>
                                <li class="clearfix"><span class="drag-marker"> <i></i> </span>
                                    <div class="todo-check pull-left">
                                        <input type="checkbox" value="None" id="todo-check5">
                                        <label for="todo-check5"></label>
                                    </div>
                                    <p class="todo-title"> Lorem ipsum dolor sit amet, consectetuer adipiscing </p>
                                    <div class="todo-actionlist pull-right clearfix"> <a href="#" class="todo-done"><i class="icon-ok"></i></a> <a href="#" class="todo-edit"><i class="icon-pencil"></i></a> <a class="todo-remove"><i class="icon-remove icon-muted"></i></a> </div>
                                </li>
                            </ul>
                            <div class="todo-action-bar">
                                <!--row start-->
                                <div class="row">
                                    <div class="col-xs-3 btn-todo-select">
                                        <button type="submit" class="btn btn-default"><i class="icon-ok"></i> Select All</button>
                                    </div>
                                    <div class="col-xs-6 todo-search-wrap">
                                        <input type="text" class="form-control todo-search pull-right" placeholder=" Search">
                                    </div>
                                    <div class="col-xs-3 btn-add-task">
                                        <button type="submit" class="btn btn-default btn-danger"><i class="icon-plus"></i> Add Task</button>
                                    </div>
                                </div>
                                <!--row end-->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="widget">
                        <div class="widget-header"> <i class="icon-edit"></i>
                            <h3>User Account</h3>
                        </div>
                        <!-- /widget-header -->
                        <div class="widget-content">
                            <div class="table-responsive" style="overflow-x:auto">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th width="6%"><input type="checkbox" id="select-all"></th>
                                        <th width="22%">User ID</th>
                                        <th width="50%">Email Address</th>
                                        <th width="22%">Status</th>
                                    </tr>
                                    </thead>
                                    <form></form>
                                    <tbody class="selects">
                                    <tr>
                                        <td><input type="checkbox" class="checkbox1"></td>
                                        <td>Dean</td>
                                        <td><a class="__cf_email__" href="/cdn-cgi/l/email-protection" data-cfemail="90f4f5f1fef5d0e9f1f8ffffbef3fffd">[email&#160;protected]</a><script data-cfhash='f9e31' type="text/javascript">/* <![CDATA[ */!function(t,e,r,n,c,a,p){try{t=document.currentScript||function(){for(t=document.getElementsByTagName('script'),e=t.length;e--;)if(t[e].getAttribute('data-cfhash'))return t[e]}();if(t&&(c=t.previousSibling)){p=t.parentNode;if(a=c.getAttribute('data-cfemail')){for(e='',r='0x'+a.substr(0,2)|0,n=2;a.length-n;n+=2)e+='%'+('0'+('0x'+a.substr(n,2)^r).toString(16)).slice(-2);p.replaceChild(document.createTextNode(decodeURIComponent(e)),c)}p.removeChild(t)}}catch(u){}}()/* ]]> */</script></td>
                                        <td><span class="label label-success">Approved</span></td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" class="checkbox1"></td>
                                        <td>Peter</td>
                                        <td><a class="__cf_email__" href="/cdn-cgi/l/email-protection" data-cfemail="4a3a2f3e2f38390a26233c2f64292527">[email&#160;protected]</a><script data-cfhash='f9e31' type="text/javascript">/* <![CDATA[ */!function(t,e,r,n,c,a,p){try{t=document.currentScript||function(){for(t=document.getElementsByTagName('script'),e=t.length;e--;)if(t[e].getAttribute('data-cfhash'))return t[e]}();if(t&&(c=t.previousSibling)){p=t.parentNode;if(a=c.getAttribute('data-cfemail')){for(e='',r='0x'+a.substr(0,2)|0,n=2;a.length-n;n+=2)e+='%'+('0'+('0x'+a.substr(n,2)^r).toString(16)).slice(-2);p.replaceChild(document.createTextNode(decodeURIComponent(e)),c)}p.removeChild(t)}}catch(u){}}()/* ]]> */</script></td>
                                        <td><span class="label label-info">Pending</span></td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" class="checkbox1"></td>
                                        <td>Nathan</td>
                                        <td><a class="__cf_email__" href="/cdn-cgi/l/email-protection" data-cfemail="cda3acb9a5aca3a18daaa0aca4a1e3aea2a0">[email&#160;protected]</a><script data-cfhash='f9e31' type="text/javascript">/* <![CDATA[ */!function(t,e,r,n,c,a,p){try{t=document.currentScript||function(){for(t=document.getElementsByTagName('script'),e=t.length;e--;)if(t[e].getAttribute('data-cfhash'))return t[e]}();if(t&&(c=t.previousSibling)){p=t.parentNode;if(a=c.getAttribute('data-cfemail')){for(e='',r='0x'+a.substr(0,2)|0,n=2;a.length-n;n+=2)e+='%'+('0'+('0x'+a.substr(n,2)^r).toString(16)).slice(-2);p.replaceChild(document.createTextNode(decodeURIComponent(e)),c)}p.removeChild(t)}}catch(u){}}()/* ]]> */</script></td>
                                        <td><span class="label label-warning">Suspended</span></td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" class="checkbox1"></td>
                                        <td>Steven</td>
                                        <td><a class="__cf_email__" href="/cdn-cgi/l/email-protection" data-cfemail="d6a5a2b3a0b3b8a596b9a3a2bab9b9bdf8b5b9bb">[email&#160;protected]</a><script data-cfhash='f9e31' type="text/javascript">/* <![CDATA[ */!function(t,e,r,n,c,a,p){try{t=document.currentScript||function(){for(t=document.getElementsByTagName('script'),e=t.length;e--;)if(t[e].getAttribute('data-cfhash'))return t[e]}();if(t&&(c=t.previousSibling)){p=t.parentNode;if(a=c.getAttribute('data-cfemail')){for(e='',r='0x'+a.substr(0,2)|0,n=2;a.length-n;n+=2)e+='%'+('0'+('0x'+a.substr(n,2)^r).toString(16)).slice(-2);p.replaceChild(document.createTextNode(decodeURIComponent(e)),c)}p.removeChild(t)}}catch(u){}}()/* ]]> */</script></td>
                                        <td><span class="label label-danger">Blocked</span></td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" class="checkbox1"></td>
                                        <td>Graeme</td>
                                        <td><a class="__cf_email__" href="/cdn-cgi/l/email-protection" data-cfemail="31564350545c544271565c50585d1f525e5c">[email&#160;protected]</a><script data-cfhash='f9e31' type="text/javascript">/* <![CDATA[ */!function(t,e,r,n,c,a,p){try{t=document.currentScript||function(){for(t=document.getElementsByTagName('script'),e=t.length;e--;)if(t[e].getAttribute('data-cfhash'))return t[e]}();if(t&&(c=t.previousSibling)){p=t.parentNode;if(a=c.getAttribute('data-cfemail')){for(e='',r='0x'+a.substr(0,2)|0,n=2;a.length-n;n+=2)e+='%'+('0'+('0x'+a.substr(n,2)^r).toString(16)).slice(-2);p.replaceChild(document.createTextNode(decodeURIComponent(e)),c)}p.removeChild(t)}}catch(u){}}()/* ]]> */</script></td>
                                        <td><span class="label label-info">Pending</span></td>
                                    </tr>

                                    <tr>
                                        <td><input type="checkbox" class="checkbox1"></td>
                                        <td>Peter</td>
                                        <td><a class="__cf_email__" href="/cdn-cgi/l/email-protection" data-cfemail="b3c3d6c7d6c1c0f3dfdac5d69dd0dcde">[email&#160;protected]</a><script data-cfhash='f9e31' type="text/javascript">/* <![CDATA[ */!function(t,e,r,n,c,a,p){try{t=document.currentScript||function(){for(t=document.getElementsByTagName('script'),e=t.length;e--;)if(t[e].getAttribute('data-cfhash'))return t[e]}();if(t&&(c=t.previousSibling)){p=t.parentNode;if(a=c.getAttribute('data-cfemail')){for(e='',r='0x'+a.substr(0,2)|0,n=2;a.length-n;n+=2)e+='%'+('0'+('0x'+a.substr(n,2)^r).toString(16)).slice(-2);p.replaceChild(document.createTextNode(decodeURIComponent(e)),c)}p.removeChild(t)}}catch(u){}}()/* ]]> */</script></td>
                                        <td><span class="label label-success">Approved</span></td>
                                    </tr>

                                    </tbody>

                                    <tfoot>
                                    <tr class="active">
                                        <td colspan="4" class="text-left table-bg"><label for="action" style="margin-bottom:0">Action </label>
                                            <select name="action">
                                                <option value="Edit">Edit </option>
                                                <option value="Aprove">Aprove </option>
                                                <option value="Move">Move </option>
                                                <option value="Delete">Delete </option>
                                            </select></td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>


                        </div>
                        <!-- /widget-content -->
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-6">
                    <div class="widget">
                        <div class="widget-header"> <i class="icon-file"></i>
                            <h3>Chats</h3>
                        </div>
                        <div class="widget-content">
                            <div class="timeline-messages">
                                <!-- Comment -->
                                <div class="msg-time-chat"> <a href="#" class="message-img"><img class="avatar" src="images/avatar.jpg" alt=""></a>
                                    <div class="message-body msg-in"> <span class="arrow"></span>
                                        <div class="text">
                                            <p class="attribution"><a href="#">John Doe</a> at 1:55pm, 13th April 2013</p>
                                            <p>Hello, How are you brother?</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- /comment -->

                                <!-- Comment -->
                                <div class="msg-time-chat"> <a href="#" class="message-img"><img class="avatar" src="images/avatar.jpg" alt=""></a>
                                    <div class="message-body msg-out"> <span class="arrow"></span>
                                        <div class="text">
                                            <p class="attribution"> <a href="#">Dale Steyn</a> at 2:01pm, 13th April 2013</p>
                                            <p>I'm Fine, Thank you. What about you? How is going on?</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- /comment -->

                                <!-- Comment -->
                                <div class="msg-time-chat"> <a href="#" class="message-img"><img class="avatar" src="images/avatar.jpg" alt=""></a>
                                    <div class="message-body msg-in"> <span class="arrow"></span>
                                        <div class="text">
                                            <p class="attribution"><a href="#">John Doe</a> at 2:03pm, 13th April 2013</p>
                                            <p>Yeah I'm fine too. Everything is going fine here.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="msg-time-chat"> <a href="#" class="message-img"><img class="avatar" src="images/avatar.jpg" alt=""></a>
                                    <div class="message-body msg-out"> <span class="arrow"></span>
                                        <div class="text">
                                            <p class="attribution"><a href="#">Dale Steyn</a> at 2:05pm, 13th April 2013</p>
                                            <p>well good to know that. anyway how much time you need to done your task?</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- /comment -->

                            </div>
                            <div class="chat-form">
                                <div class="input-cont">
                                    <input type="text" placeholder="Type a message here...">
                                </div>
                                <div class="btn-cont"> <a class="btn btn-warning" href="javascript:;">Send</a> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="widget widget-table action-table">
                        <div class="widget-header"> <i class="icon-th-list"></i>
                            <h3>A Table Example</h3>
                        </div>
                        <!-- /widget-header -->
                        <div class="widget-content">
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th> Free Resource </th>
                                    <th> Download</th>
                                    <th class="td-actions"> </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td> abc </td>
                                    <td>123 </td>
                                    <td class="td-actions"><a class="btn btn-small btn-success" href="javascript:;"><i class="btn-icon-only icon-ok"> </i></a><a class="btn btn-danger btn-small" href="javascript:;"><i class="btn-icon-only icon-remove"> </i></a></td>
                                </tr>
                                <tr>
                                    <td>abc </td>
                                    <td>123 </td>
                                    <td class="td-actions"><a class="btn btn-small btn-success" href="javascript:;"><i class="btn-icon-only icon-ok"> </i></a><a class="btn btn-danger btn-small" href="javascript:;"><i class="btn-icon-only icon-remove"> </i></a></td>
                                </tr>
                                <tr>
                                    <td> abc </td>
                                    <td> 123</td>
                                    <td class="td-actions"><a class="btn btn-small btn-success" href="javascript:;"><i class="btn-icon-only icon-ok"> </i></a><a class="btn btn-danger btn-small" href="javascript:;"><i class="btn-icon-only icon-remove"> </i></a></td>
                                </tr>
                                <tr>
                                    <td> abc</td>
                                    <td>123 </td>
                                    <td class="td-actions"><a class="btn btn-small btn-success" href="javascript:;"><i class="btn-icon-only icon-ok"> </i></a><a class="btn btn-danger btn-small" href="javascript:;"><i class="btn-icon-only icon-remove"> </i></a></td>
                                </tr>
                                <tr>
                                    <td> abc </td>
                                    <td> 123 </td>
                                    <td class="td-actions"><a class="btn btn-small btn-success" href="javascript:;"><i class="btn-icon-only icon-ok"> </i></a><a class="btn btn-danger btn-small" href="javascript:;"><i class="btn-icon-only icon-remove"> </i></a></td>
                                </tr>
                                <tr>
                                    <td> abc</td>
                                    <td>123 </td>
                                    <td class="td-actions"><a class="btn btn-small btn-success" href="javascript:;"><i class="btn-icon-only icon-ok"> </i></a><a class="btn btn-danger btn-small" href="javascript:;"><i class="btn-icon-only icon-remove"> </i></a></td>
                                </tr>
                                <tr>
                                    <td> abc </td>
                                    <td> 123 </td>
                                    <td class="td-actions"><a class="btn btn-small btn-success" href="javascript:;"><i class="btn-icon-only icon-ok"> </i></a><a class="btn btn-danger btn-small" href="javascript:;"><i class="btn-icon-only icon-remove"> </i></a></td>
                                </tr>
                                <tr>
                                    <td> abc</td>
                                    <td>123 </td>
                                    <td class="td-actions"><a class="btn btn-small btn-success" href="javascript:;"><i class="btn-icon-only icon-ok"> </i></a><a class="btn btn-danger btn-small" href="javascript:;"><i class="btn-icon-only icon-remove"> </i></a></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /widget-content -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="widget">
                        <div class="widget-header"> <i class="icon-check "></i>
                            <h3>Tab Content</h3>
                        </div>
                        <div class="widget-content">
                            <div class="widget widget-tabs">
                                <div>
                                    <ul class="nav nav-tabs">
                                        <li class="active"> <a data-toggle="tab" href="#stats">Users</a> </li>
                                        <li class=""> <a data-toggle="tab" href="#report">Favorites</a> </li>
                                        <li class=""> <a data-toggle="tab" href="#dropdown1">Commenters</a> </li>
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane clearfix active" id="stats">
                                        <h5 class="tab-header"><i class="icon-group"></i> Last logged-in users</h5>
                                        <ul class="users-list">
                                            <li> <img class="pull-left img-circle" alt="" src="/static/admin/images/img1.jpg">
                                                <div class="user-info">
                                                    <div class="name"><a href="#">John Doe</a></div>
                                                    <div class="position">Product Designer</div>
                                                    <div class="time">Last logged-in: Feb 20, 14:56</div>
                                                </div>
                                            </li>
                                            <li> <img class="pull-left img-circle" alt="" src="/static/admin/images/img1.jpg">
                                                <div class="user-info">
                                                    <div class="name"><a href="#">Dale Steyn</a></div>
                                                    <div class="position">Software Engineer</div>
                                                    <div class="time">Last logged-in: Mar 15, 9:07</div>
                                                </div>
                                            </li>
                                            <li> <img class="pull-left img-circle" alt="" src="images/img1.jpg">
                                                <div class="user-info">
                                                    <div class="name"><a href="#">Dale Steyn</a></div>
                                                    <div class="position">Chief Officer</div>
                                                    <div class="time">Last logged-in: Jun 15, 15:24</div>
                                                </div>
                                            </li>
                                            <li> <img class="pull-left img-circle" alt="" src="images/img1.jpg">
                                                <div class="user-info">
                                                    <div class="name"><a href="#">John Doe</a></div>
                                                    <div class="position">Financial Assistant</div>
                                                    <div class="time">Last logged-in: Jun 10, 13:20</div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tab-pane" id="report">
                                        <h5 class="tab-header"><i class="icon-star"></i> Popular contacts</h5>
                                        <ul class="users-list user-list-no-hover">
                                            <li> <img class="pull-left img-circle" alt="" src="images/img1.jpg">
                                                <div class="user-info">
                                                    <div class="name"><a href="#">Mitchell Johnsson</a></div>
                                                    <div class="options">
                                                        <button class="btn btn-xs btn-success"> <i class="icon-phone"></i> Call </button>
                                                        <button class="btn btn-xs btn-warning"> <i class="icon-envelope-alt"></i> Message </button>
                                                    </div>
                                                </div>
                                            </li>
                                            <li> <img class="pull-left img-circle" alt="" src="images/img1.jpg">
                                                <div class="user-info">
                                                    <div class="name"><a href="#">Frans Garey</a></div>
                                                    <div class="options">
                                                        <button class="btn btn-xs btn-success"> <i class="icon-phone"></i> Call </button>
                                                        <button class="btn btn-xs btn-warning"> <i class="icon-envelope-alt"></i> Message </button>
                                                    </div>
                                                </div>
                                            </li>
                                            <li> <img class="pull-left img-circle" alt="" src="images/img1.jpg">
                                                <div class="user-info">
                                                    <div class="name"><a href="#">John Doe</a></div>
                                                    <div class="options">
                                                        <button class="btn btn-xs btn-success"> <i class="icon-phone"></i> Call </button>
                                                        <button class="btn btn-xs btn-warning"> <i class="icon-envelope-alt"></i> Message </button>
                                                    </div>
                                                </div>
                                            </li>
                                            <li> <img class="pull-left img-circle" alt="" src="images/img1.jpg">
                                                <div class="user-info">
                                                    <div class="name"><a href="#">John Doe</a></div>
                                                    <div class="options">
                                                        <button class="btn btn-xs btn-success"> <i class="icon-phone"></i> Call </button>
                                                        <button class="btn btn-xs btn-warning"> <i class="icon-envelope-alt"></i> Message </button>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tab-pane" id="dropdown1">
                                        <h5 class="tab-header"><i class="icon-comments"></i> Top Commenters</h5>
                                        <ul class="users-list">
                                            <li> <img class="pull-left img-circle" alt="" src="images/img1.jpg">
                                                <div class="user-info">
                                                    <div class="name"><a href="#">John Doe</a></div>
                                                    <div class="comment"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer faucibus consectetur malesuada. </div>
                                                </div>
                                            </li>
                                            <li> <img class="pull-left img-circle" alt="" src="images/img1.jpg">
                                                <div class="user-info">
                                                    <div class="name"><a href="#">John Doe</a></div>
                                                    <div class="comment"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer faucibus consectetur malesuada. </div>
                                                </div>
                                            </li>
                                            <li> <img class="pull-left img-circle" alt="" src="images/img1.jpg">
                                                <div class="user-info">
                                                    <div class="name"><a href="#">John Doe</a></div>
                                                    <div class="comment"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer faucibus consectetur malesuada. </div>
                                                </div>
                                            </li>
                                            <li> <img class="pull-left img-circle" alt="" src="images/img1.jpg">
                                                <div class="user-info">
                                                    <div class="name"><a href="#">John Doe</a></div>
                                                    <div class="comment"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer faucibus consectetur malesuada. </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="widget">
                        <div class="widget-header"> <i class="icon-warning-sign "></i>
                            <h3>Alert </h3>
                        </div>
                        <div class="widget-content">
                            <div class="panel-body">
                                <div class="alert alert-success alert-block fade in">
                                    <button type="button" class="close close-sm" data-dismiss="alert"> <i class="icon-remove"></i> </button>
                                    <h4> <i class="icon-ok-sign"></i> Success! </h4>
                                    <p>Best check yo self, you're not looking too good...</p>
                                </div>
                                <div class="alert alert-block alert-danger fade in">
                                    <button type="button" class="close close-sm" data-dismiss="alert"> <i class="icon-remove"></i> </button>
                                    <strong>Oh snap!</strong> Change a few things up and try submitting again. </div>
                                <div class="alert alert-success fade in">
                                    <button type="button" class="close close-sm" data-dismiss="alert"> <i class="icon-remove"></i> </button>
                                    <strong>Well done!</strong> You successfully read this important alert message. </div>
                                <div class="alert alert-info fade in">
                                    <button type="button" class="close close-sm" data-dismiss="alert"> <i class="icon-remove"></i> </button>
                                    <strong>Heads up!</strong> This alert needs your attention, but it's not super important. </div>
                                <div class="alert alert-warning fade in">
                                    <button type="button" class="close close-sm" data-dismiss="alert"> <i class="icon-remove"></i> </button>
                                    <strong>Warning!</strong> Best check yo self, you're not looking too good. </div>
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
