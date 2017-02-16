<?php
include "2.16db.php";
$id=$_GET["id"];
$db->query("delete from stu where id=$id");
echo "<script>location.href='2.16home.php'</script>";


?>