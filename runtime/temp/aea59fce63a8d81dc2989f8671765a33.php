<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:72:"D:\phpStudy\WWW\tp5\public/../application/index\view\article\detail.html";i:1497325765;s:71:"D:\phpStudy\WWW\tp5\public/../application/index\view\public\layout.html";i:1496740888;}*/ ?>
<!DOCTYPE HTML>
<html>
<head>
    <title>首页</title>
    
<link rel="stylesheet" href="/static/index/css/mine/article-detail.css">
<link rel="stylesheet" href="/static/index/comment/css/sinaFaceAndEffec.css">
<link rel="stylesheet" href="/static/index/comment/css/main.css">

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


<div class="content" style="background-color: #EEEEEE">


    <div class="container" style=" background-color: white;padding-bottom: 50px">

        <div class="col-md-8 content-left" >
            <div  class="col-lg-12" style=";text-align: left;margin-top: 20px"><h2><?php echo $article['title']; ?></h2></div>
            <br>
            <div  class="col-lg-12" style="height: 39px;line-height: 39px;text-align: left;margin: 20px 0 ;">
                <p class="auth-span">
                    <span class="muted"><i class="glyphicon glyphicon-user"></i> <a href="#" style="color: #00a67c"><?php echo $article['author']; ?></a></span>&nbsp;&nbsp;&nbsp;&nbsp;
                    <span class="muted"><i class="glyphicon glyphicon-time"></i><?php echo date('Y-m-d H:i:s',$article['create_time']); ?></span>&nbsp;&nbsp;&nbsp;&nbsp;	<span class="muted"><i class="glyphicon glyphicon-eye-open"></i> 26℃</span>&nbsp;&nbsp;&nbsp;&nbsp;	<span class="muted"><i class="glyphicon glyphicon-pencil"></i> <a style="color: #00a67c" href="#">2评论</a></span><span class="muted">
</span></p>
            </div>
            <div class="games-grids" id="contents"  style="height: 800px;width: 100%;overflow: hidden">
                <?php echo $article['html_content']; ?>
            </div>
            <div style="width: 100%;margin-bottom: 10px">
                <button style="width: 100%" class="layui-btn layui-btn-primary loadMore">加载</button>
                <br>
            </div>
            <div id="content" style="width: 100%; height: auto;">
                <div class="wrap">
                    <div class="comment">
                        <div class="comt-title">

                            <div class="comt-avatar pull-left" style="margin-top: 50px;margin-bottom: 20px;vertical-align: middle">
                                <img style="height: 30px;width: 30px;" alt="" src="/static/index/comment/images/user.png" class="avatar avatar-54 photo avatar-default" height="54" width="54">
                            &nbsp;发表我的评论
                            </div>
                        </div>
                        <div class="content">
                            <div class="cont-box">
                                <textarea class="text" placeholder="请输入..."></textarea>
                            </div>
                            <div class="tools-box">
                                <div class="operator-box-btn"><span class="face-icon"  >☺</span><span class="img-icon">▧</span></div>
                                <div class="submit-btn"><input type="button" onClick="out()"value="提交评论" /></div>
                            </div>
                        </div>
                    </div>
                    <div id="info-show">
                        <ul>
                            <?php if(!empty($comments)): if(is_array($comments) || $comments instanceof \think\Collection || $comments instanceof \think\Paginator): $i = 0; $__LIST__ = $comments;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$co): $mod = ($i % 2 );++$i;?>
                            <li>
                                <div class="head-face">
                                    <img src="/static/index/comment/images/user.png" />
                                </div>
                                <div class="reply-cont">
                                    <p class="username">游客</p>
                                    <p class="comment-body"><?php echo $co['content']; ?></p>
                                    <p class="comment-footer"><?php echo date('Y-m-d H:i:s',$co['create_time']); ?></p>
                                </div>
                            </li>
<?php endforeach; endif; else: echo "" ;endif; endif; ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>



        <div class="copyrights">Collect from <a href="http://www.cssmoban.com/"></a></div>
        <div class="col-md-4 content-right" style="margin-top: 70px">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs nav2" role="tablist">
                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">最近发表</a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active re-pad2" id="home">
                    <div class="game1">
                        <div class="col-md-3 tab-pic">
                            <a href="<?php echo url('article/detail',['id'=>$topThree[0]['id']]); ?>"><img src="<?php echo $topThree[0]['image_url']; ?>" alt="/" class="img-responsive"></a>
                        </div>
                        <div class="col-md-9 tab-pic-info">
                            <h4><a href="<?php echo url('article/detail',['id'=>$topThree[0]['id']]); ?>"><?php echo $topThree[0]['title']; ?></a></h4>
                            <p><?php echo mb_substr($topThree[0]['content'],0,25,'utf-8'); ?>......</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="game1">
                        <div class="col-md-3 tab-pic">
                            <a href="<?php echo url('article/detail',['id'=>$topThree[1]['id']]); ?>"><img src="<?php echo $topThree[1]['image_url']; ?>" alt="/" class="img-responsive"></a>
                        </div>
                        <div class="col-md-9 tab-pic-info">
                            <h4><a href="<?php echo url('article/detail',['id'=>$topThree[1]['id']]); ?>"><?php echo $topThree[1]['title']; ?></a></h4>
                            <p><?php echo mb_substr($topThree[1]['content'],0,25,'utf-8'); ?>......</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="game1">
                        <div class="col-md-3 tab-pic">
                            <a href="<?php echo url('article/detail',['id'=>$topThree[2]['id']]); ?>"><img src="<?php echo $topThree[2]['image_url']; ?>" alt="/" class="img-responsive"></a>
                        </div>
                        <div class="col-md-9 tab-pic-info">
                            <h4><a href="<?php echo url('article/detail',['id'=>$topThree[2]['id']]); ?>"><?php echo $topThree[2]['title']; ?></a></h4>
                            <p><?php echo mb_substr($topThree[2]['content'],0,25,'utf-8'); ?>......</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                </div>
                <div role="tabpanel" class="tab-pane re-pad2" id="profile">
                    <div class="game-post">
                        <div class="col-md-3 tab-pic">
                            <a href="single.html"><img src="http://on58ea572.bkt.clouddn.com/2017-05-27_5928e7ef6aa4d.jpg" alt="/" class="img-responsive"></a>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="game-post">
                        <div class="col-md-3 tab-pic">
                            <a href="single.html"><img src="http://on58ea572.bkt.clouddn.com/2017-05-27_5928e7ef26095.jpg" alt="/" class="img-responsive"></a>
                        </div>
                        <div class="col-md-9 tab-post-info">
                            <h4><a href="single.html">董小姐</a></h4>
                            <p>作者: <a href="#">董小姐</a> &nbsp;&nbsp; 2017-05-27 &nbsp;&nbsp; <a href="#">评论 (10)</a></p>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="game-post">
                        <div class="col-md-3 tab-pic">
                            <a href="single.html"><img src="http://on58ea572.bkt.clouddn.com/2017-05-27_5928e7eeb7c86.jpg" alt="/" class="img-responsive"></a>
                        </div>
                        <div class="col-md-9 tab-post-info">
                            <h4><a href="single.html">董小姐</a></h4>
                            <p>作者: <a href="#">董小姐</a> &nbsp;&nbsp; 2017-05-27 &nbsp;&nbsp; <a href="#">评论 (10)</a></p>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                </div>

            </div>
            <!---->
            <div class="category blog-ctgry">
                <h4>文章列表</h4>
                <div class="list-group">
                    <?php if(is_array($topThree) || $topThree instanceof \think\Collection || $topThree instanceof \think\Paginator): $i = 0; $__LIST__ = $topThree;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$top): $mod = ($i % 2 );++$i;?>
                    <a href="<?php echo url('article/detail',['id'=>$top['id']]); ?>" class="list-group-item"><?php echo $top['title']; ?></a>
                   <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
            <input type="hidden" value="<?php echo request()->param('id'); ?>" name="article-id">
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

<script src="/static/index/js/mine/load-more.js"></script>
<script type="text/javascript" src="/static/index/comment/js/main.js"></script>
<script type="text/javascript" src="/static/index/comment/js/sinaFaceAndEffec.js"></script>
<script type="text/javascript">

    // 绑定表情
    $('.face-icon').SinaEmotion($('.text'));
    // 测试本地解析
    function out() {
        var article_id = $('input[name = article-id ]').val();
        var inputText = $('.text').val();

        if(inputText === ''){

            $('.text').attr('placeholder','请输入评论').focus();

            return false;
        }

        $.ajax({
            type:'post',
            dataType:'json',
            url:location.protocol+'//'+window.location.host+'/comment/insert',
            data:{'content':AnalyticEmotion(inputText),'article_id':article_id},
            success:function (e) {
                if(e.status === 1){

                    $('#info-show ul').append(reply(AnalyticEmotion(inputText)));
                }
            }
        });
    }

    var html;
    function reply(content){
        html  = '<li>';
        html += '<div class="head-face">';
        html += '<img src="/static/index/comment/images/user.png" / >';
        html += '</div>';
        html += '<div class="reply-cont">';
        html += '<p class="username">游客</p>';
        html += '<p class="comment-body">'+content+'</p>';
        html += '<p class="comment-footer">'+getNowFormatDate()+'</p>';
        html += '</div>';
        html += '</li>';
        return html;
    }
    function getNowFormatDate() {
        var date = new Date();
        var seperator1 = "-";
        var seperator2 = ":";
        var month = date.getMonth() + 1;
        var strDate = date.getDate();
        if (month >= 1 && month <= 9) {
            month = "0" + month;
        }
        if (strDate >= 0 && strDate <= 9) {
            strDate = "0" + strDate;
        }
        var currentdate = date.getFullYear() + seperator1 + month + seperator1 + strDate
            + " " + date.getHours() + seperator2 + date.getMinutes()
            + seperator2 + date.getSeconds();
        return currentdate;
    }
</script>

</body>
</html>