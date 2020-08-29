<?php
session_start();
require "connect.php";
$memberId = $_SESSION["memberId"];
$serverId = $_SESSION["serverId"];
echo $serverId;
if ($_SESSION["serverId"] == 0) {
    $sql = "select * from buycar where memberId = $memberId";
    $sql2 = "select SUM(total) from buycar where memberId = $memberId";
} else {
    $sql = "select * from buycar where serverId = $serverId";
    $sql2 = "select SUM(total) from buycar where serverId = $serverId";
}

$result = mysqli_query($link, $sql);
$total = mysqli_query($link, $sql2);
$sum = mysqli_fetch_assoc($total);
$sum1 = $sum["total"];
$want1 = $sum["want"];

if (isset($_POST["btnOK"])) 
{
    $k = $n;
    $x= 0;
    $listdate = date('Ymd', time());
    $check = "select num from buylist$x order by num DESC limit 1";
    $check1 = mysqli_query($link, $check);
    $checknum = mysqli_fetch_assoc($check1);
    //echo $checknum["num"];
    //$checkdate = $checknum["listdate"];
    $n = $checknum["num"] + 1;
    $listnumber = $listdate . $n;
    // if ($listnumber == $checkdate . $n) 
    // {
        //echo $listnumber;
        if ($n != $check["num"]) 
        {
          if($serverId==0)
          {
            $buylist = "insert into buylist$x (listdate,num,listnumber,memberId) values
      ($listdate,$n,$listnumber,$memberId)";
      $sel = "select listnumber from buylist$x where memberId = $memberId order by listnumber DESC limit 1";
          }
          else
          {
            $buylist = "insert into buylist$x (listdate,num,listnumber,serverId) values
      ($listdate,$n,$listnumber,$serverId)";
      $sel = "select listnumber from buylist$x where serverId = $serverId order by listnumber DESC limit 1";
          }
            mysqli_query($link, $buylist);
        }
    // } else {
    //     $x++;
    //     $cre = <<< cre1
    // create table buylist$x
    // (
    //     buylistId int auto_increment  primary key,
    //     listdate int,
    //     num int ,
    //     listnumber int,
    //     memberId int
    // );
    // insert into buylist$x (num) values (0);
    // cre1;
    //     mysqli_query($link, $cre);
    // }
  
   
   $sel1 = mysqli_query($link,$sel);
   $sel2 =mysqli_fetch_assoc($sel1);
   $tabnum = $sel2["listnumber"];
   //echo $sel2["listnumber"];

   $cre = "create table `$tabnum` select * from buycar;";

   mysqli_query($link,$cre);
  //  $sql="insert into tempcar select * from buycar";
 
  //  $sel = "select * from $tabnum";
  //  $temp=mysqli_query($link,$sel);
  //  $temp2=mysqli_fetch_assoc($temp);
  //   $want2=$temp2["want"];
  //  $total2=$sum;
  //  if($temp2["resId"]!="")
  //  {
  //    $sql2="update tempcar set want = $want1,total=$sum1 where resId =$id";
  //  }
  $trun = "truncate table buycar";
  mysqli_query($link,$trun) ;
  $_SESSION["tabnum"]=$tabnum;
  header("Location: index.php");
}

//echo $sum["SUM(total)"];
//$add = mysqli_query($link, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style type="text/css">
    .header
    {
      height:50px;
      line-height:80px;
      width:100%;
      background-color: #c1eff7;
      padding-right: 15px;
      position: fixed;
      z-index:50;
    }
    .car
    {
      position:fixed;
      right:0px;
      top:50px;

    }
    .fl
    {
      position:fixed;
      right:0px;
      top:0px;
    }
    .fm
    {
      position:fixed;
      right:75px;
      top:0px;

    }
    .fx
    {
      position: fixed;
    }
    .tb
    {
      top:50px;
      position:relative;
      z-index:0;
    }
    .hh
    {
      position: absolute;
      margin-top:30px;
    }
    .hr
    {
      position: absolute;
      margin-top:30px;
      right:0px;
    }
  </style>
</head>
<body>

<script>

    if ( window.history.replaceState )
    {
        window.history.replaceState( null, null, window.location.href );
    }

</script>
<div id = "all">
  <form method="post" class="header">
  <h1>黑心購物網</h1>
  <a href = "login.php" class = "btn btn-outline-info btn-lg fl" name="btnlogin"><?php if ($user == "guest") {?><?="登入"?><?php } else {?><?="登出"?><?php }?></a>
  <a href = "membermange.php" id=btnmember style="<?php if ($_SESSION["check"] == 0) {?><?="display:none"?><?php }?>" name = btnmember class = "btn btn-outline-info btn-lg fm">會員管理</a>
    </form>
<div>
<div class="tb">
<table class="table table-dark">
    <thead>
      <tr>
        <th>產品名稱</th>
        <th>價格</th>
        <th>數量</th>
        <th>金額</th>
      </tr>
    </thead>
    <tbody>
    <?php while ($row = mysqli_fetch_assoc($result)) {?>
      <tr>
        <td><?=$row["resname"]?></td>
        <td><?="$" . $row["price"] . "元"?></td>
        <td><?=$row["want"]?></td>
        <td><?=($row["want"]) * ($row["price"])?></td>
        <td>
          <form method ="POST">
            <span>
                 <a href="./delcar.php?id=<?=$row["buyId"]?>" class="btn btn-outline-danger btn-sm">移除</a>
            </span>
          </form>
        </form>
        </td>
      </tr>
    <?php }?>
    </tbody>
  </table>
</div>
       <h2 class="hh">總共:<?=$sum["SUM(total)"] . "元"?></h2>
       <form method="post">
         <input name="btnOK" type="submit" class="btn btn-warning hr" value="送出"/>
       </form>

</body>
</html>