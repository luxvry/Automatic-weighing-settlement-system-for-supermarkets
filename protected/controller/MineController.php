<?php
class MineController extends BaseController {
    public $WEB_DIR = WEB_DIR;
	// 首页
    function actionPay(){
        $this->title = "我的订单";

        $this->WebUserName = $_SESSION["username"];
        $this->userid = $_SESSION["userid"];
        $this->deviceid = $_SESSION["deviceid"];
        //读取数据库中的product全部种类
        $productObj = new Model("product");
        $this->product = $productObj->findAll();
        //$this->product = array();
        $tradeObj = new Model("trade");
        $sql = "trade_id, deviceid, userid, productid, productweight, trade_no, out_trade_no";
        $sql .= ", (SELECT product_name FROM product WHERE product_id=productid) as product_name";
        $sql .= ", (SELECT product_img FROM product WHERE product_id=productid) as product_img";
        $sql .= ", (SELECT product_price FROM product WHERE product_id=productid) as product_price";
        $sql .= ", (SELECT product_price*productweight FROM product WHERE product_id=productid) as all_price";

        $condition = array("deviceid = :M_deviceid and userid = :M_deviceid and trade_no <> '' and atrefund = 'N' ",
            ":M_deviceid" => $this->deviceid,
            ":M_deviceid" => $this->userid
        );
        $this->trade = $tradeObj->findAll($condition, null, $sql);

    }

    function actionAskrefund(){
        $this->title = "";

        //$out_trade_no = arg("out_trade_no");
        //$trade_no = arg("trade_no");
        $trade_id = arg("trade_id");

        //更改数据库
        $tradeObj = new Model("trade");
        //判断条件-out_trade_no是否相同
        $condtion = array('trade_id'=>$trade_id);
        $tradeObj->update($condtion,array('atrefund'=>'Y'));

        $this->jump(url("mine", "atrefund"));

    }

    function actionAtrefund(){
        $this->title = "我的退款";

        $this->WebUserName = $_SESSION["username"];
        $this->userid = $_SESSION["userid"];
        $this->deviceid = $_SESSION["deviceid"];
        //读取数据库中的product全部种类
        $productObj = new Model("product");
        $this->product = $productObj->findAll();
        //$this->product = array();
        $tradeObj = new Model("trade");
        $sql = "trade_id, deviceid, userid, productid, productweight, trade_no, out_trade_no, isrefund";
        $sql .= ", (SELECT product_name FROM product WHERE product_id=productid) as product_name";
        $sql .= ", (SELECT product_img FROM product WHERE product_id=productid) as product_img";
        $sql .= ", (SELECT product_price FROM product WHERE product_id=productid) as product_price";
        $sql .= ", (SELECT product_price*productweight FROM product WHERE product_id=productid) as all_price";

        $condition = array("deviceid = :M_deviceid and userid = :M_deviceid and trade_no <> '' and atrefund = 'Y'",
            ":M_deviceid" => $this->deviceid,
            ":M_deviceid" => $this->userid
        );
        $this->trade = $tradeObj->findAll($condition, null, $sql);

    }

    function actionAgreerefund(){
        $this->title = "";

        $out_trade_no = arg("out_trade_no");
        $total_pay = arg("total_pay");
        $trade_no = arg("trade_no");
        $trade_id = arg("trade_id");

        $obj = new Alipay();
        $pay_params = [
            'out_trade_no' => $out_trade_no,
            'refund_amount' => $total_pay,
            'out_request_no' => $trade_id
        ];

        // 获取从支付宝发送退款申请的返回值，利用返回值进行判断，从而修改数据库
        $result = $obj->refund($pay_params);
        $result = json_decode($result,true);

        //echo '<pre>';
        //print_r($result);

        if($result['alipay_trade_refund_response']['msg'] == 'Success'){
            //更改数据库
            $tradeObj = new Model("trade");
            //判断条件-out_trade_no是否相同
            $condtion = array('trade_id'=>$trade_id);
            $tradeObj->update($condtion,array('isrefund'=>'Y'));
        }else{

        }
        $this->jump(url("mine", "atrefund"));

    }

    function actionChangepwd(){
        $this->title = "修改信息";

        $this->userid = $_SESSION["userid"];
        $this->username = $_SESSION["username"];
    }

    function actionPwdsave(){
        $this->title = "";
    }
}