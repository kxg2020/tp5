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
            ->limit(9)
            ->select();

        $gallery = array_chunk($images,3);

        $image = array_slice($images,0,3);

        $articles = Db::table('xm_article')->order('create_time desc')->select();

        $topThree = [];

        foreach ($articles as $key => $value){

            if($key <= 3){
                $topThree[$key] = $value;
            }
        }

        $this->assign(['banner'=>$banner,
            'articles'=>$articles,
            'topThree'=>$topThree,
            'gallery'=>$gallery,
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
