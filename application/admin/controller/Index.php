<?php
namespace app\admin\controller;

class Index extends  Base {

    public function indexAction(){

        if($this->isLogin == 0){

            $this->redirect('login/index');

            return false;
        }


        return view('index/index');

    }

}
