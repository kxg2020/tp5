<?php
ini_set('date.timezone','Asia/Shanghai');
error_reporting(E_ERROR);

require_once "../lib/WxPayApi.php";
require_once '../lib/WxPayNotify.php';

class PayNotifyCallBack extends WxPayNotify{

    protected $param = array('code'=>0,'data'=>'');

	//查询订单
	public function Queryorder($transaction_id){
		$input = new WxPayOrderQuery();
		$input->SetTransaction_id($transaction_id);
		$result = WxPayApi::orderQuery($input);
		if(array_key_exists("return_code", $result)
			&& array_key_exists("result_code", $result)
			&& $result["return_code"] == "SUCCESS"
			&& $result["result_code"] == "SUCCESS")
		{
			return true;

		}
        $this->param['code'] = 0;
        $this->param['data'] = '';
		return false;
	}
	
	//重写回调处理函数
	public function NotifyProcess($data, &$msg){
		Log::DEBUG("call back:" . json_encode($data));
		$notfiyOutput = array();
		
		if(!array_key_exists("transaction_id", $data)){
			$msg = "输入参数不正确";

            $this->param['code'] = 0;
            $this->param['data'] = '';

			return false;
		}
		//查询订单，判断订单真实性
		if(!$this->Queryorder($data["transaction_id"])){
			$msg = "订单查询失败";

            $this->param['code'] = 0;
            $this->param['data'] = '';

			return false;
		}

        $this->param['code'] = 1;
        $this->param['data'] = $data;
		return true;
	}

    /**
     * 自定义方法 检测微信端是否回调成功方法
     * @return multitype:number string
     */
    public function isSuccess(){

        return $this->param;
    }
}

$notify = new PayNotifyCallBack();
$notify->Handle(false);
