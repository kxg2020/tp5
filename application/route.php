<?php
use think\Route;
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------


// 访问路由直接返回值，而不需要经过控制器时的写法

Route::get('hello/:name',function($name){
    return 'Hello,'.$name;
});

return [


    // 全局变量,设置参数的匹配格式
    '__pattern__' => [
        'name'  => '\w+',
        'id'    => '\d+',
        'year'  => '\d{4}',
        'month' => '\d{2}',
    ],


    // 定义路由分组

    //'__miss__'  => 'miss/miss',

    '/'    => 'index/index',


//    '[index]' => [
//        ':year/:month' => ['index/hello', ['method' => 'get'], ['year' => '\d{4}', 'month' => '\d{2}']],
//        ':id'          => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
//        ':name'        => ['index/hello', ['method' => 'get'], ['name' => '\w+']],
//    ],


    // 快捷路由
    '__alias__' =>  [
        //'index'  =>  '\app\index\controller\Index',

    ],


];


