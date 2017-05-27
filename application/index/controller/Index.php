<?php
namespace app\index\controller;
use think\Controller;
use think\Db;


class Index extends Controller{

    public function indexAction(){


        $banner = Db::table('xm_image')->field('image_url')
            ->where(['type'=>2,'is_active'=>1])
            ->order('sort desc')
            ->limit(6)
            ->select();

        $images = Db::table('xm_image')->field('image_url,create_time')
            ->order('create_time desc')
            ->limit(15)
            ->select();

        $gallery = array_chunk($images,3);


        $image = array_slice($images,0,3);

        $articles = Db::table('xm_article')
            ->field('is_top,content,html_content,title,id,create_time,author,article_type,image_url')
            ->order('create_time desc,update_time desc')->select();

        $topThree = [];
        $topOne = [];
        $travels = [];
        $prose = [];
        foreach ($articles as $key => $value){

            if($key <= 2){
                $topThree[$key] = $value;
            }

            if($value['is_top'] == 1){

                $topOne[] = $value;
            }

            if($value['article_type'] === '游记'){

                $travels[] = $value;

            }

            if($value['article_type'] === '散文'){

                $prose[] = $value;
            }
        }

        $travels = array_slice($travels,0,2);

        $prose = array_slice($prose,0,2);

        $this->assign([
            'banner'=>$banner,
            'travels'=>$travels,
            'prose'=>$prose,
            'articles'=>$articles,
            'topThree'=>$topThree,
            'gallery'=>$gallery,
            'topOne'=>$topOne,
            'image'=>$image
        ]);

        return view('index/index');

    }

    public function insertAction(){



    }

    public function delAction(){


    }

    public function editAction(){



    }


}
