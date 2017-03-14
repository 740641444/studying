<?php
class indexMain{
    function __construct()
    {
        $this->session=new session();
        $this->smarty=new Smarty();

        $this->smarty->setCompileDir("compile");
        $this->smarty->setTemplateDir("template");

        if($this->session->get("user_login")&&!empty(MVC)){
            $this->smarty->assign("nickname",$_SESSION["nickname"]);
            $this->smarty->assign("indexUser",$_SESSION["indexUser"]);
            $this->smarty->assign("uid",$_SESSION["uid"]);
        }


//        error_reporting(0);

    }

    /*
     * 跳转
     * */
    public function jump($url,$message){
        $this->smarty->assign("url",$url);
        $this->smarty->assign("message",$message);
        $this->smarty->display("admin/message.html");
    }


    /*
     * 检测登陆
     * */
    function checkLogin(){
        if(!($this->session->get("user_login")&&!empty(MVC))){
            $url="index.php?m=index&f=login&a=startLogin";
            $message="请登陆";
            $this->jump($url,$message);
            return false;
        }else{
            return true;
        }
    }



}

