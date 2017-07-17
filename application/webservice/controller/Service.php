<?php
namespace app\webservice\controller;
use think\Controller;
use think\Loader;
use Hprose\Http\Server;
class Service extends Controller
{

    public function __construct()
    {
        parent::__construct();

        Loader::import("hprose.vendor.autoload", EXTEND_PATH);;

    }

    public function responseAction(){

        // 实例化类的对象
        $server = new Server();

        // 需要调用的方法和方法对应的类
        $server->addMethod('getUser',new Service());

        // 开始监听
        $server->start();
    }

    public function getUser($paramArr){

        return $paramArr;
    }



}



