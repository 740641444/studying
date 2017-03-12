<?php
    class main{
        function __construct()
        {
            $this->session=new session();

            $this->smarty=new Smarty();
            $this->smarty->setCompileDir("compile");
            $this->smarty->setTemplateDir("template");

        }

        /*
         * 跳转
         * */
        public function jump($url,$message){
            $this->smarty->assign("url",$url);
            $this->smarty->assign("message",$message);
            $this->smarty->display("index/tishi.html");
        }

        /*
         * 检测登陆
         * */
        function checkLogin(){
            if(!($this->session->get("is_login")&&!empty(MVC))){
                $url="index.php?m=admin&f=index&a=login";
                $message="请登陆";
                $this->jump($url,$message);
                return false;
            }else{
                return true;
            }
        }
        
        function ziduanjiangxu($oldarr,$shuxing){
    		$arr=Array();
    		for($i=0;$i<count($oldarr);$i++){
    			$arr[$i]=$oldarr[$i][$shuxing];
    		}
    		rsort($arr);
    		$newarr=Array();
    		
    		for($m=0;$m<count($arr);$m++){
	    		for($n=0;$n<count($oldarr);$n++){
	    			if($arr[$m]==$oldarr[$n][$shuxing]){
	    				$newarr[$m]=$oldarr[$n];
	    			}
	    		}
    		}  	
    		return $newarr;  
    		      	
        }
        //数据读取
        function publicdata(){
	    	//获取目录
	    	$db=new db("category");
	    	$result=$db->select();
	    	$this->smarty->assign('result',$result);
	    	//获取文章目录
	    	$dbshows=new db("shows");
	    	$resultshows=$dbshows->select();
	    	$resultshows=array_reverse($resultshows);
	    	$this->smarty->assign('resultshows',$resultshows);	
    		//收藏排行
            $resultshoucang=$this->ziduanjiangxu($resultshows,"shoucangshu");
            $this->smarty->assign('resultshoucang',$resultshoucang);	
            //评论排行
            $resultpinglun=$this->ziduanjiangxu($resultshows,"pinglunshu");
            $this->smarty->assign('resultpinglun',$resultpinglun);  
            //推荐排行
            $resulttuijian=Array();
            for($i=0;$i<count($resultshows);$i++){
            	if($resultshows[$i]["tuijian"]==1){
            		$resulttuijian[$i]=$resultshows[$i];
            	}
            }
            $this->smarty->assign('resulttuijian',$resulttuijian);                  
	    }
    }

