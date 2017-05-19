<?php
namespace app\index\controller;
use think\Controller;
use think\Db;


class Index extends Controller{

    public function indexAction(){


        //>> 查询
        $info = Db::table('an_member_recharge a')
            ->field('a.money,b.*')
            ->join('an_member b','a.member_id = b.id','LEFT')
            ->where(['a.member_id'=>11])
            ->select();

        $this->assign('info',$info);

        return view('index/index');

    }

    public function insertAction(){

        echo  1;exit;

        //>> 添加
        $insertData = [
            'name'=>'大宝',
            'image_url'=>'www.baidu.com',
            'create_time'=>time(),
            'account'=>'123456',
            'bank'=>'农业银行',
            'username'=>'Macarinal'
        ];

        Db::table('an_pay')->insert($insertData);

    }

    public function delAction(){

        //>> 删除
        Db::table('an_pay')->where(['id'=>1])->delete();
    }

    public function editAction(){

        Db::table('an_pay')->where(['id'=>9])->update(['name'=>'zhangtao']);

    }


}
