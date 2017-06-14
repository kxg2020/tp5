<?php
namespace app\wechat\controller;
use think\Controller;
use think\Log;


class Index extends Controller {


    public function indexAction(){

        echo phpinfo();

    }

    /**
     * 验证服务器
     * 验证机制:在未验证的情况下,微信服务器会以get请求发送一个xml包给配置的url地址,然后经过排序验证echo出这个字符.第二次微信服务器不会再发送验               证需要的xml包
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
            case 'qj19':
                //回复文字和语音
                $text = "<a href='www.baidu.com'>测试登录</a>";
                wechat()->text($text)->reply();

                $where = ['type'=>'voice'];
                $rows = $this->mysql->getList($where,'*','','','','wx_media');
                $media_id = $rows['allrow'][0]['media_id'];
                $this->wechat->voice($media_id)->reply();
                break;
            case 'qj18':
                //回复文字
                $text = "<a href='".$this->config->sev_url->admin_login_url."'>商城管理后台登录</a>";
                $this->wechat->text($text)->reply();
                break;
            case 'qj17':
                //>> 回复语音
                $where = ['type'=>'voice'];
                $rows = $this->mysql->getList($where,'*','','','','wx_media');
                $media_id = $rows['allrow'][0]['media_id'];
                $this->wechat->voice($media_id)->reply();
                break;
            case 'qj16':
                //回复视频
                $where = ['type'=>'video'];
                $rows = $this->mysql->getList($where,'*','','','','wx_media');
                $media_id = $rows['allrow'][0]['media_id'];
                $title = '这是一个测试视频';
                $description = 'authored by Macarinal';
                $this->wechat->video($media_id,$title,$description)->reply();
                break;
            case 'qj15':
                //回复图文
                $where = ['type'=>'news'];
                $rows = $this->mysql->getList($where,'*','','','','wx_media');
                $row = array_slice($rows['allrow'],0,2);
                $picUrl = 'http://mmbiz.qpic.cn/mmbiz_jpg/ddcarEBVG3yNfC8NIFwcuvKneILpDEnWuzLUNO7FpfgZduwLrKLGqPNDOvtPhmiaItvjAicSkfB9W3JxwJVb8Ngg/0?wx_fmt=jpeg';
                $count = count($row);
                $news = [];
                for($i = 0;$i < $count; ++ $i){
                    $news[$i] = ['Title'=>$row[$i]['title'],'Description'=>$row[$i]['digest'],'PicUrl'=>$picUrl,'Url'=>$row[$i]['url']];
                }
                $this->wechat->news($news,$count)->reply();
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



    }

    /**
     * 视频信息
     * Macarinal
     */
    public function videoMsg($responseArr){

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

    }

    /**
     * 链接信息
     * Macarinal
     */
    public function linkMsg($responseArr){

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
