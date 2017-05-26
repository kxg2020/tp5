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
use utils\Util;
/**
 * @return array 图片上传
 */
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

/**
 * @param array $data
 * @param string $pgNum
 * @param string $pgSize
 * @return array|bool
 * 分页方法
 */
function pagination($data = [], $pgNum = '', $pgSize = ''){

    if(empty($data)) return false;

    $start = ($pgNum - 1) * $pgSize;

    $sliceArr = array_slice($data,$start,$pgSize);

    return $sliceArr;
}


/**
 * 检测输入
 */
function checkInput(){

    $instance = new Util();

    return $instance;
}

