<?php
namespace  app\admin\controller;
use think\Db;
class Image extends Base{


    /**
     * 图片展示
     */
    public function indexAction(){

        echo  1;
    }


    /**
     * 图片添加
     */
    public function insertAction(){


        return view('image/insert');
    }

    /**
     * 图片删除
     */
    public function deleteAction(){

        $param = request()->param('id','','intval');

        $res = Db::table('xm_image')->where(['id'=>$param])->delete();

        if(!$res){

            return json(['status'=>0]);
        }

        return json(['status'=>1]);
    }


    /**
     * 图片上传
     */
    public function uploadAction(){

        $result = upload();

        //>> 判断是否上传成功
        if ($result == false) {

            return json(['status'=>0,'msg'=>'上传失败']);
        }

        $insertData = [
            'image_url'=>$result['url'],
            'type'=>'1',
            'create_time'=>time(),
            'is_active'=>1,
            'sort'=>1
        ];

        //>> 保存到数据库
        $id = Db::table('xm_image')->insertGetId($insertData);

        if($id){

            return json([
                'status'=>1,
                'msg'=>'上传成功',
                'data'=>[
                    'savename'=>$result['savename'],
                    'url'=>$result['url'],
                    'size'=>$result['size'],
                ],
                'id'=>$id
            ]);
        }else{

            return json(['status'=>0,'msg'=>'上传失败']);
        }
    }
}