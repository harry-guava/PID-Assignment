<?php
session_start();
require "connect.php";
//echo $_SESSION["memberId"];
//echo $_SESSION["serverId"];

$check = $_SESSION["check"];
if (isset($_SESSION["userName"])) {
    $user = $_SESSION["userName"];
} else {
    $user = "guest";
}
//echo $_SESSION["serverId"];
///商品清單
//echo $user;
//echo $_SESSION["memberId"];
$sql = "select * from res";
$result = mysqli_query($link, $sql);
$add = mysqli_query($link, $sql);
$car = mysqli_fetch_assoc($add);
//var_dump($result);
$resname = $car["resname"];
echo $_SESSION["memberId"];
if (isset($_GET["addcar"])) {
    if (($_SESSION["memberId"] != 0) | ($_SESSION["check"] != 0)) {
        $addbuy = $_GET["number"];
        //echo $addbuy;
        $_SESSION["addbuy"] = $addbuy;
        //echo $_GET['hidsub'];
        $hidesub = $_GET['hidsub'];
        //echo $hidesub;
        header("Location: add.php?id=$hidesub");
    } else {
        echo '<script>alert("請先登入帳號密碼！");location.replace("./login.php")</script>';
    }
}

if (isset($_POST["buycar"])) {
    if ($_SESSION["memberId"] != 0 | $_SESSION["check"] != 0) {
        header("Location: carlist.php");
    } else {
        header("location: login.php");
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>黑心購物網</title>
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
  <form method="post" class="header" >
  <h1><a href="index.php" >黑心購物網</a></h1>
  <a href = "login.php" class = "btn btn-outline-info btn-lg fl" name="btnlogin"><?php if ($user == "guest") {echo "登入";} else {echo "登出";}?></a>
  <a href = "membermanage.php" id=btnmember style="<?php if ($_SESSION["check"] == 0) {echo "display:none";}?>" name = btnmember class = "btn btn-outline-info btn-lg fm">會員管理</a>
  <a href = "editmem.php" id= "btneditmem" style="<?php if ($_SESSION["check"] == 1) {echo "display:none";}?>" name="editmem" class = "btn btn-outline-info btn-lg ff">修改個資</a>
  <a href = "buylist.php" class = "btn btn-outline-info btn-lg fl2" name="btnlist">訂單資料</a>
  <a href = "resmanage.php" id=btnmember style="<?php if ($_SESSION["check"] == 0) {?><?="display:none"?><?php }?>" name = btnmember class = "btn btn-outline-info btn-lg fn">商品管理</a>
  <input type="submit" id="buycar" name="buycar" value="購物車" class="car"/>
  </form>

<div class = "tb">
  <div class = "wrapper">
    <?php while ($row = mysqli_fetch_assoc($result)) {?>
    <div style="position:relative">
      <img class="object-fit object-fit_cover" style="width:40%;height:100%;" src="resimage/<?=$row["resname"]?>.jpg"/>
      <div style="position:absolute;top:10%;left:46%;font-size:25px"><?=$row["resname"]?></div>
      <div style="position:absolute;left:46%;top:25%;">價格:<?="$" . $row["price"] . "元"?></div>
      <div id="accordion">
        <div class="card text-black bg-success "style="width:50%;position:absolute;left:46%;top:35%" >
          <div class="card-header">
            <a class="collapsed card-link" data-toggle="collapse" href="#<?="demo" . $row["resId"]?>">產品介紹</a>
              <div id="<?="demo" . $row["resId"]?>" class="collapse" data-parent="#accordion">
                <div class="card-body" style="z-index: 999;"><?=$row["detail"]?></div>
              </div>
          </div>
        </div>
      </div>
      <form name="formadd">
      <div style="position:absolute;left:46%;top:58%;z-index:-1"><input <?php if ($row["stock"] == 0) {echo "disabled= disabled";}?>name="number" id="number" type="number" value=1 oninput="if(value<1)value=1" max ="<?=$row["stock"]?>"style ="width:50px"/>
      庫存:<?=$row["stock"]?>
      </div>
      <div style="position:absolute;left:46%;top:73%;z-index:-1">
        <input type="submit" name="addcar" <?php if ($row["stock"] > 0) {echo 'value="加入購物車" class="btn btn-outline-success btn-sm"';} else {echo 'disabled=disabled value="補貨中" class="btn btn-outline-danger btn-sm"';}?>/>
        <input type="hidden" name="hidsub" value="<?=$row["resId"]?>" />
      </div>
      </form>
    </div>
    <?php }?>
    </div>
</div>

<!-- <table class="table table-dark">
    <thead>
      <tr>
        <th>產品編號</th>
        <th>產品介紹</th>
        <th>圖片</th>
        <th>產品名稱</th>
        <th>價格</th>
        <th>數量</th>
        <th>庫存</th>
      </tr>
    </thead>
    <tbody>

    <?php while ($row = mysqli_fetch_assoc($result)) {?>
        <tr>
        <td style ="width100px;"><?=$row["resId"]?></td>
        <td>
        <div id="accordion">
        <div class="card text-white bg-dark mb-3">
        <div class="card-header">
        <a class="collapsed card-link" data-toggle="collapse" href="#<?="demo" . $row["resId"]?>">顯示內容</a>
        <div id="<?="demo" . $row["resId"]?>" class="collapse" data-parent="#accordion">
        <div class="card-body">
        <?=$row["detail"]?>
        </div>
        </div>
        </div>
        </td>
        <td style = "width:200px;"><img style="width:50%;height:50px"src="resimage/<?=$row["resname"]?>.jpg"/></td>
        <td style = "color:yellow"><?=$row["resname"]?></td>
        <td style = "color:red"><?="$" . $row["price"] . "元"?></td>
        <form id = "formadd" name="formadd" >

        <td><input  <?php if ($row["stock"] == 0) {echo "disabled= disabled";}?>name="number" id="number" type="number" value=1 oninput="if(value<1)value=1" max ="<?=$row["stock"]?>"style ="width:50px"/></td>
        <td><?=$row["stock"]?></td>
        <td>
            <span>
            <input type="submit" name="addcar" <?php if ($row["stock"] > 0) {echo 'value="加入購物車" class="btn btn-outline-success btn-sm"';} else {echo 'disabled=disabled value="補貨中" class="btn btn-outline-danger btn-sm"';}?>/>
            <input type="hidden" name="hidsub" value="<?=$row["resId"]?>" />
            </span>
        </form>
        </td>
      </tr>
    <?php }?>
    </tbody>
  </table> -->
</div>
</body>
</html>