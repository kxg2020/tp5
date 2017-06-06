<?php
namespace app\index\controller;

use think\Controller;
use think\Db;

class About extends Controller{

    public function indexAction(){

        $articles = Db::table('xm_article')->paginate(3);

        $page = $articles->render();
        $this->assign(['list'=>$articles,'page'=>$page]);
        return view('about/index');

    }
}