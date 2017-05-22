<?php
namespace  app\admin\controller;


use function think\uploadFile;

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
     * 图片上传
     */
    public function upLoadFile(){


        $result = uploadFile();

        // 判断是否上传成功
        if ($result == false) {

            return json(['status'=>0,'msg'=>'上传失败']);
        }

        return json(['status'=>1,'msg'=>'上传成功']);
    }
}