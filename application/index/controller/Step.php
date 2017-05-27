<?php
namespace  app\index\controller;

use think\Controller;

class Step extends Controller{

    public function IndexAction(){

        return view('step/index');
    }
}