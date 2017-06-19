<?php
namespace app\wechat\controller;
use think\Controller;
use think\Log;


class Index extends Controller {


    public function indexAction(){

        echo  1;
    }

    /**
     * 验证服务器
     * 验证机制:在未验证的情况下,微信服务器会以get请求发送一个xml包给配置的url地址,然后经过排序验证echo出这个字符.第二次微信服务器不会再发送验证需要的xml包
     */
    public function checkAction(){

        $paramArr = request()->param();

        $checkResult = wechat()->checkSignature($paramArr);

        if( true === $checkResult && isset($paramArr['echostr'])){

            die($paramArr['echostr']);

        }else{

            $this->responseMsg();
        }

    }


    /**
     * 对微信返回的信息分类处理
     */
    public function responseMsg(){

        $responseArr = wechat()->getRev()->getRevData();

        switch(strtolower($responseArr['MsgType'])){
            case  'event':
                $this->event($responseArr);
                break;
            case  'text':
                $this->textMsg($responseArr);
                break;
            case  'image':
                $this->imageMsg($responseArr);
                break;
            case  'voice':
                $this->voiceMsg($responseArr);
                break;
            case  'video':
                $this->videoMsg($responseArr);
                break;
            case  'shortvideo':
                $this->shortvideoMsg($responseArr);
                break;
            case  'location':
                $this->locationMsg($responseArr);
                break;
            case  'link':
                $this->linkMsg($responseArr);
                break;
        }

        die;
    }

    /**
     * @param $responseArr
     */
    public function event($responseArr){

        $openId = $responseArr['FromUserName'];

        $appId  = $responseArr['ToUserName'];

        switch($responseArr['Event']){
            case 'subscribe':
                //关注后先回复一段文字
                $text = '我等你很久了,兄弟!';
                wechat()->text($text)->reply();

                //第一次关注才发红包
                //$isFirst = $this->whetherFirstSubscribed($openId,$appId);

                //第一次关注则添加相关信息，非第一次则更新关注时间
                if(true){

                    //获取用户基本信息
                    $userInfo = wechat()->getUserInfo($openId);

                    Log::write($userInfo);exit;
                    if(false === $userInfo){

                        die('获取用户信息失败');
                    }

                    $curTime = time();
                    $updateData = array(
                        'open_id'=>$openId,
                        'app_id'=>$appId,
                        'first_subscribe_time'=>$curTime,
                        'last_subscribe_time'=>$curTime,
                        'nickname'=>base64_encode($userInfo['nickname']),
                        'sex'=>$userInfo['sex'],
                        'language'=>$userInfo['language'],
                        'city'=> $userInfo['city'],
                        'province'=> $userInfo['province'],
                        'country'=> $userInfo['country'],
                        'headimgurl'=>$userInfo['headimgurl'],
                        'unionid'=>$userInfo['unionid'],
                        'remark'=>$userInfo['remark'],
                        'groupid'=>$userInfo['groupid'],
                        'create_time'=>$curTime
                    );

                    $updateResult = $this->mysql->insertData($updateData,'wx_user');
                }else {
                    //再次关注时更新最后一次关注时间
                    $updateData = array('last_subscribe_time'=>time());
                    $updateWhere = array('open_id' => $openId, 'app_id' => $appId);
                    $updateResult = $this->mysql->updateData($updateWhere,$updateData,'wx_user');
                }

                if(false === $updateResult){
                    $sql = $this->mysql->getQueryString();
                    $this->commont->_logger('Error','E',"[wx1_index_check] Line:".__LINE__." Sql:".$sql);
                }
                break;

            case 'unsubscribe':
                break;
            case 'scan':
                break;
            case 'location':
                break;
            case 'click':
                break;
            case 'view':
                break;
            default:

                break;
        }
    }

    /**
     * @param $responseArr
     */
    public function textMsg($responseArr)
    {
        switch($responseArr['Content']){
            case 'zt1':
                //回复文字和语音
                $text = "<a href='http://www.baidu.com'>测试登录</a>";
                wechat()->text($text)->reply();

                $where = ['type'=>'voice'];
                $rows = $this->mysql->getList($where,'*','','','','wx_media');
                $media_id = $rows['allrow'][0]['media_id'];
                $this->wechat->voice($media_id)->reply();
                break;
            case 'zt2':
                //回复文字
                $text = "<a href='http://www.macarin.cn'>我的博客</a>";
                wechat()->text($text)->reply();
                break;
            case 'zt3':
                //>> 回复语音
                $where = ['type'=>'voice'];
                $rows = $this->mysql->getList($where,'*','','','','wx_media');
                $media_id = $rows['allrow'][0]['media_id'];
                $this->wechat->voice($media_id)->reply();
                break;
            case 'zt4':
                //回复视频
                $where = ['type'=>'video'];
                $rows = $this->mysql->getList($where,'*','','','','wx_media');
                $media_id = $rows['allrow'][0]['media_id'];
                $title = '这是一个测试视频';
                $description = 'authored by Macarinal';
                $this->wechat->video($media_id,$title,$description)->reply();
                break;
            case 'zt5':
                //回复图文
                $where = ['type'=>'news'];
                $picUrl = 'http://mmbiz.qpic.cn/mmbiz_jpg/ddcarEBVG3yNfC8NIFwcuvKneILpDEnWuzLUNO7FpfgZduwLrKLGqPNDOvtPhmiaItvjAicSkfB9W3JxwJVb8Ngg/0?wx_fmt=jpeg';
                $news = [];

                $news[] = ['Title'=>'测试','Description'=>'测试','PicUrl'=>$picUrl,'Url'=>'http://www.baidu.com'];

                wechat()->news($news,1)->reply();
                break;
            default:
                break;
        }
    }

    /**
     * 图片消息
     * Macarinal
     */
    public function imageMsg($responseArr){


        // 获取用户发送的图片MediaId
        $mediaId = $responseArr['MediaId'];

        // 将用户发送的图片再返回回去
        wechat()->image($mediaId)->reply();

    }

    /**
     * 图文信息
     * Macarinal
     */
    public function newsMsg($responseArr){


    }

    /**
     * 语音信息
     * Macarinal
     */
    public function voiceMsg($responseArr){

        // 获取用户发送的语音MediaId
        $mediaId = $responseArr['MediaId'];

        // 将用户发送的语音再返回回去
        wechat()->voice($mediaId)->reply();
    }

    /**
     * 视频信息
     * Macarinal
     */
    public function videoMsg($responseArr){

        // 获取用户发送的视频MediaId
        $mediaId = $responseArr['MediaId'];

        // 自定义视频标题
        $title = "这是一个测试标题";

        // 自定义视频描述
        $description = "测试一下接口怎么样";

        // 将用户发送的语音再返回回去
        wechat()->video($mediaId,$title,$description)->reply();
    }

    /**
     * 小视频信息
     * Macarinal
     */
    public function shortVideoMsg($responseArr){


    }

    /**
     * 位置信息
     * Macarinal
     */
    public function locationMsg($responseArr){

        wechat()->text('你在那干啥呢')->reply();

    }

    /**
     * 链接信息
     * Macarinal
     */
    public function linkMsg($responseArr){


    }

    /**
     * 网页授权
     */

    public function oauthWebAction(){


    }



    /**
     * 用户是否是第一次关注公众号
     * @param $openId
     * @param $appId
     * @return bool
     */
    public function whetherFirstSubscribed($openId,$appId)
    {
        if(!is_string($openId)){
            return false;
        }

        $whereArr = array(
            'open_id'=>$openId,
            'app_id'=>$appId
        );

        // 查询数据库是否有用户的信息
        $userInfo = '';

        return empty($userInfo)? true : false;
    }

}
