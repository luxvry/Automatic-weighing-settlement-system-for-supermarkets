<?php
class ForgetController extends BaseController {
    public $WEB_DIR = WEB_DIR;
    // 注册表单
    function actionIndex() {
        $this->title = "忘记密码";
    }

    // 注册检查
    function actionRest() {
        $uname = arg("username");
        $upwd = arg("userpwd");
        /*
        $userObj = new User(); // 初始化留言本模型类
        $uname = arg("username");
        $upwd = arg("userpwd");

        $info = $userObj->find(array("username"=>$uname));

        if($info){
            $this->tips("用户已存在，注册失败！", url("reg", "index"));
        }
        */

        if ($uname && $upwd) {
            $userObj = new User(); // 初始化留言本模型类
            $salt = substr(uniqid(), 0, 10);

            $newrow = array( // PHP的数组
                'username' => $uname,
                'userpass' => md5($uname. $salt .$upwd),
                "salt" => $salt,
            );

            if ($userObj->create($newrow)) {
                $this->tips("用户注册成功！", url("login", "index"));
            }else{
                $this->tips("用户注册失败！", url("reg", "index"));
            }
        }
    }
    // 注册检查
    function actionCheckuser() {
        $revalue = 0;
        $userObj = new User(); // 初始化留言本模型类
        $uname = arg("username");
        $upwd = arg("userpwd");

        $info = $userObj->find(array("username"=>$uname));

        if($info){
            $revalue = 1;
        }
        echo $revalue;
    }
}