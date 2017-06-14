<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
class Comment extends Controller{

    public function insertAction(){

        $params = request()->param();


        if(!empty($params)){

            $insertData = [
                'article_id'=>$params['article_id'],
                'content'=>$params['content'],
                'create_time'=>time(),
            ];

            $res = Db::table('xm_comment')->insert($insertData);

            if($res){

                return json(['status'=>1]);
            }else{

                return json(['status'=>0]);
            }

        }else{

            return json(['status'=>0]);
        }
    }
}