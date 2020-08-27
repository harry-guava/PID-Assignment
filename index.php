<?php
session_start();
require "connect.php";
$check = $_SESSION["check"];
if (isset($_SESSION["userName"])) {
    $user = $_SESSION["userName"];
} else {
    $user = "guest";
}
///商品清單
$sql = "select * from res";
$result = mysqli_query($link, $sql);
$add = mysqli_query($link, $sql);
$car = mysqli_fetch_assoc($add);
//var_dump($result);
$resname = $car["resname"];
if (isset($_POST["addcar"])) {
  $addbuy = $_POST["number"];
  echo $addbuy;
  $_SESSION["addbuy"] = $addbuy;
}

if(isset($_POST["buycar"]))
{
  header("Location: carlist.php");
}
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
  <input type="submit" id="buycar" name="buycar" value="購物車" class="car"/>
    </form>
<div>
<div class="tb">
<table class="table table-dark">
    <thead>
      <tr>
        <th>產品編號</th>
        <th>產品名稱</th>
        <th>價格</th>
        <th>數量</th>
        <th>庫存</th>
      </tr>
    </thead>
    <tbody>
    <?php while ($row = mysqli_fetch_assoc($result)) {?>
      <tr>
        <td><?=$row["resId"]?></td>
        <td><?=$row["resname"]?></td>
        <td><?="$" . $row["price"] . "元"?></td>
        <form id="formadd" name="formadd" method = "post">
        <td><input name="number" id="number" type="number" value=1 oninput="if(value<1)value=1" style ="width:50px"/></td>
        <td><?=$row["stock"]?></td>
        <td>       
            <span>
            <a href="./add.php?="<?=$row["resId"]?>><button name="addcar">加入購物車</button></a>
            </span>
        </form>
        </td>
      </tr>
    <?php }?>
    </tbody>
  </table>
</div>
</body>
</html>