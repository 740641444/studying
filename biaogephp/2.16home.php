<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Document</title>
<style>

table{
	width: 500px;
	margin: 0 auto;
	border: 1px solid #000;
}
td,th{
	width: 100px;
	border: 1px solid #000;
	text-align: center;
}
.add{
	display: block;
	text-decoration: none;
	position: fixed;
	width: 90px;
	height: 60px;
	text-align: center;
	line-height: 60px;
	border: 1px solid #000;
	cursor: pointer;
	font-size: 30px;
	background-color: purple;
	color: #fff;
}
.del{
	display: block;
	text-decoration: none;	
	width: 49px;
	font-weight: 500;
	float: left;
	background-color: pink;
	border-radius: 1px;
}
.update{
	display: block;
	text-decoration: none;
	float:left;
	width: 50px;
	background-color: pink;
	border-radius: 1px;
}

</style>
<script>
window.onload=function(){
	var table=document.getElementsByTagName("table");
	var del=document.querySelector(".del");
	var add=document.getElementsByClassName(".add")[0];
}
</script>
</head>
<body>
	<div><a class="add" href="2.16add.php">添加</a></div>
	<table cellspacing="0" cellpadding="0">
		<tr>
			<th>学号</th>
			<th>姓名</th>
			<th>年龄</th>
			<th>性别</th>
			<th>备注</th>
		</tr>
		<?php
		include "2.16db.php";
		$result=$db->query("select * from stu");
		echo "<pre>";
		$str="";
		while($row=$result->fetch_assoc()){
			$str.="<tr>";
			$str.="<td>".$row["id"]."</td>";
			$str.="<td>".$row["name"]."</td>";
			$str.="<td>".$row["age"]."</td>";
			$str.="<td>".$row["sex"]."</td>";
			$str.="<td><a class='del' href='2.16del.php?id=$row[id]'>删除</a><a class='update' href='#'>修改</a></td>";
			$str.="</tr>";
		}
		echo $str;
		?>
	</table>
</body>
</html>
