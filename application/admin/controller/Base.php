<?php
namespace app\admin\controller;
use think\Controller;
use think\Cookie;
use think\Session;
use think\Db;

class Base extends  Controller{

    public $isLogin = 0;
    public $userInfo = [];
    public function _initialize()
    {
        //>> 取session
        $session_token = Session::get(sha1('admin_user_session'));


        if(!empty($session_token)){

            //>> 根据session查询用户
            $userInfo = Db:: table('xm_user')->where(['session_token'=>$session_token])->find();
            if(!empty($userInfo)){

                $this->assign('userInfo',$userInfo);
                $this->isLogin = 1;
                $this->userInfo = $userInfo;
            }

        }else{

            //>> session为空,就取出cookie
            $cookie_token = Cookie::get(sha1('admin_user_cookie'));

            //>> 根据cookie查询用户
            $userInfo = Db::table('xm_user')->where(['cookie_token'=>$cookie_token])->find();

            if(!empty($userInfo)){
                $this->assign('userInfo',$userInfo);
                $this->isLogin = 1;
                $this->userInfo = $userInfo;
            }

        }

    }



}