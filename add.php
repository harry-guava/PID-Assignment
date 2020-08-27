<?php
session_start();
require("connect.php");

$id = $_GET["id"];
//echo $id
$sql = "select * from res where `resId` = $id";
$result = mysqli_query($link, $sql);
//var_dump($result);
$row = mysqli_fetch_assoc($result);
 $resname= $row["resname"];
 $price = $row["price"];
 //
 $want = $_SESSION["addbuy"];
 echo $_SESSION["addbuy"];
 $sql2 = <<< car
  insert into buycar (resId,resname,price,want,total) values
  ('$id','$resname','$price','$want',('$price'*'$want'))
 car;

mysqli_query($link,$sql2);

//header("Location: carlist.php");

?>