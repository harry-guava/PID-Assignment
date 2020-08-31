<?php
 session_start();
 require_once("connect.php");
 $id =$_GET["id"];
echo $id;
$sql = "delete from buycar where `resId`= $id";
$sql2= "update res set temp = stock where `resId`= $id";
mysqli_query($link,$sql);
mysqli_query($link,$sql2);
header("Location: carlist.php");



?>