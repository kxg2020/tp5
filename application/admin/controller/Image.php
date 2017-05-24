<?php
namespace  app\admin\controller;
use think\Db;
class Image extends Base{


    /**
     * 图片展示
     */
    public function indexAction(){

        $params = request()->param();

        $pgNum = isset($params['pgNum']) ? $params['pgNum'] : 1;

        $pgSize = isset($params['pgSize']) ? $params['pgSize'] : 6;

        $list = Db::table('xm_image')->select();

        foreach ($list as $key => &$value){

            $value['create_time'] = date('Y-m-d H:i:s',$value['create_time']);
            switch ($value['type']){
                case 1:
                    $value['type'] = '照片';
                    break;
            }
        }
        unset($value);

        $pages = ceil(count($list) / 6);

        $images = pagination($list,$pgNum,$pgSize);

        if($this->request->isAjax()){

            return json(['status'=>1,'list'=>$images]);
        }

        $this->assign(['images'=>$images,'pages'=>$pages]);

        return view('image/index');
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

        if($res == false){

            return json(['status'=>0,'msg'=>'删除失败']);
        }

        return json(['status'=>1,'msg'=>'删除成功']);
    }


    /**
     * 修改状态
     */
    public function updateAction(){

        $params = request()->param('','','intval');

        $status = 1 ^ $params['is_active'];

        $result = Db::table('xm_image')->where(['id'=>$params['id']])->update(['is_active'=>$status]);

        if($result == false){

            return json(['status'=>0,'msg'=>'修改失败']);
        }

        return json(['status'=>1,'msg'=>'修改成功']);

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