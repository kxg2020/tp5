<?php
namespace app\admin\controller;
use  captcha\Captcha;
use think\Config;
use think\Cookie;
use think\Session;
use  think\Db;
class Login extends Base{

    /**
     * 登录界面
     */
    public function indexAction(){

        if($this->isLogin == 1){

            $this->redirect('index/index');

            return false;
        }

        return view('login/index');
    }

    /**
     * 检测用户
     */
    public function checkAction(){

        $params = request()->param('','','string');

        $username = checkInput()->validateGeneralString($params['username']);

        $password = checkInput()->validatePwd($params['password']);

        $captcha = Session::get(sha1('captcha'));

        if(!$username){return json(['status'=>0,'msg'=>'用户或密码格式错误']);}

        if(!$password){return json(['status'=>0,'msg'=>'用户或密码格式错误']);}

        if($captcha != $params['captcha']){return json(['status'=>0,'msg'=>'验证码错误']);}

        $user = Db::table('xm_user')
                ->field('username,password,salt,id')->where(['username'=>$params['username']])->find();


        if(empty($user)){ return json(['status'=>0,'msg'=>'用户名或密码错误']);}

        $saltPassword = md5($params['password'].$user['salt']);

        if($user['password'] != $saltPassword){ return json(['status'=>0,'msg'=>'用户名或密码错误']);}

        //>> 保存用户信息到session
        $session_token = md5(microtime().round(0,999).'!@#$%^&*()_+').base64_encode('admin_user');

        //>> 保存到数据库
         Db::table('xm_user')
                    ->where(['username'=>$params['username']])
                    ->update(['session_token'=>$session_token]);

        Session::set(sha1('admin_user_session'),$session_token);

        //>> 判断是否保存信息
        if(!empty($params['remember']) && $params['remember'] == 1){

            $cookie_token = md5(microtime().round(0,666).'!@#$%^').base64_encode('admin_user');

            Db::table('xm_user')->where(['username'=>$params['username']])->update(['cookie_token'=>$cookie_token]);

            Cookie::set(sha1('admin_user_cookie'),$cookie_token);

        }

        return json(['status'=>1,'msg'=>'登录成功']);


    }

    /**
     * 退出登录
     */
    public function logoutAction(){

        Session::destroy();

        Cookie::delete(sha1('admin_user_cookie'));

        $this->redirect('login/index');
    }

    /**
     * 验证码
     */
    public function captchaAction()
    {

        $config = Config::get('captcha');

        $captcha = new Captcha($config);


        $code = $captcha->getCheckCode();

        if($code){

            Session::set(sha1('captcha'),strtolower($code));

            $captcha->showImage();
        }
    }

}