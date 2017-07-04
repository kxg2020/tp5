<?php
use  think\Route;
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

//>> www.tp.com/article/detail/id/75.volt 会显示成 www.tp.com/d/75.volt

Route::rule('d/:id','Article/detail','get','id');

Route::rule('/','Index/index','','');

Route::rule('s','Step/index','get','');

Route::rule('a','Article/index','*','');

Route::rule('i','Image/index','*','');

Route::rule('v','Video/index','*','');

//>> 使用分组来优化路由,即访问www.xx.com/b/e/20 访问的是 www.xx.com/blog/edit/20
return [
    '[b]' =>  [
        'e/:id'  => ['RouteTest/edit',['method' => 'get'], ['id' => '\d+']],
        ':id'       => ['RouteTest/add',['method' => 'get'], ['id' => '\d+']],
        'mm/:name'       => ['RouteTest/remove',['method' => 'get'], ['id' => '\d+']],
        '__miss__'  => 'RouteTest/miss',
    ],
];



