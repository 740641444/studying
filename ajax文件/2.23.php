<?php

if(is_uploaded_file($_FILES["file"]["tmp_name"])){
	$name=$_FILES["file"]["name"];
	$lei=substr($name,-4);
	if($lei==".jpg"||$lei==".png"){
		move_uploaded_file($_FILES["file"]["tmp_name"],"aaa/".$name);
		echo "1";		
	}else{
		echo "2";
	}
}


?>