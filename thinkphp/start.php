<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2017 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

    namespace think;

    // ThinkPHP 引导文件
    // 加载基础文件
    require __DIR__ . '/base.php';

    //>> 根据build.php生产模块
//    if (is_file(ROOT_PATH . 'build.php')) {
//        Build::run(include ROOT_PATH . 'build.php');
//    }


    //默认模块为index,路由检测开启开启域名部署后
    switch ($_SERVER['HTTP_HOST']) {

        case 'home.tp.com':
            $route = true;// 意思就是开启url重写规则
            Route::bind('index','module');// 绑定当前入口文件到模块/控制器/方法
            App::route($route);// 路由
            break;


        case 'admin.tp.com':
            $route = false;// 意思就是关闭url重写规则
            Route::bind('admin','module');
            App::route($route);// 路由
            break;

        case 'wechat.tp.com':
            $route = true;// 意思就是关闭url重写规则
            Route::bind('wechat','module');
            App::route($route);// 路由
            break;
    }

    // 执行应用
    App::run()->send();
