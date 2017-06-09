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

//>> www.tp.com/article/detail/id/75.volt 会显示成 www.tp.com/d/id/75.volt

Route::rule('d/:id','Article/detail','get','id');

Route::rule('/','Index/index','','');

Route::rule('s','Step/index','get','');

Route::rule('a','Article/index','*','');

Route::rule('i','Image/index','*','');

Route::rule('v','Video/index','*','');



