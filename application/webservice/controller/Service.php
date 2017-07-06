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


        $server = new Server();

        $server->addFunction('getUser');
        $server->start();
    }

    function getUser(){

        return "请求getUser成功";
    }



}



