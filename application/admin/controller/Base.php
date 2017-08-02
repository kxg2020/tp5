<?php
namespace app\admin\controller;
use think\Controller;
use think\Cookie;
use think\Loader;
use think\Session;
use think\Db;

class Base extends  Controller{

    public $isLogin = 0;
    public $userInfo = [];

    public function _initialize()
    {
        //>> 取session,session在用户关闭浏览器以后就失效了
        $session_token = Session::get(sha1('admin_user_session'));

        if(!empty($session_token)){

            //>> 根据session查询用户
            $userInfo = Db:: table('xm_user')->where(['session_token'=>$session_token])->find();
            if(!empty($userInfo)){

                $this->assign('userInfo',$userInfo);
                $this->isLogin = 1;
                $this->userInfo = $userInfo;
            }

        }else{

            //>> session为空,就取出cookie,cookie信息可以在客户端保存一段时间
            $cookie_token = Cookie::get(sha1('admin_user_cookie'));

            //>> 根据cookie查询用户
            $userInfo = Db::table('xm_user')->where(['cookie_token'=>$cookie_token])->find();

            if(!empty($userInfo)){
                $this->assign('userInfo',$userInfo);
                $this->isLogin = 1;
                $this->userInfo = $userInfo;
            }

        }

    }

    /**
     * 导出表格
     */
    public function exportExcel($expTitle, $expCellName, $expTableData){

        Loader::import('phpExcel.PHPExcel',EXTEND_PATH);
        $xlsTitle = iconv('utf-8', 'gb2312', $expTitle);//文件名称
        $fileName = $expTitle . date('_YmdHis');//or $xlsTitle 文件名称可根据自己情况设定
        $cellNum = count($expCellName);
        $dataNum = count($expTableData);

        $objPHPExcel = new \PHPExcel();
        $cellName = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK', 'AL', 'AM', 'AN', 'AO', 'AP', 'AQ', 'AR', 'AS', 'AT', 'AU', 'AV', 'AW', 'AX', 'AY', 'AZ');

        $objPHPExcel->getActiveSheet(0)->mergeCells('A1:' . $cellName[$cellNum - 1] . '1');//合并单元格

        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', $expTitle . '  导出时间:' . date('Y-m-d H:i:s'));

        for ($i = 0; $i < $cellNum; $i++) {
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($cellName[$i] . '2', $expCellName[$i][1]);
        }
        // Miscellaneous glyphs, UTF-8
        for ($i = 0; $i < $dataNum; $i++) {
            for ($j = 0; $j < $cellNum; $j++) {
                $objPHPExcel->getActiveSheet(0)->setCellValue($cellName[$j] . ($i + 3), $expTableData[$i][$expCellName[$j][0]]);
            }
        }

        header('pragma:public');
        header('Content-type:application/vnd.ms-excel;charset=utf-8;name="' . $xlsTitle . '.xls"');
        header("Content-Disposition:attachment;filename=$fileName.xls");//attachment新窗口打印inline本窗口打印
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        exit;
    }


}