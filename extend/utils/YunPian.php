<?php
namespace utils;

class YunPian {

    /**
     * 发送普通短信
     * @param string $mobile 接收人手机号码
     * @param string $text 短信内容
     * @param mixed $systemInfo 配置信息
     * @param int $type 短信类型 1 验证码（只需要给验证码值） 2 普通短信
     * @return bool 失败返回错误信息 成功返回true 判断请判断 ===
     */

    public function sendSMS($mobile = '', $text, $config, $type = 1)
    {
        header("Content-Type:text/html;charset=utf-8");

        $apiKey = $config['apikey'];

        // 判断短信类型
        if ($type == 1) {
            // 短信类型
            $text = str_replace('{验证码}', $text, $config['verify_code_tpl']);
        }

        // $text = '【xxx】您的验证码是1234';
        // 初始化curl
        $ch = curl_init();
        /* 设置验证方式 */
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept:text/plain;charset=utf-8', 'Content-Type:application/x-www-form-urlencoded', 'charset=utf-8'));

        /* 设置返回结果为流 */
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        /* 设置超时时间*/
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);

        /* 设置通信方式 */
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        // 发送短信
        $data = array('text' => $text, 'apikey' => $apiKey, 'mobile' => $mobile);

        $json_data = $this->sendText($ch, $data);

        $array = json_decode($json_data, true);

        curl_close($ch);

        // 判断短信是否发送成功
        if ($array['msg'] == 'OK') {

            return true;
        } else {

            return $array['detail'];
        }

    }


    /**
     * 发送模板短信
     * @param string $mobile 接收人手机号码
     * @param string $text 模板内容 列子
     * ('#code#').'='.urlencode('1234').'&'.urlencode('#company#').'='.urlencode('欢乐行')
     * @param mixed $systemInfo 配置信息
     * @param int $tpl_id 模板Id
     * @return bool 失败返回错误信息 成功返回true 判断请判断 ===
     */
    public function sendTemp($mobile = '', $text = '', $config, $tpl_id = 1){
        header("Content-Type:text/html;charset=utf-8");
        $apiKey = $config['apikey']; //修改为您的apikey(https://www.yunpian.com)登陆官网后获取

        // 初始化curl
        $ch = curl_init();

        /* 设置验证方式 */
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept:text/plain;charset=utf-8', 'Content-Type:application/x-www-form-urlencoded', 'charset=utf-8'));

        /* 设置返回结果为流 */
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        /* 设置超时时间*/
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);

        /* 设置通信方式 */
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        // 发送模板短信需要对value进行编码
        $data = [
            'tpl_id'    => $tpl_id, // 模板id
            'tpl_value' => $text,
            'apikey'    => $apiKey,
            'mobile' => $mobile
        ];

        $json_data = $this->sendTemplate($ch, $data);

        $array = json_decode($json_data, true);
        curl_close($ch);

        // 判断短信是否发送成功
        if ($array['msg'] == 'OK') {
            return true;
        } else {
            return $array['detail'];
        }

    }

    // 获得账户
    public function getUser($ch, $apikey)
    {
        curl_setopt($ch, CURLOPT_URL, 'https://sms.yunpian.com/v1/user/get.json');
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('apikey' => $apikey)));
        return curl_exec($ch);
    }

    // 发送文本短信
    public function sendText($ch, $data)
    {
        curl_setopt($ch, CURLOPT_URL, 'https://sms.yunpian.com/v1/sms/send.json');
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        return curl_exec($ch);
    }

    // 发送模板短信
    public function sendTemplate($ch, $data)
    {
        curl_setopt($ch, CURLOPT_URL, 'https://sms.yunpian.com/v1/sms/tpl_send.json');
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        return curl_exec($ch);
    }

    // 发送语音短信
    public function sendVoice($ch, $data)
    {
        curl_setopt($ch, CURLOPT_URL, 'http://voice.yunpian.com/v1/voice/send.json');
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        return curl_exec($ch);
    }

}
