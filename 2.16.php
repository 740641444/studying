<?php
$db=new mysqli("localhost","root","","w1610");
$db->query("set names utf8");
$result=$db->query("select * from stu");
//var_dump($result);
echo "<pre>";
$str="<table>";
    while($row=$result->fetch_assoc()){
    	$str.="<tr>";
    	$str.="<td>".$row["name"]."</td>";
    	$str.="<td>".$row["age"]."</td>";
    	$str.="<td>".$row["sex"]."</td>";
    	$str.="</tr>";
    }
$str.="</table>";
echo $str;
?>