<?php
namespace app\admin\controller;

use think\Controller;

class About extends Controller{

    public function exampleAction(){

        $params = request()->get();

        $callback = $params['callback'];

        $data = json_encode([
            'url'=>'backend.macarin.cn',
            'author'=>'kxg2020'
        ]);

        echo $callback."($data)";
    }
}