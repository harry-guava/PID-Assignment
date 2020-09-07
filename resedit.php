<?php
session_start();
require "connect.php";
$id = $_GET["id"];
$man = "select * from res where resId = $id";
$result = mysqli_query($link, $man);
$row = mysqli_fetch_assoc($result);

if(isset($_POST["btnOK"]))
{
  $editname = $_POST["editname"];
  $editprice = $_POST["editprice"];
  $editstock = $_POST["editstock"];
  echo $editname;
  echo $editprice;
  echo $editstock;
  if(trim($editname&&$editprice&&$editstock)!="")
  {
     $sql = <<< upt
     update res set resname = '$editname',price='$editprice',stock='$editstock',temp='$editstock'
     where resId = $id ;
     upt;
     mysqli_query($link,$sql);
     echo '<script>alert("修改成功");location.replace("resmanage.php");</script>';
     //header("Location: resmanage.php");
  }
  else
  {
      echo '<script>alert(""欄位請勿空白)</script>';
  }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel=stylesheet type="text/css" href="main.css">
    <title>商品管理</title>
    <div id = "all">
  <form method="post" class="header" >
  <h1><a href="index.php" >黑心購物網</a></h1>
  <a href = "login.php" class = "btn btn-outline-info btn-lg fl" name="btnlogin"><?php if ($user == "guest") {?><?="登入"?><?php } else {?><?="登出"?><?php }?></a>
  <a href = "buylist.php" class = "btn btn-outline-info btn-lg fl2" name="btnlist">訂單資料</a>
  <a href = "membermanage.php" id=btnmember name = btnmember class = "btn btn-outline-info btn-lg fm">會員管理</a>
  <a href = "addres.php" id=btnaddres   name = btnaddres class = "btn btn-outline-info btn-lg fn">新增商品</a>
    </form>
<div>
</head>
<body>
<div class="tb">
<table class="table table-dark">
    <thead>
      <tr>
        <th>商品編號</th>
        <th>商品名稱</th>
        <th>金額</th>
        <th>庫存</th>
      </tr>
    </thead>
    <tbody>
      <tr>
      <form method="post">
        <td><?=$row["resId"]?></td>
        <td><input type= "text" name="editname" value="<?=$row["resname"]?>"></td>
        <td><input type= "text" name="editprice" value="<?=$row["price"]?>"></td>
        <td><input type= "text" name="editstock" value="<?=$row["stock"]?>"></td>
        <td><input type= "submit" name="btnOK" value="確認送出" class="btn btn-outline-success"/></td>
        </form>
      </tr>
        
    </tbody>
  </table>
</div>
</body>
</html>