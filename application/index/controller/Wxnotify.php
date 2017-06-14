<?php
namespace app\index\controller;
use think\Loader;

class Wxnotify extends \WxPayNotify{

    public function __construct(){

        Loader::import('wxpay.lib.WxPayApi',EXTEND_PATH);

        Loader::import('wxpay.lib.log',EXTEND_PATH);

    }

    //重写回调处理函数
    public function NotifyProcess($data,&$msg)
    {
        //$data 是NotifyCallBack函数传进来的含有支付信息的参数

        $notifyOutput = array();

        // 下面这句判断支付参数中是否含有微信订单号transaction_id
        if(!array_key_exists("transaction_id", $data)){

            $msg = "输入参数不正确";

            return false;
        }
        //查询订单，判断订单真实性,二重判断
        if(!$this->Queryorder($data["transaction_id"])){

            $msg = "订单查询失败";

            return false;
        }
        // 这里返回真,证明支付成功了
        // 我们也可以直接在这里做支付成功后的操作
        return true;
    }

    //查询订单
    public function Queryorder($transaction_id){

        $input = new \WxPayOrderQuery();

        $input->SetTransaction_id($transaction_id);

        $result = \WxPayApi::orderQuery($input);

        \Log::DEBUG("query:" . json_encode($result));

        if(array_key_exists("return_code", $result)

            && array_key_exists("result_code", $result)

            && $result["return_code"] == "SUCCESS"

            && $result["result_code"] == "SUCCESS")
        {

            return true;
        }

        return false;
    }

}

$notify = new Wxnotify();
$notify->Handle(false);