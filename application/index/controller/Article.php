<?php
namespace  app\index\controller;

use think\Controller;
use think\Db;
class Article extends Controller{

    public function indexAction(){

        $params = request()->param('','','intval');

        $pgSize = isset($params['pgSize']) ? $params['pgSize'] : 4;

        $pgNum = isset($params['pgNum']) ? $params['pgNum'] : 1;

        $articles = Db::table('xm_article')->field('title,content,create_time,id,click,author,image_url,article_type')->select();

        $imageNum = Db::table('xm_image')->count();

        $pages = ceil(count($articles) / 4);

        $count = count($articles);

        $articles = pagination($articles,$pgNum,$pgSize);



        if(request()->isAjax()){

            foreach ($articles as &$value){
                $value['create_time'] = date('Y-m-d H:i:s',$value['create_time']);
                $value['content'] = mb_substr($value['content'],0,100,'UTF-8');
            }

            unset($value);

            return json(['list'=>$articles,'status'=>1]);
        }

        $this->assign(['articles'=>$articles,
            'pages'=>$pages,
            'count'=>$count,
            'imageNum'=>$imageNum,
        ]);


        return view('article/index');
    }

    public function detailAction(){

        $params = request()->param();


        $info = Db::table('xm_article')
            ->field('create_time,html_content,author,click,title,id')
            ->where(['id'=>$params['id']])->find();

        $comments = Db::table('xm_comment')->where(['article_id'=>$info['id']])->order('create_time desc')->select();

        $topThree = Db::table('xm_article')->field('id,title,content,image_url')->order('create_time desc')->limit(8)->select();

        Db::table('xm_article')->where(['id'=>$params['id']])->update(['click'=>$info['click'] + 1]);

        $this->assign(['article'=>$info,'topThree'=>$topThree,'comments'=>$comments]);

        return view('article/detail');
    }


}