<?php
namespace app\admin\controller;

use think\Controller;

/**
 * Class Message
 * @package app\admin\controller
 * 创蓝短信
 */
class Message extends Controller{


    public $url = "http://m.5c.com.cn/api/send/index.php?";

    public $encode = "UTF-8";

    public $username;

    public $password;

    public $apiKey ;


    public function _initialize($config = []){

        $this->username = $config['username'];

        $this->password = md5($config['password']);

        $this->apiKey = $config['apiKey'];
    }

    public function SendAction($mobile,$content){

        $content = "验证码:".$content."【Macarinal】";

        $contentUrlEncode = urlencode($content);

        $data=array(
            'username'=>$this->username,
            'password_md5'=>$this->password,
            'apikey'=>$this->apiKey,
            'mobile'=>$mobile,
            'content'=>$contentUrlEncode,
            'encode'=>$this->encode,
        );

        $result = $this->curl($this->url,$data);

        return $result;

    }

    /**
     * curl请求
     */
    public function curl($url,$post_fields=array()){
        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_TIMEOUT,30);
        curl_setopt($ch,CURLOPT_HEADER,1);
        curl_setopt($ch,CURLOPT_POST,1);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$post_fields);
        $data = curl_exec($ch);
        curl_close($ch);
        return explode("\r\n\r\n",$data);
    }
}