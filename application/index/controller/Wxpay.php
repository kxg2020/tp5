<?php
namespace app\index\controller;
use think\Controller;
use think\Loader;
use think\Log;

class Wxpay extends Controller{

    public function _initialize(){
        parent::_initialize();

        // 导入微信包和工具包
        Loader::import('wxpay.lib.WxPayData');
        Loader::import('wxpay.lib.WxPayConfig');
        Loader::import('wxpay.lib.WxPayApi');
        Loader::import('wxpay.lib.WxPayException');
        Loader::import('wxpay.lib.WxPayNotify');
        Loader::import('wxpay.lib.WxPayNativePay');
        Loader::import('wxpay.lib.WxPayJsApiPay');
        Loader::import('wxpay.lib.phpqrcode');

    }

    public function indexAction(){


        return view('wxpay/index');
    }

    // 将url生成二维码
    public function qrCode($url){

       \QRcode::png($url);

        exit;
    }


    public function qrCodeAction(){

        \QRcode::png('http://www.baidu.com');

        exit;
    }

    /**
     * 微信扫码支付(模式二)
     */
    public function payAction(){

        $notify = new \NativePay();
        // 模式一(用户支付的金额不确定,需要先扫描在输入金额,类似饭店商家的二维码)
        // 模式二(用户支付的金额是确定的，不需要手动输入,类似网站商品的二维码)
        $input = new \WxPayUnifiedOrder();
        $input->SetBody("test");
        $input->SetAttach("test");
        $input->SetOut_trade_no(\WxPayConfig::MCHID.date("YmdHis"));
        $input->SetTotal_fee("1");// 单位为:分
        $input->SetTime_start(date("YmdHis"));
        $input->SetTime_expire(date("YmdHis", time() + 600));
        $input->SetGoods_tag("test");
        $input->SetNotify_url("http://www.macarin.cn/Wxpay/notify");
        $input->SetTrade_type("NATIVE");
        $input->SetProduct_id("123456789");
        $result = $notify->GetPayUrl($input);

        $url = $result['code_url'];

        // 组装好数据,显示订单信息给用户,并在支付按钮上绑定二维码链接
        $this->qrCode($url);
    }


    /**
     * 微信客户端支付
     */
    public function getJSAPIAction(){

        // 支付成功后的跳转地址
        $success = 'http://www.macarin.cn';

        // 支付失败的跳转地址
        $fail = 'http://www.baidu.com';

        // 获取用户openid
        $tools = new \JsApiPay();

        $openId = $tools->GetOpenid();

        // 统一下单
        $input = new \WxPayUnifiedOrder();

        $input->SetBody("支付订单：".time());
        $input->SetAttach("weixin");
        $input->SetOut_trade_no(time());
        $input->SetTotal_fee('1');
        $input->SetTime_start(date("YmdHis"));
        $input->SetTime_expire(date("YmdHis", time() + 600));
        $input->SetGoods_tag("tp_wx_pay");
        $input->SetNotify_url('www.baidu.com');
        $input->SetTrade_type("JSAPI");
        $input->SetOpenid($openId);
        $orders = \WxPayApi::unifiedOrder($input);
        $jsApiParameters = $tools->GetJsApiParameters($orders);

        // 使用heredoc(定界符)输出一段字符串,结尾必须顶头写,不能有空格
        $html = <<<EOF
	<script type="text/javascript">
	//调用微信JS api 支付
	 function jsApiCall(){
		WeixinJSBridge.invoke(
			'getBrandWCPayRequest',$jsApiParameters,
			function(res){
				//WeixinJSBridge.log(res.err_msg);
				// 客户端支付成功后的跳转地址
				 if(res.err_msg == "get_brand_wcpay_request:ok") {
				    location.href='$success';
				 }else{
				 	alert(res.err_code+res.err_desc+res.err_msg);
				    location.href='$fail';
				 }
			}
		);
	}

	function callpay(){
		if (typeof WeixinJSBridge == "undefined"){
		    if( document.addEventListener ){
		        document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
		    }else if (document.attachEvent){
		        document.attachEvent('WeixinJSBridgeReady', jsApiCall);
		        document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
		    }
		}else{
		    jsApiCall();
		}
	}
	callpay();
	</script>
EOF;
        return $html;
    }


    public function notifyAction(){

        $xml = file_get_contents('php://input');

        $arr = json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)));

        $arr = $this->objectToArray($arr);

        ksort($arr);

        //将数据转成URL键值对形式
        $sign = $this->toUrlParams($arr);

        //md5处理
        $sign = md5($sign);

        //转大写
        $sign = strtoupper($sign);

        Log::write($sign);
        Log::write($arr['sign']);exit;
        //验签名,默认支持MD5

        if ( $sign === $arr['sign']) {

        // 校验返回的订单金额是否与商户侧的订单金额一致。修改订单表中的支付状态。


        }

        $return = ['return_code'=>'SUCCESS','return_msg'=>'OK'];

        $xml = '<xml>';

        foreach($return as $k=>$v){
            $xml.='<'.$k.'><![CDATA['.$v.']]></'.$k.'>';
        }
        $xml.='</xml>';

        echo $xml;
    }


    /**
     * @param $array
     * @return array
     * 对象转换成数组
     */
    public function objectToArray($array) {

        if(is_object($array)) {

            $array = (array)$array;

        } if(is_array($array)) {
            foreach($array as $key=>$value) {
                $array[$key] = $this->objectToArray($value);
            }
        }
        return $array;
    }


    /**
     * 格式化参数格式化成url参数
     */
    private function toUrlParams($arr){

        $buff = "";
        foreach ($arr as $k => $v)
        {
            if($k != "sign" && $v != "" && !is_array($v)){
                $buff .= $k . "=" . $v . "&";
            }
        }

        $buff = trim($buff, "&");
        return $buff.'&key='.\WxPayConfig::KEY;
    }

}

