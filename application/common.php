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
use think\Config;
/**
 * @return array 图片上传
 */
function upload(){

    //>> 获取上传配置
    $config = Config::get('upload');

    //>> 获取七牛配置
    $qiniu = Config::get('qiniu');

    $driver = Config::get('driver');

    $upload = new Upload($config,$driver,$qiniu);

    $result = $upload->uploadOne(array_shift($_FILES));

    return $result;
}

/**
 * 微信实例
 */
function wechat(){

    $config = Config::get('wechat');


    return \utils\WeChat::getInstance($config);
}

/**
 * @param array $data
 * @param string $pgNum
 * @param string $pgSize
 * @return array|bool
 * 数组分页
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

/**
 * Redis实例
 */
function getRedis(){

    $instance = new Redis();


    $instance->connect('127.0.0.1',6379);


    return $instance;

}

/**
 * 二维数组排序
 * @param $arr
 * @param $keys
 * @param string $type
 * @return array
 */
function array_sort($arr, $keys, $type = 'desc')
{
    $key_value = $new_array = array();
    foreach ($arr as $k => $v) {
        $key_value[$k] = $v[$keys];
    }
    if ($type == 'asc') {
        asort($key_value);
    } else {
        arsort($key_value);
    }
    reset($key_value);
    foreach ($key_value as $k => $v) {
        $new_array[$k] = $arr[$k];
    }
    return $new_array;
}

/**
 * 多维数组转化为一维数组
 * @param 多维数组
 * @return array 一维数组
 */
function array_multi2single($array)
{
    static $result_array = array();
    foreach ($array as $value) {
        if (is_array($value)) {
            array_multi2single($value);
        } else
            $result_array [] = $value;
    }
    return $result_array;
}

/**
 * 友好时间显示
 * @param $time
 * @return bool|string
 */
function friend_date($time)
{
    if (!$time)
        return false;
    $fdate = '';
    $d = time() - intval($time);
    $ld = $time - mktime(0, 0, 0, 0, 0, date('Y')); //得出年
    $md = $time - mktime(0, 0, 0, date('m'), 0, date('Y')); //得出月
    $byd = $time - mktime(0, 0, 0, date('m'), date('d') - 2, date('Y')); //前天
    $yd = $time - mktime(0, 0, 0, date('m'), date('d') - 1, date('Y')); //昨天
    $dd = $time - mktime(0, 0, 0, date('m'), date('d'), date('Y')); //今天
    $td = $time - mktime(0, 0, 0, date('m'), date('d') + 1, date('Y')); //明天
    $atd = $time - mktime(0, 0, 0, date('m'), date('d') + 2, date('Y')); //后天
    if ($d == 0) {
        $fdate = '刚刚';
    } else {
        switch ($d) {
            case $d < $atd:
                $fdate = date('Y年m月d日', $time);
                break;
            case $d < $td:
                $fdate = '后天' . date('H:i', $time);
                break;
            case $d < 0:
                $fdate = '明天' . date('H:i', $time);
                break;
            case $d < 60:
                $fdate = $d . '秒前';
                break;
            case $d < 3600:
                $fdate = floor($d / 60) . '分钟前';
                break;
            case $d < $dd:
                $fdate = floor($d / 3600) . '小时前';
                break;
            case $d < $yd:
                $fdate = '昨天' . date('H:i', $time);
                break;
            case $d < $byd:
                $fdate = '前天' . date('H:i', $time);
                break;
            case $d < $md:
                $fdate = date('m月d日 H:i', $time);
                break;
            case $d < $ld:
                $fdate = date('m月d日', $time);
                break;
            default:
                $fdate = date('Y年m月d日', $time);
                break;
        }
    }
    return $fdate;
}

/**
 * 获取客户端IP
 */
function getIP(){
    if (getenv("HTTP_CLIENT_IP"))
        $ip = getenv("HTTP_CLIENT_IP");
    else if(getenv("HTTP_X_FORWARDED_FOR"))
        $ip = getenv("HTTP_X_FORWARDED_FOR");
    else if(getenv("REMOTE_ADDR"))
        $ip = getenv("REMOTE_ADDR");
    else $ip = "Unknow";

    if(preg_match('/^((?:(?:25[0-5]|2[0-4]\d|((1\d{2})|([1-9]?\d)))\.){3}(?:25[0-5]|2[0-4]\d|((1\d{2})|([1 -9]?\d))))$/', $ip))
        return $ip;
    else
        return '';
}

/**
 *服务器端IP
 */
function serverIP(){
    return gethostbyname($_SERVER["SERVER_NAME"]);
}

/**
 * 自定义函数递归的复制带有多级子目录的目录
 * 递归复制文件夹
 * @param type $src 原目录
 * @param type $dst 复制到的目录
 */
function recurse_copy($src, $dst)
{
    $now = time();
    $dir = opendir($src);
    @mkdir($dst);
    while (false !== $file = readdir($dir)) {
        if (($file != '.') && ($file != '..')) {
            if (is_dir($src . '/' . $file)) {
                recurse_copy($src . '/' . $file, $dst . '/' . $file);
            }
            else {
                if (file_exists($dst . DIRECTORY_SEPARATOR . $file)) {
                    if (!is_writeable($dst . DIRECTORY_SEPARATOR . $file)) {
                        exit($dst . DIRECTORY_SEPARATOR . $file . '不可写');
                    }
                    @unlink($dst . DIRECTORY_SEPARATOR . $file);
                }
                if (file_exists($dst . DIRECTORY_SEPARATOR . $file)) {
                    @unlink($dst . DIRECTORY_SEPARATOR . $file);
                }
                $copyrt = copy($src . DIRECTORY_SEPARATOR . $file, $dst . DIRECTORY_SEPARATOR . $file);
                if (!$copyrt) {
                    echo 'copy ' . $dst . DIRECTORY_SEPARATOR . $file . ' failed<br>';
                }
            }
        }
    }
    closedir($dir);
}

/*
 * 递归删除文件夹
 */
function delFile($path,$delDir = FALSE) {
    if(!is_dir($path))
        return FALSE;
    $handle = @opendir($path);
    if ($handle) {
        while (false !== ( $item = readdir($handle) )) {
            if ($item != "." && $item != "..")
                is_dir("$path/$item") ? delFile("$path/$item", $delDir) : unlink("$path/$item");
        }
        closedir($handle);
        if ($delDir) return rmdir($path);
    }else {
        if (file_exists($path)) {
            return unlink($path);
        } else {
            return FALSE;
        }
    }
}

/**
 * 将二维数组以元素的某个值作为键 并归类数组
 * array( array('name'=>'aa','type'=>'pay'), array('name'=>'cc','type'=>'pay') )
 * array('pay'=>array( array('name'=>'aa','type'=>'pay') , array('name'=>'cc','type'=>'pay') ))
 * @param $arr 数组
 * @param $key 分组值的key
 * @return array
 */
function group_same_key($arr,$key){
    $new_arr = array();
    foreach($arr as $k=>$v ){
        $new_arr[$v[$key]][] = $v;
    }
    return $new_arr;
}


/**
 * 获取随机字符串
 * @param int $randLength  长度
 * @param int $addtime  是否加入当前时间戳
 * @param int $includenumber   是否包含数字
 * @return string
 */
function get_rand_str($randLength=6,$addtime=1,$includenumber=0){
    if ($includenumber){
        $chars='abcdefghijklmnopqrstuvwxyzABCDEFGHJKLMNPQEST123456789';
    }else {
        $chars='abcdefghijklmnopqrstuvwxyz';
    }
    $len=strlen($chars);
    $randStr='';
    for ($i=0;$i<$randLength;$i++){
        $randStr.=$chars[rand(0,$len-1)];
    }
    $tokenvalue=$randStr;
    if ($addtime){
        $tokenvalue=$randStr.time();
    }
    return $tokenvalue;
}

/**
 * CURL请求
 * @param $url 请求url地址
 * @param $method 请求方法 get post
 * @param null $postfields post数据数组
 * @param array $headers 请求header信息
 * @param bool|false $debug  调试开启 默认false
 * @return mixed
 */
function httpRequest($url, $method="GET", $postfields = null, $headers = array(), $debug = false) {
    $method = strtoupper($method);
    $ci = curl_init();
    /* Curl settings */
    curl_setopt($ci, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
    curl_setopt($ci, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.2; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0");
    curl_setopt($ci, CURLOPT_CONNECTTIMEOUT, 60); /* 在发起连接前等待的时间，如果设置为0，则无限等待 */
    curl_setopt($ci, CURLOPT_TIMEOUT, 7); /* 设置cURL允许执行的最长秒数 */
    curl_setopt($ci, CURLOPT_RETURNTRANSFER, true);
    switch ($method) {
        case "POST":
            curl_setopt($ci, CURLOPT_POST, true);
            if (!empty($postfields)) {
                $tmpdatastr = is_array($postfields) ? http_build_query($postfields) : $postfields;
                curl_setopt($ci, CURLOPT_POSTFIELDS, $tmpdatastr);
            }
            break;
        default:
            curl_setopt($ci, CURLOPT_CUSTOMREQUEST, $method); /* //设置请求方式 */
            break;
    }
    $ssl = preg_match('/^https:\/\//i',$url) ? TRUE : FALSE;
    curl_setopt($ci, CURLOPT_URL, $url);
    if($ssl){
        curl_setopt($ci, CURLOPT_SSL_VERIFYPEER, FALSE); // https请求 不验证证书和hosts
        curl_setopt($ci, CURLOPT_SSL_VERIFYHOST, FALSE); // 不从证书中检查SSL加密算法是否存在
    }
    //curl_setopt($ci, CURLOPT_HEADER, true); /*启用时会将头文件的信息作为数据流输出*/
    curl_setopt($ci, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ci, CURLOPT_MAXREDIRS, 2);/*指定最多的HTTP重定向的数量，这个选项是和CURLOPT_FOLLOWLOCATION一起使用的*/
    curl_setopt($ci, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ci, CURLINFO_HEADER_OUT, true);
    /*curl_setopt($ci, CURLOPT_COOKIE, $Cookiestr); * *COOKIE带过去** */
    $response = curl_exec($ci);
    $requestinfo = curl_getinfo($ci);
    $http_code = curl_getinfo($ci, CURLINFO_HTTP_CODE);
    if ($debug) {
        echo "=====post data======\r\n";
        var_dump($postfields);
        echo "=====info===== \r\n";
        print_r($requestinfo);
        echo "=====response=====\r\n";
        print_r($response);
    }
    curl_close($ci);
    return $response;
}

/**
 * 检查手机号码格式
 * @param $mobile 手机号码
 */
function checkMobile($mobile){
    if(preg_match('/1[34578]\d{9}$/',$mobile))
        return true;
    return false;
}

/**
 * 检查固定电话
 * @param $mobile
 * @return bool
 */
function checkTelephone($mobile){
    if(preg_match('/^([0-9]{3,4}-)?[0-9]{7,8}$/',$mobile))
        return true;
    return false;
}

/**
 * 检查邮箱地址格式
 * @param $email 邮箱地址
 */
function checkEmail($email){
    if(filter_var($email,FILTER_VALIDATE_EMAIL))
        return true;
    return false;
}


/**
 *   实现中文字串截取无乱码的方法
 */
function getSubStr($string, $start, $length) {
    if(mb_strlen($string,'utf-8')>$length){
        $str = mb_substr($string, $start, $length,'utf-8');
        return $str.'...';
    }else{
        return $string;
    }
}


/**
 * 判断当前访问的用户是PC端还手机端,返回true为手机端,false为PC端
 * @return boolean
 */
function isMobile()
{
    // 如果有HTTP_X_WAP_PROFILE则一定是移动设备
    if (isset ($_SERVER['HTTP_X_WAP_PROFILE']))
        return true;

    // 如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
    if (isset ($_SERVER['HTTP_VIA']))
    {
        // 找不到为flase,否则为true
        return stristr($_SERVER['HTTP_VIA'], "wap") ? true : false;
    }
    // 脑残法，判断手机发送的客户端标志,兼容性有待提高
    if (isset ($_SERVER['HTTP_USER_AGENT']))
    {
        $clientkeywords = array ('nokia','sony','ericsson','mot','samsung','htc','sgh','lg','sharp','sie-','philips','panasonic','alcatel','lenovo','iphone','ipod','blackberry','meizu','android','netfront','symbian','ucweb','windowsce','palm','operamini','operamobi','openwave','nexusone','cldc','midp','wap','mobile');
        // 从HTTP_USER_AGENT中查找手机浏览器的关键字
        if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT'])))
            return true;
    }
    // 协议法，因为有可能不准确，放到最后判断
    if (isset ($_SERVER['HTTP_ACCEPT']))
    {
        // 如果只支持wml并且不支持html那一定是移动设备
        // 如果支持wml和html但是wml在html之前则是移动设备
        if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html'))))
        {
            return true;
        }
    }
    return false;
}

function isWeixin() {
    if (strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false) {
        return true;
    } return false;
}

function isQq() {
    if (strpos($_SERVER['HTTP_USER_AGENT'], 'QQ') !== false) {
        return true;
    } return false;
}
function isAlipay() {
    if (strpos($_SERVER['HTTP_USER_AGENT'], 'AlipayClient') !== false) {
        return true;
    } return false;
}

/*
 * 获取中文字符拼音首字母
 */
function getFirstCharter($str){
    if(empty($str))
    {
        return '';
    }
    $fchar=ord($str{0});
    if($fchar>=ord('A')&&$fchar<=ord('z')) return strtoupper($str{0});
    $s1=iconv('UTF-8','gb2312',$str);
    $s2=iconv('gb2312','UTF-8',$s1);
    $s=$s2==$str?$s1:$str;
    $asc=ord($s{0})*256+ord($s{1})-65536;
    if($asc>=-20319&&$asc<=-20284) return 'A';
    if($asc>=-20283&&$asc<=-19776) return 'B';
    if($asc>=-19775&&$asc<=-19219) return 'C';
    if($asc>=-19218&&$asc<=-18711) return 'D';
    if($asc>=-18710&&$asc<=-18527) return 'E';
    if($asc>=-18526&&$asc<=-18240) return 'F';
    if($asc>=-18239&&$asc<=-17923) return 'G';
    if($asc>=-17922&&$asc<=-17418) return 'H';
    if($asc>=-17417&&$asc<=-16475) return 'J';
    if($asc>=-16474&&$asc<=-16213) return 'K';
    if($asc>=-16212&&$asc<=-15641) return 'L';
    if($asc>=-15640&&$asc<=-15166) return 'M';
    if($asc>=-15165&&$asc<=-14923) return 'N';
    if($asc>=-14922&&$asc<=-14915) return 'O';
    if($asc>=-14914&&$asc<=-14631) return 'P';
    if($asc>=-14630&&$asc<=-14150) return 'Q';
    if($asc>=-14149&&$asc<=-14091) return 'R';
    if($asc>=-14090&&$asc<=-13319) return 'S';
    if($asc>=-13318&&$asc<=-12839) return 'T';
    if($asc>=-12838&&$asc<=-12557) return 'W';
    if($asc>=-12556&&$asc<=-11848) return 'X';
    if($asc>=-11847&&$asc<=-11056) return 'Y';
    if($asc>=-11055&&$asc<=-10247) return 'Z';
    return null;
}

/**
 * 获取整条字符串汉字拼音首字母
 * @param $zh
 * @return string
 */
function pinyinLong($zh){
    $ret = "";
    $s1 = iconv("UTF-8","gb2312", $zh);
    $s2 = iconv("gb2312","UTF-8", $s1);
    if($s2 == $zh){$zh = $s1;}
    for($i = 0; $i < strlen($zh); $i++){
        $s1 = substr($zh,$i,1);
        $p = ord($s1);
        if($p > 160){
            $s2 = substr($zh,$i++,2);
            $ret .= getFirstCharter($s2);
        }else{
            $ret .= $s1;
        }
    }
    return $ret;
}

function ajaxReturn($data){
    header('Content-Type:application/json; charset=utf-8');
    exit(json_encode($data));
}

/**
 * 根据ip地址获取地址信息
 * @param string $ip
 * @return bool|mixed
 */
function GetIpLookup($ip = ''){
    if(empty($ip)){
        $ip = request()->ip();
    }
    $res = @file_get_contents('http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js&ip=' . $ip);
    if(empty($res)){ return false; }
    $jsonMatches = array();
    preg_match('#\{.+?\}#', $res, $jsonMatches);
    if(!isset($jsonMatches[0])){ return false; }
    $json = json_decode($jsonMatches[0], true);
    if(isset($json['ret']) && $json['ret'] == 1){
        $json['ip'] = $ip;
        unset($json['ret']);
    }else{
        return false;
    }
    return $json;
}


