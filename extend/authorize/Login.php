<?php
namespace app\index\controller;

use think\Controller;


class About extends Controller{

    public function indexAction(){

        return view('about/index');
    }

    //登录地址
    public function loginAction($type = null){

        if(empty($type)) return false;

        //加载ThinkOauth类并实例化一个对象
        $sns = \authorize\ThinkOauth::getInstance($type);

        //跳转到授权页面
        $this->redirect($sns->getRequestCodeURL());

    }

    //授权回调地址
    public function callback($type = null, $code = null){
        if(empty($type) || empty($code)) return false;

        //加载ThinkOauth类并实例化一个对象

        $sns = \authorize\ThinkOauth::getInstance($type);

        //腾讯微博需传递的额外参数
        $extend = null;
        if ($type == 'tencent') {
            $extend = array('openid' => $this->_get('openid'), 'openkey' => $this->_get('openkey'));
        }

        //请妥善保管这里获取到的Token信息，方便以后API调用
        //调用方法，实例化SDK对象的时候直接作为构造函数的第二个参数传入
        //如： $qq = ThinkOauth::getInstance('qq', $token);
        $token = $sns->getAccessToken($code, $extend);

        //获取当前登录用户信息
        if (is_array($token)) {
            $user_info = A('Type', 'Event')->$type($token);

            echo("<h1>恭喜！使用 {$type} 用户登录成功</h1><br>");
            echo("授权信息为：<br>");
            dump($token);
            echo("当前登录用户信息为：<br>");
            dump($user_info);
        }
    }

}