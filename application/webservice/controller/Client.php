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

        $client = \Hprose\Client::create('http://web.tp.com/service/response', false);

        $args = array(1, 2, 3, 4, 5);

        echo $client->invoke("getUser", $args);


    }
}