<?php
namespace  app\index\controller;

use think\Controller;
use think\Db;
class Article extends Controller{

    public function detailAction(){

        $params = request()->param('','','intval');

        $info = Db::table('xm_article')->where(['id'=>$params['id']])->find();

        Db::table('xm_article')->where(['id'=>$params['id']])->update(['click'=>$info['click'] + 1]);

        $this->assign('article',$info);

        return view('article/detail');
    }
}