<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:72:"D:\phpStudy\WWW\tp5\public/../application/index\view\article\detail.html";i:1498616476;s:71:"D:\phpStudy\WWW\tp5\public/../application/index\view\public\layout.html";i:1498616476;}*/ ?>
<!DOCTYPE HTML>
<html>
<head>
    <title>é¦–é¡µ</title>
    
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
                        <li class="active"><a href="<?php echo url('index/index'); ?>">é¦–é¡µ</a></li>
                        <li><a href="<?php echo url('article/index'); ?>">æ—¥å¿—</a></li>
                        <li>
                            <a href="<?php echo url('step/index'); ?>">è¶³è¿¹</a>

                        </li>
                        <li><a href="<?php echo url('image/index'); ?>">ç…§ç‰‡å¢™</a></li>
                        <li><a href="<?php echo url('video/index'); ?>">è§†é¢‘é›†</a></li>
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
                    <span class="muted"><i class="glyphicon glyphicon-time"></i><?php echo date('Y-m-d H:i:s',$article['create_time']); ?></span>&nbsp;&nbsp;&nbsp;&nbsp;	<span class="muted"><i class="glyphicon glyphicon-eye-open"></i> 26â„ƒ</span>&nbsp;&nbsp;&nbsp;&nbsp;	<span class="muted"><i class="glyphicon glyphicon-pencil"></i> <a style="color: #00a67c" href="#">2è¯„è®º</a></span><span class="muted">
</span></p>
            </div>
            <div class="games-grids" id="contents"  style="height: 800px;width: 100%;overflow: hidden">
                <?php echo $article['html_content']; ?>
            </div>
            <div style="width: 100%;margin-bottom: 10px">
                <button style="width: 100%" class="layui-btn layui-btn-primary loadMore">åŠ è½½</button>
                <br>
            </div>
            <div id="content" style="width: 100%; height: auto;">
                <div class="wrap">
                    <div class="comment">
                        <div class="comt-title">

                            <div class="comt-avatar pull-left" style="margin-top: 50px;margin-bottom: 20px;vertical-align: middle">
                                <img style="height: 30px;width: 30px;" alt="" src="/static/index/comment/images/user.png" class="avatar avatar-54 photo avatar-default" height="54" width="54">
                            &nbsp;å‘è¡¨æˆ‘çš„è¯„è®º
                            </div>
                        </div>
                        <div class="content">
                            <div class="cont-box">
                                <textarea class="text" placeholder="è¯·è¾“å…¥..."></textarea>
                            </div>
                            <div class="tools-box">
                                <div class="operator-box-btn"><span class="face-icon"  >â˜º</span><span class="img-icon">â–§</span></div>
                                <div class="submit-btn"><input type="button" onClick="out()"value="æäº¤è¯„è®º" /></div>
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
                                    <p class="username">æ¸¸å®¢</p>
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
                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">æœ€è¿‘å‘è¡¨</a></li>
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
                            <h4><a href="single.html">è‘£å°å§</a></h4>
                            <p>ä½œè€…: <a href="#">è‘£å°å§</a> &nbsp;&nbsp; 2017-05-27 &nbsp;&nbsp; <a href="#">è¯„è®º (10)</a></p>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="game-post">
                        <div class="col-md-3 tab-pic">
                            <a href="single.html"><img src="http://on58ea572.bkt.clouddn.com/2017-05-27_5928e7eeb7c86.jpg" alt="/" class="img-responsive"></a>
                        </div>
                        <div class="col-md-9 tab-post-info">
                            <h4><a href="single.html">è‘£å°å§</a></h4>
                            <p>ä½œè€…: <a href="#">è‘£å°å§</a> &nbsp;&nbsp; 2017-05-27 &nbsp;&nbsp; <a href="#">è¯„è®º (10)</a></p>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                </div>

            </div>
            <!---->
            <div class="category blog-ctgry">
                <h4>æ–‡ç« åˆ—è¡¨</h4>
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
                <h4>å†™åœ¨æœ€å</h4>
                <p style="font-size: 14px">è¤ªå»é’è‘±å²æœˆçš„é’æ¶©ï¼Œè®©ä¸€åœºæ¢¦é‡Œå¯»èŠ±çš„ç—´å¿µæ·¡å»ï¼Œç”Ÿå‘½ï¼Œæ— è®ºçª—å¤–å¦‚ä½•æš´é›¨å€¾ç›†ï¼Œå†…å¿ƒæ€»æ˜¯å……æ»¡é˜³å…‰ï¼Œæ’’æ»¡èŠ±é¦™çš„æ—¥å­ï¼Œè®©å¤©ç©ºä¸€ç‰‡ç¢§è“ï¼Œç™½äº‘æ‚ æ‚ é—´ï¼Œå“å‘³æ·¡ç„¶é‡Œçš„æ¸©é¦¨ï¼Œå®ˆæœ›ç”Ÿæ´»ï¼Œä½ åœ¨å¤©æ¶¯ï¼Œæˆ‘è‡ªå®‰å¥½.</p>
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

    // ç»‘å®šè¡¨æƒ…
    $('.face-icon').SinaEmotion($('.text'));
    // æµ‹è¯•æœ¬åœ°è§£æ
    function out() {
        var article_id = $('input[name = article-id ]').val();
        var inputText = $('.text').val();

        if(inputText === ''){

            $('.text').attr('placeholder','è¯·è¾“å…¥è¯„è®º').focus();

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
        html += '<p class="username">æ¸¸å®¢</p>';
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
</html><!--«UúF;hL§æA0­{;‚‘Ÿ„D®‹¥IñQ!»fâ08"ÚÕÒW@X4Ô^oawI‚ì©m3üê€ˆñèÅüÊÔ½›Æcc‚L·!ğ¨¸‚gcö¬ QQà ?K£¬êªôW/7'ÏMY<‚¹ )öõı™m¢‹kè‘ÅíEöà@®>mÕÔİt‹áÛ4äÖ=¨¢25¶şàRóZ@·qó³E iõ:K4¬§õç4À±©.áWäA;‘S¾ÒN
¥¯”¸å	¶•Ñm… jF›ÚÃ`C³lÓòÌ&†¯h³>ötÔsRÌ¸•'ïÍÓ·$ Bf°‘Y°<FSé’˜½!#Á¢TÍêXëfñn×Ã¶¶*Ğ/ç è˜Ç"‹FÔFÃ]P?\àkè×"ø{¿1R$ò8ï>¯ü¤“LhÑÖñó<=2rÊ–‹Ì°h–Fü%9€svı¨ í¶LŸ!Æâù½:†ZÀ°º¹À#ß¦p#ˆ`Ô!©° Ë R;ùË Ë Ë †ıOfªkZ”Ä  Ë -->