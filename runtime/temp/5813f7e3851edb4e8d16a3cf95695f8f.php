<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:71:"D:\phpStudy\WWW\tp5\public/../application/index\view\article\index.html";i:1496830270;s:71:"D:\phpStudy\WWW\tp5\public/../application/index\view\public\layout.html";i:1496740888;}*/ ?>
<!DOCTYPE HTML>
<html>
<head>
    <title>首页</title>
    
<link rel="icon" href="http://on58ea572.bkt.clouddn.com/2017-05-26_5927df45ebf64.jpg">
<link href="/static/index/css/mine/article-list.css" type="text/css" rel="stylesheet"/>
<link href="/static/index/css/mine/article-list-1.css" type="text/css" rel="stylesheet"/>
<link href="/static/base/layer/css/layui.css" rel="stylesheet">


    <link href="/static/index/frontend/banner/css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="/static/index/frontend/banner/css/style.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="/static/index/frontend/banner/css/lightbox.css">

    <!-- jQuery (necessary JavaScript plugins) -->
    <script type='text/javascript' src="/static/index/frontend/banner/js/jquery-1.11.1.min.js"></script>
    <!-- Custom Theme files -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800|Titillium+Web:400,600,700,300' rel='stylesheet' type='text/css'>
    <!-- Custom Theme files -->
    <!--//theme-style-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Game Spot Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>


</head>
<body ondragstart="return false" oncontextmenu="return false;" >
<div class="banner_head_top">
    <div class="logo">
        <h1><a href="<?php echo url('Index/index'); ?>">Mi<span class="glyphicon glyphicon-knight" aria-hidden="true"></span><span>Sum</span></a></h1>
    </div>
    <div class="top-menu">
        <div class="content white">
            <nav class="navbar navbar-default">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <!--/navbar header-->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="<?php echo url('index/index'); ?>">首页</a></li>
                        <li><a href="<?php echo url('article/index'); ?>">日志</a></li>
                        <li>
                            <a href="<?php echo url('step/index'); ?>">足迹</a>

                        </li>
                        <li><a href="<?php echo url('image/index'); ?>">照片墙</a></li>
                        <li><a href="<?php echo url('video/index'); ?>">视频集</a></li>
                    </ul>
                </div>
                <!--/navbar collapse-->
            </nav>
            <!--/navbar-->
        </div>
        <div class="clearfix"></div>
        <script type="text/javascript" src="/static/index/frontend/banner/js/bootstrap-3.1.1.min.js"></script>
    </div>
    <div class="clearfix"></div>
</div>


<div class="content" style="background: url('/static/index/images/bg/bg-1.jpg')">
    <div class="container" style=" background-color: white;padding: 0">
        <div class="main">
            <div class="col-md-12">
                <div class="row">
                    <div class="speedbar">
                        <div class="toptip"><strong class="text-success"><i class="glyphicon glyphicon-volume-up"></i> </strong> </div>
                    </div>
                    <div class="content-wrap">
                        <div class="content" id="content">
                            <?php if(is_array($articles) || $articles instanceof \think\Collection || $articles instanceof \think\Paginator): $i = 0; $__LIST__ = $articles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ar): $mod = ($i % 2 );++$i;?>
                            <article class="excerpt">
                                <header><a  class="label label-important" href="#"><?php echo $ar['article_type']; ?><i class="label-arrow"></i></a><h2><a id="title" style="color: #00a67c;text-decoration: none;" target="_blank" href="<?php echo url('article/detail',['id'=>$ar['id']]); ?>" title="<?php echo $ar['title']; ?>"><?php echo $ar['title']; ?>  </a></h2>
                                </header>
                                <div class="focus"><a target="_blank" href="<?php echo url('article/detail',['id'=>$ar['id']]); ?>"><img style="width: 200px;height: 123px;" class="thumb" src="<?php echo $ar['image_url']; ?>" alt="<?php echo $ar['title']; ?>"></a></div>
                                <span class="note">
                                    <?php echo mb_substr($ar['content'],0,100,'UTF-8'); ?>......
                                </span>
                                <p class="auth-span">
                                    <span class="muted"><i class="glyphicon glyphicon-user"></i> <a href="#"><?php echo $ar['author']; ?></a></span>
                                    <span class="muted"><i class="glyphicon glyphicon-time"></i><?php echo date('Y-m-d H:i:s',$ar['create_time']); ?></span>	<span class="muted"><i class="glyphicon glyphicon-eye-open"></i> 26℃</span>	<span class="muted"><i class="glyphicon glyphicon-pencil"></i> <a href="#">2评论</a></span><span class="muted">
<a href="javascript:;" data-action="ding" data-id="91" id="Addlike" class="action"><i class="glyphicon glyphicon-heart"></i><span class="count"><?php echo $ar['click']; ?></span>喜欢</a></span></p>
                            </article>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>

                    </div>

                </div>
            </div>
            <input type="hidden" name="pages" value="<?php echo $pages; ?>">

        </div>
        <div id="demo" style="float: right"></div>

    </div>
</div>

<!-- footer -->
<div class="footer" >
    <div class="container">
        <div class="footer-grids">
            <div class="col-md-12 news-ltr">
                <h4>写在最后</h4>
                <p style="font-size: 14px">褪去青葱岁月的青涩，让一场梦里寻花的痴念淡去，生命，无论窗外如何暴雨倾盆，内心总是充满阳光，撒满花香的日子，让天空一片碧蓝，白云悠悠间，品味淡然里的温馨，守望生活，你在天涯，我自安好.</p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!---->
<!---->

<script src="/static/index/js/mine/pagination-article.js"></script>
<script src="/static/base/layer/layui.js"></script>
<script src="/static/base/layer/laypage.js"></script>

</body>
</html>