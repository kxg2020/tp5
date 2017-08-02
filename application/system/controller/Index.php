<?php
namespace app\system\controller;

use think\Controller;

class Index extends Controller {

    public function IndexAction(){

        return view("index/index");

    }

    public function SendAction(){

        // 建立socket连接到内部推送端口
        $client = stream_socket_client('websocket://127.0.0.1:2346', $errno, $errmsg, 1);
        // 推送的数据，包含uid字段，表示是给这个uid推送
        $data = array(['hello'=>'hi']);
        // 发送数据，注意5678端口是Text协议的端口，Text协议需要在数据末尾加上换行符
        fwrite($client, json_encode($data));
        // 读取推送结果
        echo fread($client, 8192);
    }

}
