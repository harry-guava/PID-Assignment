<?php
session_start();
require("connect.php");
echo $_SESSION["member"];
$memberId = $_SESSION["memberId"];
//echo $memberId;
$id = $_GET["id"];
//echo $id;
$sql = "select * from res where `resId` = $id";
$result = mysqli_query($link, $sql);
//var_dump($result);
$row = mysqli_fetch_assoc($result);

 $resname= $row["resname"];
 $price = $row["price"];
 $want = $_SESSION["addbuy"];
 //echo $_SESSION["addbuy"];
 $sql3 = <<< car
  insert into buycar (resId,memberId,resname,price,want,total) values
  ('$id','$memberId','$resname','$price','$want',('$price'*'$want'))
 car;
mysqli_query($link,$sql3);

header("Location: index.php");

?>