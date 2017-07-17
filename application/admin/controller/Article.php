<?php
namespace app\admin\controller;
use  think\Db;
class Article extends Base {


    /**
     * 文章列表
     */
    public function indexAction(){

        if($this->isLogin == 0){ $this->redirect('login/index');};

        $params = request()->param('','','intval');

        $pgNum = isset($params['pgNum']) ? $params['pgNum'] : 1;

        $pgSize = isset($params['pgSize']) ? $params['pgSize'] : 10;

        $list = Db::table('xm_article')->order('create_time desc')->select();

        foreach ($list as $key => &$value){

            $value['title'] = mb_substr($value['content'],0,24,'utf-8');
        }
        unset($value);

        $pages = ceil(count($list) / 10);

        $articles = pagination($list,$pgNum,$pgSize);

        if(request()->isAjax()){

            return json(['status'=>1,'articles'=>$articles]);
        }

        $this->assign([
            'pages'=>$pages,
            'articles'=>$articles,
        ]);
        return view('article/index');
    }

    /**
     * 文章添加
     */
    public function insertAction(){

        if($this->isLogin == 0){ $this->redirect('login/index');};

        if(request()->isAjax()){

            $params = request()->param('');

            if($params){
                $insertData = [
                    'title'=>$params['title'],
                    'image_url'=>$params['image_url'],
                    'html_content'=>$params['html'],
                    'content'=>$params['content'],
                    'author'=>'董小姐',
                    'type'=>'1',
                    'article_type'=>$params['article_type'],
                    'create_time'=>time(),
                    'is_active'=>1,
                    'is_top'=>isset($params['is_top']) ? $params['is_top'] : 0
                ];

                $result = Db::table('xm_article')->insertGetId($insertData);

                if($result){

                    return json(['status'=>1,'msg'=>'保存成功']);
                }
            }else{

                return json(['status'=>0,'msg'=>'数据为空']);
            }
        }

        return view('article/insert');
    }

    /**
     * 删除文章
     */
    public function deleteAction(){

        $param = request()->param('id','','intval');

        $result = Db::table('xm_article')->where(['id'=>$param])->delete();

        if($result == false){

            return json(['status'=>0]);
        }

        return json(['status'=>1]);
    }

    /**
     * 文章编辑
     */
    public function editAction(){

        $param = request()->param('id','','intval');

        $article = Db::table('xm_article')->where(['id'=>$param])->find();

        $this->assign('article',$article);

        return view('article/edit');
    }

    /**
     * 文章预览
     */
    public function detailAction(){

        $param  = request()->param('id','','intval');

        $article = Db::table('xm_article')->where(['id'=>$param])->find();

        $this->assign('article',$article);

        return view('article/detail');
    }

    /**
     * 文章更新
     */

    public function updateAction(){

        $params = request()->param();

        $updateData = [
            'update_time'=>time(),
            'title'=>$params['title'],
            'content'=>$params['content'],
            'html_content'=>$params['html'],
            'type'=>1,
            'is_active'=>1,
            'author'=>'董小姐',
            'is_top'=>isset($params['is_top']) ? $params['is_top'] : 0
        ];
        $result = Db::table('xm_article')->where(['id'=>$params['id']])->update($updateData);

        if($result == false){

            return json(['status'=>0,'msg'=>'更新失败']);
        }

        return json(['status'=>1,'msg'=>'更新成功']);
    }

    /**
     * 图片上传
     */
    public function uploadAction(){


        $callback = request()->param('CKEditorFuncNum','','string');
        $result = upload();

        //>> 判断是否上传成功
        if ($result == false) {

            return json(['status'=>0,'msg'=>'上传失败']);
        }

        if($result){

            return "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($callback,'".$result['url']."','');</script>";

        }else{

            return json(['status'=>0,'msg'=>'上传失败']);
        }
    }

    /**
     * 封面上传
     */
    public function uploadOneAction(){

        $result = upload();

        //>> 判断是否上传成功
        if ($result == false) {

            return json(['status'=>0,'msg'=>'上传失败']);
        }

        if($result){

            return json(['status'=>1,'data'=>$result]);

        }else{

            return json(['status'=>0,'msg'=>'上传失败']);
        }
    }
}