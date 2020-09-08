<?php
session_start();
require "connect.php";
$memberId = $_SESSION["memberId"];
$serverId = $_SESSION["serverId"];
//echo $serverId;
//echo $memberId;

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
$test = "select (r.stock - b.want) stockn from res r inner join buycar b on r.resId=b.resId";
$test1 = mysqli_query($link, $test);

if (isset($_POST["btnOK"])) {
    if ($sum["SUM(total)"] != "") {
        $listdate = date('Ymd', time());
        $check = "select num from orderlist order by num DESC limit 1";
        $check1 = mysqli_query($link, $check);
        $checknum = mysqli_fetch_assoc($check1);
        //echo $checknum["num"];
        //$checkdate = $checknum["listdate"];
        $n = $checknum["num"] + 1;
        $listnumber = $listdate . $n;
        // if ($listnumber == $checkdate . $n)
        // {
        //echo $listnumber;
        if ($n != $check["num"]) {
            if ($serverId == 0) {
                $buylist = "insert into orderlist (num,listnumber,memberId,serverId) values ($n,$listnumber,$memberId,$serverId)";
                $sel = "select listnumber from orderlist where memberId = $memberId order by listnumber DESC limit 1";
            } else {
                $buylist = "insert into orderlist (num,listnumber,memberId,serverId) values ($n,$listnumber,0,$serverId)";
                $sel = "select listnumber from orderlist where serverId = $serverId order by listnumber DESC limit 1";
            }
            mysqli_query($link, $buylist);
        }

        // } else {
        //     $x++;
        $cre = <<< cre1
    create table `$listnumber` select * from buycar;
    cre1;
        mysqli_query($link, $cre);
        //}
        $sel1 = mysqli_query($link, $sel);
        $sel2 = mysqli_fetch_assoc($sel1);
        $tabnum = $sel2["listnumber"];

        $trun = "truncate table buycar";
        mysqli_query($link, $trun);
        $_SESSION["tabnum"] = $tabnum;
        $sqlupt = "update res set stock=temp";
        mysqli_query($link, $sqlupt);

        header("Location: index.php");
    } else {
        echo '<script>alert("購物車內尚無商品")</script>';
    }
}

//echo $sel2["listnumber"];

//$cre = "create table `$tabnum` select * from buycar;";

// mysqli_query($link,$cre);
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
//echo $sum["SUM(total)"];
//$add = mysqli_query($link, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>購物車</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel=stylesheet type="text/css" href="main.css">
</head>
<body style="background-color: #c1eff7">

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
        <td><?=($row["total"])?></td>
        <td>
          <form method ="post">
            <span>
                 <a href="./delcar.php?id=<?=$row["resId"]?>" class="btn btn-outline-danger btn-sm">移除</a>
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