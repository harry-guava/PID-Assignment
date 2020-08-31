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
 $sql2 = "select * from buycar where resId = $id and memberId = $memberId";
 $sql22 = "select * from buycar where resId = $id and serverId = $serverId";
 $result2= mysqli_query($link,$sql2);
 $result22= mysqli_query($link,$sql22);
 $rows= mysqli_num_rows($result2);
 $rows2 =mysqli_num_rows($result22);
 $row = mysqli_fetch_assoc($result2);
 $row1 = mysqli_fetch_assoc($result22);
 $want1 = $row["want"]+$want;
 //echo $want1;
 if($_SESSION["serverId"]=="")
{
  if($rows!=0)
  {
    $sql3 = <<< car
    update buycar set want = (want+$want) , total=(want*$price) where resId =$id and memberId =$memberId;
    car;
    $sql4 ="update res set temp = temp-$want1 where resId=$id";
  }
  else
  {
  $sql3 = <<< car
  insert into buycar (resId,memberId,resname,price,want,total) values
  ('$id','$memberId','$resname','$price','$want',('$price'*'$want'))
 car;
  }
  $sql4 ="update res set temp = temp-$want1 where resId=$id";

}
else
{
    if($rows2!=0)
    {
       $sql3 = <<<server
       update buycar set want = (want+$want) , total=(want*$price) where resId =$id;
       server;
       $sql4 ="update res set temp = temp-$want1 where resId=$id";
    }
    else
    {
        $sql3 = <<<server
        insert into buycar (resId,serverId,resname,price,want,total) values
        ('$id','$serverId','$resname','$price','$want',($price*$want))
        server;
        $sql4 ="update res set temp = temp-$want1 where resId=$id";
    }

}
mysqli_query($link,$sql3);
mysqli_query($link,$sql4);
header("location: index.php");






?>