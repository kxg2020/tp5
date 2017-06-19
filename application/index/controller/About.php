<?php

namespace app\index\controller;

use think\Controller;
use think\Db;
class About extends Controller{

    public function indexAction(){

        $articles = Db::table('xm_article')->paginate(2);
        $page = $articles->render();

        $this->assign(['page'=>$page]);
        return view('about/index');
    }
}

