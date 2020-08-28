<?php
 session_start();
 require_once("connect.php");
 $id =$_GET["id"];

$sql = "delete from buycar where `buyId`= $id";

mysqli_query($link,$sql);

header("Location: carlist.php");



?>