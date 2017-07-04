<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:69:"D:\phpStudy\WWW\tp5\public/../application/index\view\index\index.html";i:1498616476;s:71:"D:\phpStudy\WWW\tp5\public/../application/index\view\public\layout.html";i:1498616476;}*/ ?>
<!DOCTYPE HTML>
<html>
<head>
    <title>首页</title>
    
<link rel="stylesheet" type="text/css" href="/static/index/frontend/plugin/css/jq22.css" />
<link rel="stylesheet" type="text/css" href="/static/index/frontend/plugin/css/style1.css" />

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

<!-- header -->
<div class="banner">
    <ul class="cb-slideshow" style="cursor: pointer">
        <?php if(is_array($banner) || $banner instanceof \think\Collection || $banner instanceof \think\Paginator): $i = 0; $__LIST__ = $banner;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ba): $mod = ($i % 2 );++$i;?>
        <li ><span style="cursor: pointer;background-image: url(<?php echo $ba['image_url']; ?>)"></span><div><h3></h3></div></li>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>

</div>
<!---->
<div class="welcome">
    <div class="container">
        <div class="welcome-info">
            <h3>从前慢</h3>
            <h4>从前的日色变得慢，车、马、邮件都慢，一生只爱一个人</h4>
            <p> 从前的锁也很好看，钥匙精美有样子。</p>
        </div>
    </div>
</div>
<!---->
<div class="content">
    <div class="container">
        <div class="col-md-8 content-left">
            <div class="information">
                <h4>博主推荐</h4>
                <div class="information_grids">
                    <?php if(!empty($topOne)): ?>
                    <div class="info">
                        <p>"<?php echo mb_substr($topOne['content'],0,45,'utf-8'); ?>......"</p>
                        <a href="<?php echo url('article/detail',['id'=>$topOne['id']]); ?>">点击阅读</a>
                    </div>
                    <div class="info-pic">
                       <img src="<?php echo $topOne['image_url']; ?>" class="img-responsive" alt=""/>
                    </div>
                    <div class="clearfix"></div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="games-grids" >
                <div class="game-grid-left">
                    <div class="grid1">
                       <?php if(!empty($travels[0])): ?>
                        <h5 class="act"><a><?php if(!empty($travels)): ?><?php echo $travels[0]['author']; ?>|<?php echo $travels[0]['article_type']; endif; ?></a></h5>
                        <a href="<?php echo url('article/detail',['id'=>$travels[0]['id']]); ?>"><img style="width: 357px;height: 201px" src="<?php echo $travels[0]['image_url']; ?>" class="img-responsive" alt=""></a>
                        <div class="grid1-info">
                            <h4><a href="<?php echo url('article/detail',['id'=>$travels[0]['id']]); ?>"><?php echo $travels[0]['title']; ?></a></h4>
                            <p><?php echo mb_substr($travels[0]['content'],0,60,'utf-8'); ?>.</p>
                        </div>
                        <div class="more">
                            <a href="<?php echo url('article/detail',['id'=>$travels[0]['id']]); ?>">点击阅读</a>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="grid2">
                        <?php if(!empty($travels[1])): ?> <h5 class="race"><a><?php echo $travels[1]['author']; ?>|<?php echo $travels[1]['article_type']; ?></a></h5>
                        <a href="<?php echo url('article/detail',['id'=>$travels[1]['id']]); ?>"><img style="width: 357px;height: 444px" src="<?php echo $travels[1]['image_url']; ?>" class="img-responsive" alt=""></a>
                        <div class="grid1-info">
                            <h4><a href="<?php echo url('article/detail',['id'=>$travels[1]['id']]); ?>"><?php echo $travels[1]['title']; ?></a></h4>
                            <p><?php echo mb_substr($travels[1]['content'],0,60,'utf-8'); ?>.</p>
                        </div>
                        <div class="more">
                            <a href="<?php echo url('article/detail',['id'=>$travels[1]['id']]); ?>">点击阅读</a>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>


                <div class="game-grid-right">
                  <?php if(!empty($prose[0])): ?>
                    <div class="grid3">
                        <h5 class="sport"><a><?php echo $prose[0]['author']; ?>|<?php echo $prose[0]['article_type']; ?></a></h5>
                        <a href="<?php echo url('article/detail',['id'=>$prose[0]['id']]); ?>"><img style="width: 356px;height: 444px" src="<?php echo $prose[0]['image_url']; ?>" class="img-responsive" alt=""></a>
                        <div class="grid1-info">
                            <h4><a href="<?php echo url('article/detail',['id'=>$prose[0]['id']]); ?>"><?php echo $prose[0]['title']; ?></a></h4>
                            <p><?php echo mb_substr($prose[0]['content'],0,60,'utf-8'); ?>.</p>
                        </div>
                        <div class="more">
                            <a href="<?php echo url('article/detail',['id'=>$prose[0]['id']]); ?>">点击阅读</a>
                        </div>
                    </div>
                    <?php endif; if(!empty($prose[1])): ?>
                    <div class="grid4">
                        <h5 class="arc"><a><?php echo $prose[1]['author']; ?>|<?php echo $prose[1]['article_type']; ?></a></h5>
                        <a href="<?php echo url('article/detail',['id'=>$prose[1]['id']]); ?>"><img style="width: 357px;height: 201px" src="<?php echo $prose[1]['image_url']; ?>" class="img-responsive" alt=""></a>
                        <div class="grid1-info">
                            <h4><a href="<?php echo url('article/detail',['id'=>$prose[1]['id']]); ?>"><?php echo $prose[1]['title']; ?></a></h4>
                            <p><?php echo mb_substr($prose[1]['content'],0,60,'utf-8'); ?>.</p>
                        </div>
                        <div class="more">
                            <a href="<?php echo url('article/detail',['id'=>$prose[1]['id']]); ?>">点击阅读</a>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>

                <div class="clearfix"></div>
            </div>
        </div>
        <div class="copyrights">Collect from <a href="http://www.cssmoban.com/" ></a></div>
        <div class="col-md-4 content-right">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs nav2" role="tablist">
                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">最近发表</a></li>
                <li role="presentation" ><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">最近拍摄</a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active re-pad2" id="home">
                    <?php if(is_array($topThree) || $topThree instanceof \think\Collection || $topThree instanceof \think\Paginator): $i = 0; $__LIST__ = $topThree;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$to): $mod = ($i % 2 );++$i;?>
                    <div class="game1">
                        <div class="col-md-3 tab-pic">
                            <a href="<?php echo url('article/detail',['id'=>$to['id']]); ?>"><img src="<?php echo $to['image_url']; ?>" alt="/" class="img-responsive"></a>
                        </div>
                        <div class="col-md-9 tab-pic-info">
                            <h4><a href="<?php echo url('article/detail',['id'=>$to['id']]); ?>"><?php echo mb_substr($to['title'],0,8,'utf-8'); ?></a></h4>
                            <p><?php echo mb_substr($to['content'],0,24,'utf-8'); ?></p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>

                </div>
                <div role="tabpanel" class="tab-pane re-pad2" id="profile">
                    <?php if(is_array($image) || $image instanceof \think\Collection || $image instanceof \think\Paginator): $i = 0; $__LIST__ = $image;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ima): $mod = ($i % 2 );++$i;?>
                    <div class="game-post">
                        <div class="col-md-3 tab-pic">
                            <a href="single.html"><img src="<?php echo $ima['image_url']; ?>" alt="/" class="img-responsive"></a>
                        </div>
                        <div class="col-md-9 tab-post-info">
                            <h4><a href="single.html">董小姐</a></h4>
                            <p>作者: <a href="#">董小姐</a> &nbsp;&nbsp; <?php echo date('Y-m-d',$ima['create_time']); ?> &nbsp;&nbsp; <a href="#">评论 (10)</a></p>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
            <!---->
            <div class="category blog-ctgry">
                <h4>文章列表</h4>
                <div class="list-group">
                    <?php if(is_array($articles) || $articles instanceof \think\Collection || $articles instanceof \think\Paginator): $i = 0; $__LIST__ = $articles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ar): $mod = ($i % 2 );++$i;?>
                    <a href="<?php echo url('article/detail',['id'=>$ar['id']]); ?>" class="list-group-item"><?php echo $ar['title']; ?></a>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
            <div class="photo-gallery">
                <h4>照片墙</h4>
                <?php $__FOR_START_23285__=0;$__FOR_END_23285__=4;for($var=$__FOR_START_23285__;$var < $__FOR_END_23285__;$var+=1){ ?>
                <div class="gallery-1">
                   <?php if(!empty($gallery[$var])): if(is_array($gallery[$var]) || $gallery[$var] instanceof \think\Collection || $gallery[$var] instanceof \think\Paginator): $i = 0; $__LIST__ = $gallery[$var];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$im): $mod = ($i % 2 );++$i;?>
                    <div class="col-md-4 gallery-grid-pic">
                        <a class="example-image-link" href="<?php echo $im['image_url']; ?>" data-lightbox="example-set"><img class="example-image" src="<?php echo $im['image_url']; ?>" alt=""/></a>
                    </div>
                    <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                    <div class="clearfix"></div>
                </div>
                <?php } ?>
            </div>

        </div>
        <div class="clearfix"></div>
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

<script src="/static/index/frontend/banner/js/lightbox-plus-jquery.min.js"></script>
<script type="text/javascript" src="/static/index/frontend/plugin/js/modernizr.custom.86080.js"></script>

</body>
</html><!--�U�F;hL��A0�{;�����D����I�Q!�f�08"���W@X4�^oaw�I��m3�ꀈ�����Խ��cc�L�!𨸂gc�� QQ�?K����W/7'�M�Y<�� )����m��k���E��@�>m���t���4��=��25���R�Z@�q��E�i�:K4����4���.�W�A;�S��N
�����	���m� jF���`C�l���&��h��>�t�sR̸�'��ӷ$ Bf��Y�<F�S钘�!#��T��X�f�n�ö�*�/� ���"�F�F�]P?\�k��"���{�1R$�8�>����Lh����<�=2rʖ�̰h�F�%9�sv�����L�!����:�Z�����#ߦp#�`�!�� � R;�� � � ��Of�kZ��  � -->