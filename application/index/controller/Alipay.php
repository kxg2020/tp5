<?php
namespace app\index\controller;

use think\Controller;
use think\Loader;
use think\Log;


class Alipay extends Controller{


    public function _initialize()
    {
        parent::_initialize(); // TODO: Change the autogenerated stub
        // 导入支付宝库
        Loader::import('alipay.alipay.alipay_config',EXTEND_PATH);
        Loader::import('alipay.alipay.lib.alipay_submit',EXTEND_PATH);
        Loader::import('alipay.alipay.lib.alipay_notify',EXTEND_PATH);

    }

    public function indexAction(){

        // 这里是模拟了一个下单的页面用来创建订单，实际支付没有这个
        return view('alipay/index');
    }

    public function payAction(){

        header("Content-type: text/html; charset=utf-8");

        $params = request()->param();

        //>> 判断表单中的支付类型
        $type = isset($params['paytype']) ? $params['paytype'] : 'alipay_web';

        if($type == 'alipay_web'){

            //>> 如果是alipay_web就是PC端的支付服务
            $service = 'create_direct_pay_by_user';//PC端及时到账接口
            //'create_partner_trade_by_buyer'  PC端担保交易接口
            //'create_direct_pay_by_user'   PC端及时到账接口


        }else{

            //>> 否则就是移动端的支付服务
            $service = 'alipay.wap.create.direct.pay.by.user';//移动端
        }

        // 支付宝配置
        $alipay_config = array(

            // 收款商家支付宝邮箱,可以不填
            'email' => 'admin@diandodo.com',

            // 加密key，开通支付宝账户后得到
            'key' => '4t3m3qnwiq4lzqvv66sfu2vy9r3skkcn', // wcgf9kam5w2iwsnmk15w26stvr8ya24h

            // 合作商家PID,申请后得到
            'partner' => '2088221883850827',// 2088221781617250

            // 收款支付宝账号，以2088开头由16位纯数字组成的字符串，一般情况下收款账号就是签约账号
            'seller_id' => '2088221883850827',

            // 签名方式(有MD5|RSA|RSA2三种)
            'sign_type' => strtoupper('MD5'),

            // 字符编码格式 目前支持utf-8
            'input_charset' => strtolower('utf-8'),

            // 产品类型，无需修改
            'service' => $service,

            // 支付类型 ，无需修改
            'payment_type' => '1',

            // 支付宝证书
            'cacert'=>EXTEND_PATH.'alipay/cacert.pem',

            'transport'=>'http',

            // 必须要能访问的网址
            "notify_url" => 'http://www.macarin.cn/Alipay/notify',

            // 支付成功跳转地址,必须可以访问的网址
            "return_url" => 'http://www.macarin.cn/Alipay/returnto',
        );

        // 订单编号,提交表单时提供
        $out_trade_no = date('YmdHis') . rand(1000, 9999);

        // 支付金额
        $money = $_POST['money'];

        // 订单标题(移动端支付时用到)
        $subject = "订单" . $out_trade_no;

        // 商品描述
        $body = "订单" . $out_trade_no;

        //构造要请求的参数数组，无需改动
        $parameter = array(
            "service" => $alipay_config['service'],
            "partner" => $alipay_config['partner'],
            "seller_id" => $alipay_config['seller_id'],
            "payment_type" => $alipay_config['payment_type'],
            "notify_url" => $alipay_config['notify_url'],
            "return_url" => $alipay_config['return_url'],
            "_input_charset" => $alipay_config['input_charset'],
            "out_trade_no" => $out_trade_no,
            "subject" => $subject,
            "total_fee" => $money,
            "show_url" => $alipay_config['return_url'],
            //"app_pay" => "Y",//启用此参数能唤起钱包APP支付宝
            "body" => $body,
            //其他业务参数根据在线开发文档，添加参数.文档地址:https://doc.open.alipay.com/doc2/detail.htm?spm=a219a.7629140.0.0.2Z6TSk&treeId=60&articleId=103693&docType=1
            //如"参数名"    => "参数值"   注：上一个参数末尾需要“,”逗号。
        );

        //建立请求
        $alipaySubmit = new \alipay_submit($alipay_config);

        if ($type == 'alipay_web') {

            // 创建表单
            $html_text = $alipaySubmit->buildRequestForm($parameter, "post", "确认");

            // 输出页面
            echo $html_text;

        }elseif ($type == 'alipay_wap') {

            $html_text = $alipaySubmit->buildRequestForm($parameter, "post", "确认");

            echo $html_text;
        }

    }

    public function notifyAction(){

        // 支付宝配置
        $alipay_config = array(

            // 收款商家支付宝邮箱,可以不填
            'email' => 'admin@diandodo.com',

            // 加密key，开通支付宝账户后得到
            'key' => '4t3m3qnwiq4lzqvv66sfu2vy9r3skkcn', // wcgf9kam5w2iwsnmk15w26stvr8ya24h

            // 合作商家PID,申请后得到
            'partner' => '2088221883850827',// 2088221781617250

            // 收款支付宝账号，以2088开头由16位纯数字组成的字符串，一般情况下收款账号就是签约账号
            'seller_id' => '2088221883850827',

            // 签名方式(有MD5|RSA|RSA2三种)
            'sign_type' => strtoupper('MD5'),

            // 字符编码格式 目前支持utf-8
            'input_charset' => strtolower('utf-8'),

            // 支付类型 ，无需修改
            'payment_type' => '1',

            // 支付宝证书
            'cacert'=>EXTEND_PATH.'alipay/cacert.pem',

            'transport'=>'http',
            // 必须要能访问的网址
            "notify_url" => 'http://www.macarin.cn/Alipay/notify',
            // 支付成功跳转地址,必须可以访问的网址
            "return_url" => 'http://www.macarin.cn/Alipay/returnto',
        );

        //计算得出通知验证结果
        $alipayNotify = new \alipay_notify($alipay_config);

        $verify_result = $alipayNotify->verifyNotify();

        if($verify_result) {

            // 验证成功
            $params = request()->post();
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            //请在这里加上商户的业务逻辑程序代


            //——请根据您的业务逻辑来编写程序（以下代码仅作参考）——

            //获取支付宝的通知返回参数，可参考技术文档中服务器异步通知参数列表

            //商户订单号

            $out_trade_no = $params['out_trade_no'];

            //支付宝交易号

            $trade_no = $params['trade_no'];

            //交易状态
            $trade_status = $params['trade_status'];

            Log::write($_POST);exit;
            if($_POST['trade_status'] == 'TRADE_FINISHED') {
                //判断该笔订单是否在商户网站中已经做过处理
                //如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
                //请务必判断请求时的total_fee、seller_id与通知时获取的total_fee、seller_id为一致的
                //如果有做过处理，不执行商户的业务程序

                //注意：
                //退款日期超过可退款期限后（如三个月可退款），支付宝系统发送该交易状态通知

                //调试用，写文本函数记录程序运行情况是否正常
                //logResult("这里写入想要调试的代码变量值，或其他运行的结果记录");

            }
            else if ($_POST['trade_status'] == 'TRADE_SUCCESS') {
                //判断该笔订单是否在商户网站中已经做过处理
                //如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
                //请务必判断请求时的total_fee、seller_id与通知时获取的total_fee、seller_id为一致的
                //如果有做过处理，不执行商户的业务程序

                //注意：
                //付款完成后，支付宝系统发送该交易状态通知

                //调试用，写文本函数记录程序运行情况是否正常
                //logResult("这里写入想要调试的代码变量值，或其他运行的结果记录");
            }

            //——请根据您的业务逻辑来编写程序（以上代码仅作参考）——

            echo "success";		//请不要修改或删除

            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        }
        else {
            //验证失败
            echo "fail";

            //调试用，写文本函数记录程序运行情况是否正常
            //logResult("这里写入想要调试的代码变量值，或其他运行的结果记录");
        }

    }

    public function returntoAction(){

        // 支付宝配置
        $alipay_config = array(

            // 收款商家支付宝邮箱,可以不填
            'email' => 'admin@diandodo.com',

            // 加密key，开通支付宝账户后得到
            'key' => '4t3m3qnwiq4lzqvv66sfu2vy9r3skkcn', // wcgf9kam5w2iwsnmk15w26stvr8ya24h

            // 合作商家PID,申请后得到
            'partner' => '2088221883850827',// 2088221781617250

            // 收款支付宝账号，以2088开头由16位纯数字组成的字符串，一般情况下收款账号就是签约账号
            'seller_id' => '2088221883850827',

            // 签名方式(有MD5|RSA|RSA2三种)
            'sign_type' => strtoupper('MD5'),

            // 字符编码格式 目前支持utf-8
            'input_charset' => strtolower('UTF-8'),

            // 支付类型 ，无需修改
            'payment_type' => '1',

            // 支付宝证书
            'cacert'=>EXTEND_PATH.'alipay/cacert.pem',

            'transport'=>'http',

            // 必须要能访问的网址
            "notify_url" => 'http://www.macarin.cn/Alipay/notify',

            // 支付成功跳转地址,必须可以访问的网址
            "return_url" => 'http://www.macarin.cn/Alipay/returnto',
        );

        //计算得出通知验证结果
        $alipayNotify = new \alipay_notify($alipay_config);

        $verify_result = $alipayNotify->verifyReturn();

        if($verify_result) {
            // 验证成功
            $params = request()->get()
;            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            //请在这里加上商户的业务逻辑程序代码

            //——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
            //获取支付宝的通知返回参数，可参考技术文档中页面跳转同步通知参数列表

            //商户订单号

            $out_trade_no = $params['out_trade_no'];

            //支付宝交易号

            $trade_no = $params['trade_no'];

            //交易状态
            $trade_status = $params['trade_status'];
            dump($params);exit;

            if($_GET['trade_status'] == 'TRADE_FINISHED' || $_GET['trade_status'] == 'TRADE_SUCCESS') {
                echo  "成功啊";
                //判断该笔订单是否在商户网站中已经做过处理
                //如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
                //如果有做过处理，不执行商户的业务程序
            }
            else {
                echo "trade_status=".$_GET['trade_status'];
            }

            echo "验证成功";

            //——请根据您的业务逻辑来编写程序（以上代码仅作参考）——

            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        }
        else {
            //验证失败
            //如要调试，请看alipay_notify.php页面的verifyReturn函数
            echo "验证失败";
        }
    }
}