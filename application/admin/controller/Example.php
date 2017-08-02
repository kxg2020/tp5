<?php
namespace app\admin\controller;
use GatewayWorker\Lib\Gateway;
use think\Controller;
use think\Db;
use think\Loader;

class Example extends Base {

    private $name;

    private static $age;
    public function exportAction(){

        $article = Db::table('xm_article')->select();

        $xlsCell = array(
            array('id', '编号'),
            array('title', '标题'),
            array('author', '用户'),
        );
        $this->exportExcel(date('Y-m-d') . '_文章列表', $xlsCell, $article);
    }







}