<?php
namespace app\webservice\controller;
use Hprose\InvokeSettings;
use think\Controller;
use think\Loader;


class Client extends Controller{

    public function __construct()
    {
        parent::__construct();
        Loader::import("hprose.vendor.autoload", EXTEND_PATH);;
    }

    public function requestAction(){

        // 创建类的对象
        $client = \Hprose\Client::create('http://web.tp.com/service/response', false);

        // 需要传递的参数
        $weeks = array(
            'Monday' => 'Mon',
            'Tuesday' => 'Tue',
            'Wednesday' => 'Wed',
            'Thursday' => 'Thu',
            'Friday' => 'Fri',
            'Saturday' => 'Sat',
            'Sunday' => 'Sun'
        );

        // 是否是引用传参
        $client->getUser["byref"] = true;

        // 调用远程getUser方法
        $client->getUser($weeks, function($result, $args) {
            var_dump($result);
        });

    }
}