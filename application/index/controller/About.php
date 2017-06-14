<?php
namespace app\index\controller;

use think\Controller;
use think\Db;

class About extends Controller{

    public function indexAction(){

        return view('about/index');
    }



}