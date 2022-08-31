<?php
class MainController extends BaseController {
    public $WEB_DIR = WEB_DIR;
	// 首页
    function actionIndex(){
        // 连个hello world都木有？
        $this->title = "超市自动称重计算系统";
        // 回答：页面自动输出，请看main_index.html
        if(!isset($_SESSION["username"]))
            $this->jump(url("login", "index"));
    }

	function actionOrder(){
        $this->title = "";

        $this->WebUserName = $_SESSION["username"];
        $this->userid = $_SESSION["userid"];
        $this->deviceid = $_SESSION["deviceid"];
        //读取数据库中的product全部种类
        $productObj = new Model("product");
        $this->product = $productObj->findAll();
        //$this->product = array();
        $tradeObj = new Model("trade");
        $sql = "trade_id, deviceid, userid, productid, productweight";
        $sql .= ", (SELECT product_name FROM product WHERE product_id=productid) as product_name";
        $sql .= ", (SELECT product_img FROM product WHERE product_id=productid) as product_img";
        $sql .= ", (SELECT product_price FROM product WHERE product_id=productid) as product_price";
        $sql .= ", (SELECT product_price*productweight FROM product WHERE product_id=productid) as all_price";

        $condition = array(
            "deviceid" => $this->deviceid,
            "userid" => $this->userid,
            "trade_no" => "",
        );
        $this->trade = $tradeObj->findAll($condition, null, $sql);

	}
    function actionMine(){
        $this->title = "";

        $this->WebUserName = $_SESSION["username"];
        $this->userid = $_SESSION["userid"];
        $this->deviceid = $_SESSION["deviceid"];
        $this->userpoints = 0;

        $tradeObj = new Model("trade");

        $sql = "sum(productweight*(SELECT product_price FROM product WHERE product_id=productid)) as points";

        $condition = array("deviceid = :M_deviceid and userid = :M_deviceid and trade_no <> '' and atrefund = 'N' and isrefund = 'N'",
            ":M_deviceid" => $this->deviceid,
            ":M_deviceid" => $this->userid
        );
        $this->trade = $tradeObj->findAll($condition, null, $sql);

        if ($this->trade[0]['points']){
            $this->userpoints = $this->trade[0]['points'];
        }

    }

    function actionAdd(){
        /*
        $deviceid = $_SESSION["deviceid"];
        $userid = $_SESSION["userid"];
        $productid = arg("productid");
        $productweight = arg("productweight");

        //echo "productid:".$productid.",productweight:".$productweight;
        if ($productid && $productweight) {
            $tradeObj = new Model("trade");

            $newrow = array( // PHP的数组
                'deviceid' => $deviceid,
                'userid' => $userid,
                'productid' => $productid,
                'productweight' => $productweight,

            );

            if ($tradeObj->create($newrow)) {
                $this->tips("添加成功！", url("main", "index"));
            }else{
                $this->tips("添加失败！", url("main", "index"));
            }

        }
        */
        $this->userid = $_SESSION["userid"];
        $this->deviceid = $_SESSION["deviceid"];

        //发送did和uid给后台电脑
        //$aip = new Alipay();
        $postdata = [
            'deviceid' => $this->deviceid,
            'userid' => $this->userid
        ];
        //$aip->curlRequest("http://192.168.31.109:7000",$postdata);

        $data = http_build_query($postdata);
        $opts = array('http' => array('method' => 'POST', 'header' => 'Content-type: application/x-www-form-urlencodedrn' . 'Content-Length: ' . strlen($data) . '\r\n', 'content' => $data));
        $context = stream_context_create($opts);
        # http://192.168.31.109
        # http://192.168.123.5
        # http://10.166.178.85
        # 10.167.241.245
        #
        $html = file_get_contents('http://10.167.241.245:7000', false, $context);
        $this->jump(url("main", "index"));

    }

    function actionDel(){

        $tradeid = arg("tid");
        //echo $tradeid;

        if ($tradeid) {
            $tradeObj = new Model("trade");

            $condition = array(
                'trade_id' => $tradeid
            ); // 构造条件

            if ($tradeObj->delete($condition)) {
                $this->tips("删除成功！", url("main", "index"));
            }else{
                $this->tips("删除失败！", url("main", "index"));
            }

        }
    }
}