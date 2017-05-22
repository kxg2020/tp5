<?php
namespace think;
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------


function uploadFile(){

    Loader::import('upload.uploads',EXTEND_PATH);

    //>> 获取配置
    $config = Config::get('upload');

    $upload = new \Uploads($config);

    $result = $upload->uploadOne(array_shift($_FILES));

    return $result;
}
