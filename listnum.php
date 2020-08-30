<?php
session_start();
require("connect.php");
$memberId = $_SESSION["memberId"];
$serverId = $_SESSION["serverId"];
$listshow =$_SESSION["listshow"];

$sql = "select * from `$listshow`";
$sql2 ="select SUM(total) from `$listshow`";
$result = mysqli_query($link,$sql);

$sum = mysqli_query($link,$sql2);
$sumre = mysqli_fetch_assoc($sum);


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
      </tr>
    <?php }?>
         <td style="color:yellow">訂單編號</td>
         <td style="color:green"><?=$listshow?></td>
         <td></td>
         <td><h2 style="color:red">總共:<?=$sumre["SUM(total)"]."元"?></h2></td>
    </tbody>
  </table>
</div>
</body>
</html>