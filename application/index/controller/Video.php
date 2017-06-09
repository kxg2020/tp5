<?php
namespace app\index\controller;

use think\Controller;

class Video extends Controller{

    public function indexAction(){

        return view('video/index');
    }
}