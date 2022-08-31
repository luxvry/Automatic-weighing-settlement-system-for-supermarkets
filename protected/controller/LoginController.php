<?php
class LoginController extends BaseController {
    public $WEB_DIR = WEB_DIR;
    // 登录表单
    function actionIndex() {
        $this->title = "登录";
        $deviceid = arg("did");
        $deviceid = $deviceid == ""?"1":$deviceid;
        $this->deviceid = $deviceid;
    }

    // 登录检查
    function actionLogin() {
        if (arg("username") && arg("userpwd")) {
            $userObj = new User();
            $is_user = $userObj->check(arg("username"), arg("userpwd"));
            if ($is_user == true) {
            	$info = $userObj->find(array("username"=>arg("username")));
            	$userObj->update(array("username"=>arg("username")), array("last_login"=>time()));

                $_SESSION["userid"] = $info["user_id"];
                $_SESSION["username"] = $info["username"];
                $_SESSION["role_id"] = $info["role_id"];
                $_SESSION["deviceid"] = arg("deviceid");
//				$roleObj = new Role();
//				$_SESSION["menus"] = $roleObj->getMenus($info["role_id"], "admin");
//				$_SESSION["acls"] = $roleObj->getAcls($info["role_id"]);

                //发送did和uid给后台电脑
                //$aip = new Alipay();
//                $postdata = [
//                    'deviceid'    => $_SESSION["deviceid"],
//                    'userid'    =>  $_SESSION["userid"]
//                ];
                //$aip->curlRequest("http://192.168.31.109:7000",$postdata);

//                $data = http_build_query($postdata);
//                $opts = array('http' => array('method' => 'POST', 'header' => 'Content-type: application/x-www-form-urlencodedrn' . 'Content-Length: ' . strlen($data) . '\r\n', 'content' => $data));
//                $context = stream_context_create($opts);
//                # http://192.168.31.109
//                # http://192.168.123.5
//                $html = file_get_contents('http://192.168.31.109:7000', false, $context);
                //echo $html;
                $this->jump(url("main", "index"));
            }
        }
        $this->tips("用户名或密码错误！", url("login", "index"));
    }

    // 登录检查
    function actionChangePwd() {
        if (arg("username") && arg("userpwd")) {
            $userObj = new User();
            $is_user = $userObj->check(arg("username"), arg("userpwd"));
            if ($is_user == true) {
                $info = $userObj->find(array("username"=>arg("username")));
                $userObj->update(array("username"=>arg("username")), array("last_login"=>time()));

                $_SESSION["username"] = $info["username"];
                $_SESSION["role_id"] = $info["role_id"];
//				$roleObj = new Role();
//				$_SESSION["menus"] = $roleObj->getMenus($info["role_id"], "admin");
//				$_SESSION["acls"] = $roleObj->getAcls($info["role_id"]);
                $this->jump(url("main", "index"));
            }
        }
        $this->tips("用户名或密码错误！", url("login", "index"));
    }

    // 退出登录
    function actionLogout(){
        $_SESSION["username"] = null;
        unset($_SESSION["username"]);
        $this->tips("退出成功！", url("login", "index"));
    }

}