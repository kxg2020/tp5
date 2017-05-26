<?php
namespace app\admin\controller;

use think\Cookie;
use think\Session;

class Index extends  Base {

    public function indexAction(){

        if($this->isLogin == 0){

            $this->redirect('login/index');

            return false;
        }


        return view('index/index');

    }

}
