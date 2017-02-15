<?php

$name1=$_POST["name"];
$name2=$_GET["name"];
if($name2){
	if($name2=="zhangsan"){
		echo "true";
	}else{
		echo "false";
	}	
}else{
	echo "没有data";
}



?>