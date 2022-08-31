<?php
class AlipayController extends BaseController {
    public $WEB_DIR = WEB_DIR;
	// 首页
    function actionIndex(){
        // 连个hello world都木有？
        $this->title = "结算系统";

        $trade_ids = arg("trade_ids");
        $total_pay = arg("total_pay");

        // 创建数据库订单号
        $out_trade_no = date('YmdHis');
        $tradeObj = new Model("trade");
        $tradeObj->query(
            "UPDATE trade SET `out_trade_no` = :M_UPDATE_out_trade_no WHERE trade_id in (" .$trade_ids.")",
            array(":M_UPDATE_out_trade_no" => $out_trade_no)
        );

        $pay_params = [
            'out_trade_no'  => $out_trade_no,//商户订单号
            'total_amount'  => floatval($total_pay), //总价 单位为元
            'subject'  => '购物结算', //订单标题
        ];

        $pay = new Alipay();
        $pay->ReturnURL = url("alipay","return");
        $pay->NotifyURL = url("alipay","notify");
        $pay->newPay($pay_params);
    }

    // 同步
    function actionReturn(){
        //print_r($_GET);
        $return = new Alipay();
        $return->logs('return.txt',print_r($_GET,true));
        $this->jump(url("main", "index"));
    }

    //异步
    function actionNotify(){
        // 1.获取数据
        $postData = $_POST;

        $notify = new Alipay();
        $notify->logs('notify.txt',print_r($_POST,true));
        //删除c，a，m的字段
        if(isset($postData['a'])){
            unset($postData['a']);
        }
        if(isset($postData['c'])){
            unset($postData['c']);
        }
        if(isset($postData['m'])){
            unset($postData['m']);
        }
        //2.验证签名
        if($postData['sign_type'] == 'RSA2'){
            if(!$notify->rsaCheck($notify->getStr($postData),
                AlipayConfig::NEW_ALIPUBKEY, $postData['sign'],'RSA2') ){
                $notify->logs('log.txt', 'RSA2签名失败!');
                //exit();
            }else{
                $notify->logs('log.txt', 'RSA2签名成功!');
            }
        }else{
            exit('签名方式有误');
        }
        //验证是否来自支付宝的请求
        if(!$notify->isAlipay($postData)){
            $notify->logs('log.txt', '不是来之支付宝的通知!');
            //exit();
        }else{
            $notify->logs('log.txt', '是来之支付宝的通知验证通过!');
        }
        // 4.验证交易状态
        if(!$notify->checkOrderStatus($postData)){
            $notify->logs('log.txt', '交易未完成!');
            //exit();
        }else{
            $notify->logs('log.txt', '交易成功!');
        }
        //5. 验证订单号和金额
        //获取支付发送过来的订单号  在商户订单表中查询对应的金额 然后和支付宝发送过来的做对比
        $notify->logs('log.txt', '订单号:' . $postData['out_trade_no'] . '订单金额:' . $postData['total_amount']);
        //更改数据库
        $tradeObj = new Model("trade");
        $out_trade_no = $postData['out_trade_no'];
        $trade_no = $postData['trade_no'];
        //判断条件-out_trade_no是否相同
        $condtion = array('out_trade_no'=>$out_trade_no);
        $tradeObj->update($condtion,array('trade_no'=>$trade_no));
        //更改订单状态
        //echo 'success';
        $this->jump(url("main", "index"));
    }
}