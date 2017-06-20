<?php

namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;

class About extends Controller{


    public function indexAction(){


        $articles = Db::table('xm_article')->paginate(1);;


        $this->assign(['articles'=>$articles]);
        return view('about/index');
    }


    public function payAction(){


    }

}

