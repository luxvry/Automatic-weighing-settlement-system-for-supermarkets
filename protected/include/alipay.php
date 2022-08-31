<?php

class AlipayConfig
{
	/**
     * 以下信息需要根据自己实际情况修改
     */
    const PID = '2088621958296358';//合作伙伴ID
    //自己更改
    const APPID = '2021000119660540';
    const APPPRIKEY = 'MIIEpAIBAAKCAQEAoULdb5RokoxqUiunVAwSFf5Hdcrgnh3UPj9/b+ocE3/JDmuDcEdLLnwiBN+eAxa/VdQso8MPUchHEtSLTeMljwqjFnqnuv9WHB6CX6kxXPnAZk6Ka1IsXVeIAtkV1IVGXsTtEzkrdm88tEh7CyNFgU7fcDhMBewhRWcY68dLBhYFLU4usTm70RwlpyXJY8lqAdHJ/qEkYq6tqq9i2PhYB7eeJOTql70RYvYv/5ZMU3a51k1Yz+81M8Z9Ka1tyt1QEk2UxwfEXzwfRMXlkIhI5WE11AGZXiZaJcXui6fh7Bgev1cOLWdNjecZEriqWeUa5De+sztzi+pTLNvepwSu9QIDAQABAoIBADBMo6Ag1jVWgx27X3Gn797QezzHmAEjtAc044l0mBYrBuAfyY1efSEeIt5Mz7njHUmqs/gUm0kGcGsuZ87bQsuWBwTbldNHWNYxOSFHvrY3Q64gxgqg4RLP/bfEp2owxMPrvYotbFwbsxXYQ6oxVUcGhZvJ8NMxR0HPQEKWPV1DziMZh9Tw9CYuA9FJzfi4ehLG2Eqlu6jhwDzaDfwM1EUO+51sunSNYuXPFw6b5C/6rC22K4q6f70DQ0q4IvmKVkAS+POGa90wWnMnOHoTCvL5b2jM/zBxl5iuAxDLSXznbyNzbWk+5+DFOW/B/yqtj3ABtvKtSTu1NSsVIlHneyECgYEA6y247s2aSYUQilwKNcTjrFpfiFkNQl3rfqTK4IubD9Mw2GDqhk6wwtXXZ55c3GjZXErj4zpat5scbzIye8YoEUMfGCMQmOD2weOr75jQxOm5BzXK/Uy+yPjPJ1ATY3PRAJT27CiIwiDREKSk78QIqHug1DC+TCaEMfOMRxfMa5kCgYEAr4nRmHAMTmdnuMb4ylnO+OnOAWir6kd3b0J7SfJY4fvofKWtXiA6mY2GUwhOH9Pia5yfbGrJ+C8M/JUCE6hhT2tbE6+ECzGHh/sNeLIyVMILto0Leujfg1+tFOZitZUgqBk0eGZkiSk6Qr2dN8QcgeHF63TowD9gP95dmAPyl70CgYBXPHCa9F1E5D0MdbO72jrx1dwWAaJvedM++PXgcSilqBs4SEr2Yv4iZ5wtbYrYn3PxTj5WLXE1Ji5X+PDNBOYb8R/5nhgr/VbK+R7wE2ltgZ0G1adkajFi7xg4ZvWqMG3Yn2kwlKCWEgI7ADfGUJs9lA5GZ4ZPTQJAXS0tueA0EQKBgQCm6/dTbblGFS6clxid0yjtqecrj81qyurX8fArMTk0K8e4QBPMHfmbaukArDUeLu5wRk+TWTkVuCgxR8Dh0Iw4aW4CGjUGL+Mhe6ojy8/wqVVaEmWIS0nAM4rzBOF4qoaTUuSCWVvg0kOEk6qdDO/O0lLSxClQJvPvyBRYKejWQQKBgQCQpOgxF2OINlTx1NUS28gKORWa/H96mj+5NqeauN5Ytdnu9Me0CMDkoi31TPkqWoxmB7wDmY0/b2wv86yUbnd2z4zshCuKVy5VgAkveQlyejgYGFw+rbj2bBzCFpH6iKhXmkPdIh6NCSPLxJMJWLk1askko5vKNiiqDZRUgEVwzQ==';
    //RSA2签名密钥
    const NEW_ALIPUBKEY = 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAjtQXQhAOFK+lI+OhhNF0QBeEhXMjrhzgG9p8e/sIIEy2EIIjxgis2Xnnovm0Vl84ULcs3LPIClp0FfDSK/X5+OwN5ghVraYgGXIZnRJNNa50qhP8ucKLvg6kVfKCGa9zTJKWJYr1LxGDLeWLe6WjG026SRDVWe8S77tjqQyf/jQzhaAuh9z2X0VO74NIWlpAZ4BF8NJIAZB7TlwnJztv+q+8IZgyMUCqrDN+apSImB2kLBt8RKPny3IuD9y1VG2PaGS4C98JzT2j+Bx3Bnz9EdhfUWOmQQrUePuUP++dy0BfX1Aelg8xg0BVPvhEz+6j7UWS8sVQlpM2hYp4xuJp2QIDAQAB';
    //const REURL = 'http://localhost:8080/phproot/webapp/alipay/alipay2/return.php';//同步通知地址
    //const NOURL = 'http://localhost:8080/phproot/webapp/alipay/alipay2/notify.php';//异步通知地址
    // 用户能够看到
    const REURL = 'return.php';//同步通知地址
    // 开发者看到
    const NOURL = 'notify.php';//异步通知地址
    const NEW_PAYGATEWAY = 'https://openapi.alipaydev.com/gateway.do';//正式版：'https://openapi.alipay.com/gateway.do';
    const CHECKURL =  self::NEW_PAYGATEWAY . '?service=notify_verify&partner=' . self::PID . '&notify_id=';

}

/* 
 * 黎明互联
 * https://www.liminghulian.com/
 */

trait RSA
{
    /**
     * RSA签名
     * @param $data 待签名数据
     * @param $private_key 私钥字符串
     * return 签名结果
     */
    function rsaSign($data, $private_key,$type = 'RSA') {

            $search = [
                    "-----BEGIN RSA PRIVATE KEY-----",
                    "-----END RSA PRIVATE KEY-----",
                    "\n",
                    "\r",
                    "\r\n"
            ];

            $private_key=str_replace($search,"",$private_key);
            $private_key=$search[0] . PHP_EOL . wordwrap($private_key, 64, "\n", true) . PHP_EOL . $search[1];
            $res=openssl_get_privatekey($private_key);

            if($res)
            {
                openssl_sign($data, $sign,$res,OPENSSL_ALGO_SHA256);

                openssl_free_key($res);
                    
            }else {
                    exit("私钥格式有误");
            }
            $sign = base64_encode($sign);
            return $sign;
    }

    /**
     * RSA验签
     * @param $data 待签名数据
     * @param $public_key 公钥字符串
     * @param $sign 要校对的的签名结果
     * return 验证结果
     */
    function rsaCheck($data, $public_key, $sign,$type = 'RSA')  {
            $search = [
                    "-----BEGIN PUBLIC KEY-----",
                    "-----END PUBLIC KEY-----",
                    "\n",
                    "\r",
                    "\r\n"
            ];
            $public_key=str_replace($search,"",$public_key);
            $public_key=$search[0] . PHP_EOL . wordwrap($public_key, 64, "\n", true) . PHP_EOL . $search[1];
            $res=openssl_get_publickey($public_key);
            if($res)
            {                
                $result = (bool)openssl_verify($data, base64_decode($sign), $res,OPENSSL_ALGO_SHA256);                
                openssl_free_key($res);
            }else{
                    exit("公钥格式有误!");
            }
            return $result;
    }

}

/* 
 * 黎明互联
 * https://www.liminghulian.com/
 */

class Base extends AlipayConfig
{
    use RSA;
    public function __construct() {
        $this->NotifyURL = $this->getPageURL(true).'/' . self::NOURL;
        $this->ReturnURL = $this->getPageURL(true).'/' . self::REURL;
    }
    /*
    public function getNotifyURL() {
        return  $this->getPageURL(true).'/' . self::NOURL;
    }
    public function getReturnURL() {
        return  $this->getPageURL(true).'/' . self::REURL;
    }*/

    public function setNotifyURL($url) {
        $this->NotifyURL = $url;
    }
    public function setReturnURL($url) {
        $this->ReturnURL = $url;
    }

    public function getHostURL() {
        $hostURL = 'http';
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
            $hostURL .= 's';
        }
        $hostURL .= '://';
        if ($_SERVER['SERVER_PORT'] != '80') {
            //$hostURL .= $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] ;
            $hostURL .= $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'];
        } else {
            //$hostURL .= $_SERVER['SERVER_NAME'] ;
            $hostURL .= $_SERVER['SERVER_NAME'];
        }
        return $hostURL;
    }

    public function getPageURL($main = false) {
        /*
        $pageURL = 'http';
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
            $pageURL .= 's';
        }
        $pageURL .= '://';
        if ($_SERVER['SERVER_PORT'] != '80') {
            //$pageURL .= $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . $_SERVER['REQUEST_URI'];
            $pageURL .= $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . $_SERVER['SCRIPT_NAME'];
        } else {
            //$pageURL .= $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
            $pageURL .= $_SERVER['SERVER_NAME']  . $_SERVER['SCRIPT_NAME'];
        }*/
        $pageURL = $this->getHostURL() . $_SERVER['SCRIPT_NAME'];
        if ($main) {
            $pageURL = dirname($pageURL);
        }
        return $pageURL;
    }
    
    public function getStr($arr,$type = 'RSA'){
        //筛选  
        if(isset($arr['sign'])){
            unset($arr['sign']);
        }
        if(isset($arr['sign_type']) && $type == 'RSA'){
            unset($arr['sign_type']);
        }
        //排序  
        ksort($arr);
        //拼接
       return  $this->getUrl($arr,false);
    }
    //将数组转换为url格式的字符串
    public function getUrl($arr,$encode = true){
       if($encode){
            return http_build_query($arr);
       }else{
            return urldecode(http_build_query($arr));
       }
    }
	
    //获取签名RSA2
    public function getRsa2Sign($arr){
       return $this->rsaSign($this->getStr($arr,'RSA2'), self::APPPRIKEY,'RSA2') ;
    }
    //获取含有签名的数组RSA2
    public function setRsa2Sign($arr){
        $arr['sign'] = $this->getRsa2Sign($arr);
        return $arr;
    }
    //记录日志
    public function logs($filename,$data){
        file_put_contents('./logs/' . $filename, $data . "\r\n",FILE_APPEND);
    }
     
    //验证是否来之支付宝的通知
    public function isAlipay($arr){
        $str = file_get_contents(self::CHECKURL . $arr['notify_id']);
        if($str == 'true'){
            return true;
        }else{
            return false;
        }
    }
    // 4.验证交易状态
    public function checkOrderStatus($arr){
        if($arr['trade_status'] == 'TRADE_SUCCESS' || $arr['trade_status'] == 'TRADE_FINISHED'){
            return true;
        } else {
            return false;
        }
    }

    /**
    使用curl方式实现get或post请求
    @param $url 请求的url地址
    @param $data 发送的post数据 如果为空则为get方式请求
    return 请求后获取到的数据
     */
    public function curlRequest($url,$data = ''){
        $ch = curl_init();
        $params[CURLOPT_URL] = $url;    //请求url地址
        $params[CURLOPT_HEADER] = false; //是否返回响应头信息
        $params[CURLOPT_RETURNTRANSFER] = true; //是否将结果返回
        $params[CURLOPT_FOLLOWLOCATION] = true; //是否重定向
        $params[CURLOPT_TIMEOUT] = 30; //超时时间
        if(!empty($data)){
            $params[CURLOPT_POST] = true;
            $params[CURLOPT_POSTFIELDS] = $data;
        }
        $params[CURLOPT_SSL_VERIFYPEER] = false;//请求https时设置,还有其他解决方案
        $params[CURLOPT_SSL_VERIFYHOST] = false;//请求https时,其他方案查看其他博文
        curl_setopt_array($ch, $params); //传入curl参数
        $content = curl_exec($ch); //执行
        curl_close($ch); //关闭连接
        return $content;
    }


    /**
     * 是否移动端访问访问
     *
     * @return bool
     */
    public function isMobileClient(){
     // 如果有HTTP_X_WAP_PROFILE则一定是移动设备
      if (isset($_SERVER['HTTP_X_WAP_PROFILE'])) {
          return true;
      }

      //如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
      if (isset($_SERVER['HTTP_VIA'])) {
           //找不到为flase,否则为true
           return stristr($_SERVER['HTTP_VIA'], "wap") ? true : false;
      }

      //判断手机发送的客户端标志
      if (isset($_SERVER['HTTP_USER_AGENT'])) {
        $clientkeywords = [
          'nokia', 'sony', 'ericsson', 'mot', 'samsung', 'htc', 'sgh', 'lg', 'sharp',
          'sie-', 'philips', 'panasonic', 'alcatel', 'lenovo', 'iphone', 'ipod', 'blackberry', 'meizu',
          'android', 'netfront', 'symbian', 'ucweb', 'windowsce', 'palm', 'operamini', 'operamobi',
          'openwave', 'nexusone', 'cldc', 'midp', 'wap', 'mobile','alipay'
        ];

      // 从HTTP_USER_AGENT中查找手机浏览器的关键字
         if (preg_match("/(".implode('|', $clientkeywords).")/i", strtolower($_SERVER['HTTP_USER_AGENT']))) {
               return true;
         }
      }

      //协议法，因为有可能不准确，放到最后判断
      if (isset($_SERVER['HTTP_ACCEPT'])) {
         // 如果只支持wml并且不支持html那一定是移动设备
         // 如果支持wml和html但是wml在html之前则是移动设备
         if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))) {
              return true;
         }
      }
      
      if (strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false) {
             return true;
      }
      if (strpos($_SERVER['HTTP_USER_AGENT'], 'Alipay') !== false) {
             return true;
      }
       return false;
    }
}

/* 
 * 黎明互联
 * https://www.liminghulian.com/
 */

class Alipay extends Base
{
    public function __construct() {
		//$this->newPay();
        //$this->Qery();
        //$this->refund();
        //$this->refundQuery();
    }

    public function newPay($api_params){
        //公共参数
        $pub_params = [
            'app_id'    => self::APPID,
            //'method'    =>  'alipay.trade.page.pay', //接口名称 应填写固定值alipay.trade.page.pay
            //'method' => 'alipay.trade.wap.pay',             //接口名称
            'method' => ($this->isMobileClient()?'alipay.trade.wap.pay':'alipay.trade.page.pay'),             //接口名称
            'format'    =>  'JSON', //目前仅支持JSON
            'charset'    =>  'UTF-8',
            'sign_type'    =>  'RSA2',//签名方式
            'sign'    =>  '', //签名
            'timestamp'    => date('Y-m-d H:i:s'), //发送时间 格式0000-00-00 00:00:00
            'version'    =>  '1.0', //固定为1.0
            //'notify_url' => self::getNotifyURL() ,//异步通知地址
            //'return_url' => self::getReturnURL(),//同步通知地址
            'notify_url' => $this->NotifyURL ,//异步通知地址
            'return_url' => $this->ReturnURL,//同步通知地址
            'biz_content'    =>  '', //业务请求参数的集合
        ];
        /*
        //业务参数
        $api_params = [
            'out_trade_no'  => date('YmdHis'),//商户订单号
            //'product_code'  => 'FAST_INSTANT_TRADE_PAY', //销售产品码 固定值
             //'product_code'=>'QUICK_WAP_WAY',
            'product_code'=> ($this->isMobileClient()?'QUICK_WAP_WAY':'FAST_INSTANT_TRADE_PAY'),
            'total_amount'  => 0.01, //总价 单位为元
            'subject'  => '新版支付宝支付', //订单标题
        ];*/
        $api_params['product_code'] = $this->isMobileClient()?'QUICK_WAP_WAY':'FAST_INSTANT_TRADE_PAY';
        //echo  "return_url:".$pub_params['return_url']."<br>";
        //echo  "notify_url:".$pub_params['notify_url']."<br>";
        //print_r($api_params);
        //exit();
        $pub_params['biz_content'] = json_encode($api_params,JSON_UNESCAPED_UNICODE);
        //echo '<pre>';
        $this->logs("pub_params.txt",print_r($pub_params,true));
        $pub_params =  $this->setRsa2Sign($pub_params);
        //print_r($pub_params);
        $this->logs("pub_params.txt",print_r($pub_params,true));
        $url = self::NEW_PAYGATEWAY . '?' . $this->getUrl($pub_params);
        header("location:" . $url);
    }
    //查询账单
    public function Qery($api_params){
        //公共参数
        $pub_params = [
            'app_id'    => self::APPID,
            'method'    =>  'alipay.trade.query', //接口名称 应填写固定值alipay.trade.query
            'format'    =>  'JSON', //目前仅支持JSON
            'charset'    =>  'UTF-8',
            'sign_type'    =>  'RSA2',//签名方式
            'sign'    =>  '', //签名
            'timestamp'    => date('Y-m-d H:i:s'), //发送时间 格式0000-00-00 00:00:00
            'version'    =>  '1.0', //固定为1.0
            'return_url' => self::getReturnURL(),//同步通知地址
            'notify_url' => self::getNotifyURL() ,//异步通知地址
            'biz_content'    =>  '', //业务请求参数的集合
        ];
        /*
        //业务参数
        $api_params = [
            'out_trade_no' => '202242224053850',//商户订单号
        ];*/
        //echo  "return_url:".$pub_params['return_url']."<br>";
        //echo  "notify_url:".$pub_params['notify_url']."<br>";
        //exit();
        $pub_params['biz_content'] = json_encode($api_params,JSON_UNESCAPED_UNICODE);
        // echo '<pre>';
        $pub_params =  $this->setRsa2Sign($pub_params);
        //print_r($pub_params);
        $json_data = $this->curlRequest(self::NEW_PAYGATEWAY,$pub_params);
        echo '<pre>';
        print_r(json_decode($json_data,true));

        //$url = self::NEW_PAYGATEWAY . '?' . $this->getUrl($pub_params);
        //header("location:" . $url);
    }
    //退款
    public function refund($api_params){//new
        //公共参数 固定值
        $pub_params = [
            'app_id'    => self::APPID,
            'method'    =>  'alipay.trade.refund', //接口名称 应填写固定值alipay.trade.refund
            'format'    =>  'JSON', //目前仅支持JSON
            'charset'    =>  'UTF-8',
            'sign_type'    =>  'RSA2',//签名方式
            'timestamp'    => date('Y-m-d H:i:s'), //发送时间 格式0000-00-00 00:00:00
            'version'    =>  '1.0', //固定为1.0
            'biz_content'    =>  '', //业务请求参数的集合
        ];
        /*
        //业务参数
        $api_params = [
            //'out_trade_no'  => '202242224053850',//商户订单号 和支付宝交易号trade_no 二选一
            'trade_no'  => '2022040222001465320501784029',//商户订单号 和支付宝交易号trade_no 二选一
            'refund_amount'  => '0.01', //退款金额
            'out_request_no'  => '112', //退款唯一标识  部分退款时必传
        ];*/
        //公共参数中加入业务参数
        $pub_params['biz_content'] = json_encode($api_params,JSON_UNESCAPED_UNICODE);
        $pub_data = $this->setRsa2Sign($pub_params);

        $json_data = $this->curlRequest(self::NEW_PAYGATEWAY,$pub_data);
        //echo '<pre>';
        //print_r(json_decode($json_data,true));
        return $json_data;
    }
    //退款查询
    public function refundQuery($api_params){//new
        //公共参数 固定值
        $pub_params = [
            'app_id'    => self::APPID,
            'method'    =>  'alipay.trade.fastpay.refund.query', //接口名称 应填写固定值alipay.trade.fastpay.refund.query
            'format'    =>  'JSON', //目前仅支持JSON
            'charset'    =>  'UTF-8',
            'sign_type'    =>  'RSA2',//签名方式
            'timestamp'    => date('Y-m-d H:i:s'), //发送时间 格式0000-00-00 00:00:00
            'version'    =>  '1.0', //固定为1.0
            'biz_content'    =>  '', //业务请求参数的集合
        ];
        /*
        //业务参数
        $api_params = [
            'out_trade_no' => '20220410121336',
            'out_request_no' => '20220410121336', //必填，请求退款接口时，传入的退款请求号，如果在退款请求时未传入，则该值为创建交易时的外部交易号
        ];*/
        //公共参数中加入业务参数
        $pub_params['biz_content'] = json_encode($api_params,JSON_UNESCAPED_UNICODE);
        $pub_data = $this->setRsa2Sign($pub_params);
        $json_data = $this->curlRequest(self::NEW_PAYGATEWAY,$pub_data);
        echo '<pre>';
        print_r(json_decode($json_data,true));
    }
}

//构建支付请求 可以传递MD5 RSA RSA2三种参数
//$obj = new Alipay('RSA2');