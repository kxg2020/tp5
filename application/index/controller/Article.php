<?php
namespace  app\index\controller;

use think\Controller;
use think\Db;
class Article extends Controller{

    public function indexAction(){

        $articles = Db::table('xm_article')->field('title,content,create_time,id')->select();

        $this->assign(['articles'=>$articles]);
        return view('article/index');
    }

    public function detailAction(){

        $params = request()->param('','','intval');

        $info = Db::table('xm_article')
            ->field('create_time,html_content,author,click,title')
            ->where(['id'=>$params['id']])->find();

        $topThree = Db::table('xm_article')->field('id,title,content,image_url')->order('create_time desc')->select();

        Db::table('xm_article')->where(['id'=>$params['id']])->update(['click'=>$info['click'] + 1]);

        $this->assign(['article'=>$info,'topThree'=>$topThree]);

        return view('article/detail');
    }
}