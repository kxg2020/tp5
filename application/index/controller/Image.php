<?php
namespace app\index\controller;

use think\Controller;

class Image extends Controller{

    public function indexAction(){

        return view('image/index');
    }
}