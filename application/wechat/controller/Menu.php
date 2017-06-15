<?php
namespace app\wechat\controller;

use think\Config;
use think\Controller;
use think\Db;


class Menu extends Controller {

    const MENU_SET_API = 'https://api.weixin.qq.com/cgi-bin/menu/create?access_token=';
    const MENU_GET_API = 'https://api.weixin.qq.com/cgi-bin/menu/get?access_token=';
    const MENU_DELETE_API = 'https://api.weixin.qq.com/cgi-bin/menu/delete?access_token=';

    /**
     * 查询所有菜单
     */
//    public function listAction(){
//        $menuModel = new Wxmenu();
//        $rows = $menuModel->menuList();
//        if(!empty($rows)){
//            die($this->common->_printSuccess(['list'=>array_values($rows)]));
//        }else{
//            die($this->common->_printError('21905'));
//        }
//    }

    /**
     * 修改菜单
     */
//    public function editAction(){
//
//        $paramArr = $_REQUEST;
//
//        if(!empty($paramArr)){
//            if(isset($paramArr['id']) && !empty($paramArr['id']) && is_numeric($paramArr['id'])){
//                $where['id'] = $paramArr['id'];
//            }
//            if(isset($paramArr['name']) && !empty($paramArr['name']) && strlen($paramArr['name']) < 5){
//                $updateData['name'] = $paramArr['name'];
//            }else{
//                die($this->common->_printError('21913'));
//            }
//            if(isset($paramArr['type']) && !empty($paramArr['type'])){
//                $insertData['type'] = $paramArr['type'];
//                if($paramArr['type'] == 'view'){
//                    if(isset($paramArr['url']) && !empty($paramArr['url']) && strlen($paramArr['url']) < 128){
//                        $updateData['url'] = $paramArr['url'];
//                    }else{
//                        die($this->common->_printError('21921'));
//                    }
//                }else{
//                    if(isset($paramArr['key']) && !empty($paramArr['key']) && strlen($paramArr['key']) < 50){
//                        $updateData['key'] = strip_tags($paramArr['key']);
//                    }else{
//                        die($this->common->_printError('21919'));
//                    }
//                }
//            }else{
//                die($this->common->_printError('21915'));
//            }
//            if(isset($paramArr['p_id']) && !empty($paramArr['p_id'])){
//                $updateData['p_id'] = $paramArr['p_id'];
//            }else{
//                die($this->common->_printError('21917'));
//            }
//
//
//        }else{
//            die($this->common->_printError('21911'));
//        }
//    }


    /**
     * 设置菜单
     */
    public function setMenuAction(){

        $menuJson = $this->assembleAction();

        $res = $this->http_request($menuJson);

        echo $res;
    }

    /**
     * 获取菜单
     */
    public function getMenuAction(){

        $config = Config::get('wechat');

        $access_token = wechat()->checkAuth($config['appid'],$config['appsecret'],'');

        $res = file_get_contents(self::MENU_GET_API.$access_token);

        return $res;
    }

    /**
     * 删除菜单
     */
    public function delMenuAction(){

        $config = Config::get('wechat');

        $access_token = wechat()->checkAuth($config['appid'],$config['appsecret'],'');
        $jsonData = file_get_contents(self::MENU_DELETE_API.$access_token);
        $data = json_decode($jsonData,true);
        if($data['errcode'] == 0){
            return true;
        }else{
            return false;
        }
    }

    /**
     * https请求
     */
    public function http_request($data){

        $config = Config::get('wechat');
        $access_token = wechat()->checkAuth($config['appid'],$config['appsecret'],'');
        $url = self::MENU_SET_API.$access_token;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        if (!empty($data)){
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl);
        curl_close($curl);
        return $output;
    }

    public function assembleAction(){


        //>> 查询一级菜单
        $menuOne = Db::table('xm_wechat_menu')->where(['parent_id'=>0])->select();
        $menu = [];
        //>> 遍历所有数据
        foreach($menuOne as $key => $value){
            //>>判断是否type为空,不为空就没有二级菜单,一级菜单就具有功能
            if(!empty($value['type'])){
                switch($value['type']){
                    //>>一级菜单为click类型,有type值,比较特殊
                    case 'click':
                        $menu['button'][$key] = [
                            'name'=>urlencode($value['name']),
                            'type'=>'click',
                            'key'=>$value['key']
                        ];
                        break;
                    //>>一级菜单为view类型
                    case 'view':
                        $menu['button'][$key] = ['name'=>urlencode($value['name']),'type'=>'view','url'=>$value['url']];
                        break;
                    //>>扫码不带提示
                    case 'scancode_push':
                        $menu['button'][$key] = ['name'=>urlencode($value['name']),'type'=>'scancode_push','key'=>$value['key'],'sub_button'=>[]];
                        break;
                    //>>扫码带提示
                    case 'scancode_waitmsg':
                        $menu['button'][$key] = ['name'=>urlencode($value['name']),'type'=>'scancode_waitmsg','key'=>$value['key'],'sub_button'=>[]];
                        break;
                    //>>微信系统拍照发图
                    case 'pic_sysphoto':
                        $menu['button'][$key] = ['name'=>urlencode($value['name']),'type'=>'pic_sysphoto','key'=>$value['key'],'sub_button'=>[]];
                        break;
                    //>>手机拍照或者相册发图
                    case 'pic_photo_or_album':
                        $menu['button'][$key] = ['name'=>urlencode($value['name']),'type'=>'pic_photo_or_album','key'=>$value['key'],'sub_button'=>[]];
                        break;
                    //>>微信相册发图
                    case 'pic_weixin':
                        $menu['button'][$key] = ['name'=>urlencode($value['name']),'type'=>'pic_weixin','key'=>$value['key'],'sub_button'=>[]];
                        break;
                    //>>发送位置
                    case 'location_select':
                        $menu['button'][$key] = ['name'=>urlencode($value['name']),'type'=>'location_select','key'=>$value['key']];
                        break;
                    //>>图片
                    case 'media_id':
                        $menu['button'][$key] = ['name'=>urlencode($value['name']),'type'=>'media_id','media_id'=>'MEDIA_ID1'];
                        break;
                    //>>图文消息
                    case 'view_limited':
                        $menu['button'][$key] = ['name'=>urlencode($value['name']),'type'=>'media_id','media_id'=>'MEDIA_ID2'];
                        break;
                }
            }else{
                //>>一级菜单type为空,一定有二级菜单,查询二级菜单
                $menuTwo = Db::table('xm_wechat_menu')->where(['parent_id'=>$value['id']])->select();
                if($menuTwo){
                    //>>遍历数组,组装菜单
                    foreach($menuTwo as $k => $v){
                        switch($v['type']){
                            case 'view':
                                $menu['button'][$key]['name'] = urlencode($value['name']);
                                $menu['button'][$key]['sub_button'][$k] = [
                                    'name'=>urlencode($v['name']),
                                    'type'=>'view',
                                    'url'=>$v['url']
                                ];
                                break;
                            case 'click':
                                $menu['button'][$key]['name'] = urlencode($value['name']);
                                $menu['button'][$key]['sub_button'][$k] = [
                                    'name'=>urlencode($v['name']),
                                    'type'=>'click',
                                    'key'=>$v['key']
                                ];
                                break;
                            case 'scancode_push':
                                $menu['button'][$key]['name'] = urlencode($value['name']);
                                $menu['button'][$key]['sub_button'][$k] = [
                                    'name'=>urlencode($v['name']),
                                    'type'=>'scancode_push',
                                    'key'=>$v['key'],
                                    'sub_button'=>[]
                                ];
                                break;
                            case 'scancode_waitmsg':
                                $menu['button'][$key]['name'] = urlencode($value['name']);
                                $menu['button'][$key]['sub_button'][$k] = [
                                    'name'=>urlencode($v['name']),
                                    'type'=>'scancode_waitmsg',
                                    'key'=>$v['key'],
                                    'sub_button'=>[]
                                ];
                                break;
                            case 'pic_sysphoto':
                                $menu['button'][$key]['name'] = urlencode($value['name']);
                                $menu['button'][$key]['sub_button'][$k] = [
                                    'name'=>urlencode($v['name']),
                                    'type'=>'pic_sysphoto',
                                    'key'=>$v['key'],
                                    'sub_button'=>[]
                                ];
                                break;
                            case 'pic_photo_or_album':
                                $menu['button'][$key]['name'] = urlencode($value['name']);
                                $menu['button'][$key]['sub_button'][$k] = [
                                    'name'=>urlencode($v['name']),
                                    'type'=>'pic_photo_or_album',
                                    'key'=>$v['key'],
                                    'sub_button'=>[]
                                ];
                                break;
                            case 'pic_weixin':
                                $menu['button'][$key]['name'] = urlencode($value['name']);
                                $menu['button'][$key]['sub_button'][$k] = [
                                    'name'=>urlencode($v['name']),
                                    'type'=>'pic_photo_or_album',
                                    'key'=>$v['key'],
                                    'sub_button'=>[]
                                ];
                                break;
                            case 'location_select':
                                $menu['button'][$key]['name'] = urlencode($value['name']);
                                $menu['button'][$key]['sub_button'][$k] = [
                                    'name'=>urlencode($v['name']),
                                    'type'=>'location_select',
                                    'key'=>$v['key']
                                ];
                                break;
                            case 'media_id':
                                $menu['button'][$key]['name'] = urlencode($value['name']);
                                $menu['button'][$key]['sub_button'][$k] = [
                                    'name'=>urlencode($v['name']),
                                    'type'=>'media_id',
                                    'media_id'=>'MEDIA_ID1'
                                ];
                                break;
                            case 'view_limited':
                                $menu['button'][$key]['name'] = urlencode($value['name']);
                                $menu['button'][$key]['sub_button'][$k] = [
                                    'name'=>urlencode($v['name']),
                                    'type'=>'view_limited',
                                    'media_id'=>'MEDIA_ID2'
                                ];
                                break;
                        }

                    }
                }

            }
        }

        return urldecode(json_encode($menu));
    }

//    public function testAction(){
//        //回复图文
//        $where = ['type'=>'news'];
//        $rows = $this->mysql->getList($where,'*','','','','wx_media');
//        $row = array_slice($rows['allrow'],0,2);
//        $picUrl = 'http://mmbiz.qpic.cn/mmbiz_jpg/ddcarEBVG3yNfC8NIFwcuvKneILpDEnWuzLUNO7FpfgZduwLrKLGqPNDOvtPhmiaItvjAicSkfB9W3JxwJVb8Ngg/0?wx_fmt=jpeg';
//        $count = count($row);
//        $news = [];
//        for($i = 0;$i < $count; ++ $i){
//            $news[$i] = ['Title'=>$row[$i]['title'],'Description'=>$row[$i]['digest'],'PicUrl'=>$picUrl,'Url'=>$row[$i]['url']];
//        }
//        $msg = array(
//            'ToUserName'=>1,
//            'FromUserName'=>2,
//            'MsgType'=>'news',
//            'CreateTime'=>time(),
//            'ArticleCount'=>2,
//            'Articles'=>$news,
//        );
//        $msg = $this->xml_encode($msg);
//        var_dump($msg);exit;
//    }

    /**
     * XML格式编码
     * @param mixed $data 数据
     * @param string $root 根节点名
     * @param string $item 数字索引的子节点名
     * @param string $attr 根节点属性
     * @param string $id   数字索引子节点key转换的属性名
     * @param string $encoding 数据编码
     * @return string
     */
    public function xml_encode($data, $root='xml', $item='item', $attr='', $id='id', $encoding='utf-8')
    {
        if(is_array($attr)){
            $_attr = array();
            foreach ($attr as $key => $value) {
                $_attr[] = "{$key}=\"{$value}\"";
            }
            $attr = implode(' ', $_attr);
        }
        $attr   = trim($attr);
        $attr   = empty($attr) ? '' : " {$attr}";
        $xml   = "<{$root}{$attr}>";
        $xml   .= self::data_to_xml($data, $item, $id);
        $xml   .= "</{$root}>";
        return $xml;
    }

    /**
     * XML数据编码
     * @param mixed $data 数据
     * @return string
     */
    public static function data_to_xml($data)
    {
        $xml = '';
        foreach ($data as $key => $val) {
            is_numeric($key) && $key = "item id=\"$key\"";
            $xml    .=  "<$key>";
            $xml    .=  ( is_array($val) || is_object($val)) ? self::data_to_xml($val)  : self::xmlSafeStr($val);
            list($key, ) = explode(' ', $key);
            $xml    .=  "</$key>";
        }
        return $xml;
    }
    /**
     *安全编码
     */
    public static function xmlSafeStr($str)
    {
        return '<![CDATA['.preg_replace("/[\\x00-\\x08\\x0b-\\x0c\\x0e-\\x1f]/",'',$str).']]>';
    }

}