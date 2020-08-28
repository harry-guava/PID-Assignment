<?php
session_start();
require("connect.php");
//echo $_SESSION["member"];
$memberId = $_SESSION["memberId"];
$serverId = $_SESSION["serverId"];
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
 $sql2 = "select * from buycar where `resId`=$id";
 $result2= mysqli_query($link,$sql2);
 $resname2=  mysqli_fetch_assoc($result2);
if($_SESSION["serverId"]==0)
{
  if($resname2["resname"]==$resname)
  {
    $sql3 = <<< car
    update buycar set want = (want+$want) , total=(want*$price) where resId =$id;
    car;
  }
  else
  {
  $sql3 = <<< car
  insert into buycar (resId,memberId,resname,price,want,total) values
  ('$id','$memberId','$resname','$price','$want',('$price'*'$want'))
 car;
  }
mysqli_query($link,$sql3);
}
else
{
    if($resname2["resname"]==$resname)
    {
       $sql4 = <<<server
       update buycar set want = (want+$want) , total=(want*$price) where resId =$id;
       server;
    }
    else
    {
        $sql4 = <<<server
        insert into buycar (resId,serverId,resname,price,want,total) values
        ('$id','$serverId','$resname','$price','$want',($price*$want))
        server;
    }

mysqli_query($link,$sql4);
}
header("location: index.php");






?>