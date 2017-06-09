<?php
namespace app\index\controller;

use think\Controller;


class About extends Controller{

    public function indexAction(){

        return view('about/index');
    }


}