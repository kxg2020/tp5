<?php
namespace  app\index\controller;

use think\Controller;
use think\Db;
class Article extends Controller{

    public function indexAction(){

        $params = request()->param('','','intval');

        $pgSize = isset($params['pgSize']) ? $params['pgSize'] : 10;

        $pgNum = isset($params['pgNum']) ? $params['pgNum'] : 1;

        $articles = Db::table('xm_article')->field('title,content,create_time,id')->select();

        $articleClicks = Db::table('xm_article')->sum('click');

        $imageNum = Db::table('xm_image')->count();

        $pages = ceil(count($articles) / 10);

        $count = count($articles);

        $articles = pagination($articles,$pgNum,$pgSize);



        if(request()->isAjax()){

            foreach ($articles as &$value){
                $value['create_time'] = date('Y-m-d H:i:s',$value['create_time']);
            }

            unset($value);

            return json(['list'=>$articles,'status'=>1]);
        }

        $this->assign(['articles'=>$articles,
            'pages'=>$pages,
            'count'=>$count,
            'imageNum'=>$imageNum,
            'articleClicks'=>$articleClicks
        ]);

        return view('article/index');
    }

    public function detailAction(){

        $params = request()->param('','','intval');


        $info = Db::table('xm_article')
            ->field('create_time,html_content,author,click,title')
            ->where(['id'=>$params['id']])->find();

        $topThree = Db::table('xm_article')->field('id,title,content,image_url')->order('create_time desc')->limit(8)->select();

        Db::table('xm_article')->where(['id'=>$params['id']])->update(['click'=>$info['click'] + 1]);

        $this->assign(['article'=>$info,'topThree'=>$topThree]);

        return view('article/detail');
    }
}