<?php
namespace app\admin\controller;
use qiniu\Auth;
use qiniu\Storage\BucketManager;
use think\Loader;
use think\Db;
use think\Config;
class Video extends Base{

    /**
     * 视频列表
     */
    public function indexAction(){

        $videos = Db::table('xm_video')->paginate(7);

        $pages = $videos->render();
        $this->assign(['videos'=>$videos,'pages'=>$pages]);

        return view('video/index');
    }

    /**
     * 视频添加
     */
    public function insertAction(){

        if(request()->isAjax()){

            $params = request()->param('','','string');

            $video = Db::table('xm_video')->where(['video_url'=>$params['video_url']])->find();
            if(empty($video)){

                $insertData = [
                    'video_url'=>$params['video_url'],
                    'video_image'=>$params['video_image'],
                    'video_name'=>$params['name'],
                    'create_time'=>time(),
                ];

                Db::table('xm_video')->insert($insertData);

            }

        }

        return view('video/insert');
    }

    /**
     * 视频删除
     */
    public function deleteAction(){

        $param = request()->param('','','intval');

        $video = Db::table('xm_video')->where(['id'=>$param['id']])->find();

        $name = $video['video_name'];

        //>> 删除七牛
        $res = $this->qiniuAction($name);
        if($res){

            $res = Db::table('xm_video')->where(['id'=>$param['id']])->delete();

            if($res){

                return json(['status'=>1]);
            }else{

                return json(['status'=>0]);
            }

        }
    }

    /**
     * 删除七牛
     */
    public function qiniuAction($name){

        Loader::import('qiniu.autoload',EXTEND_PATH);

        $accessKey = Config::get('upload_type_config.accessKey');

        $secretKey = Config::get('upload_type_config.secretKey');

        $auth = new Auth($accessKey,$secretKey);

        $bucketMgr = new BucketManager($auth);

        $bucket = Config::get('upload_type_config.bucket');

        $err = $bucketMgr->delete($bucket, $name);
        if ($err != null) {

            return $err;

        } else {

            return true;
        }
    }

    /**
     * 获取TOKEN
     */
    public function tokenAction(){

        Loader::import('qiniu.autoload',EXTEND_PATH);

        // 用于签名的公钥和私钥
        $accessKey = Config::get('upload_type_config.accessKey');

        $secretKey = Config::get('upload_type_config.secretKey');
        // 初始化签权对象
        $auth = new Auth($accessKey, $secretKey);

        $bucket = Config::get('upload_type_config.bucket');
        // 生成上传Token
        $token = $auth->uploadToken($bucket,null,600);

        // uptoken
        return json(['uptoken'=>$token]);
    }
}