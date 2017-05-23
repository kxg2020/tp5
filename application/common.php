<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------
use  upload\Upload;

function upload(){

    //>> 获取上传配置
    $config = \think\Config::get('upload');

    //>> 获取七牛配置
    $qiniu = \think\Config::get('qiniu');

    $driver = \think\Config::get('driver');

    $upload = new Upload($config,$driver,$qiniu);

    $result = $upload->uploadOne(array_shift($_FILES));

    return $result;
}
