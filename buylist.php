<?php
session_start();
require "connect.php";
//判斷前一頁的網址
$pre_url = $_SERVER['HTTP_REFERER'];

//判斷是從首頁進入還是從會員管理的訂單管理
if ($pre_url != "http://localhost:8888/PID-Assignment/membermanage.php") {
    if ($_SESSION["check"] != 0) {
        //echo $_SESSION["serverId"];
        $serverId = $_SESSION["serverId"];
        $sqll = "select listnumber from orderlist where serverId = $serverId";
    } else {
        $memberId = $_SESSION["memberId"];
        $sqll = "select listnumber from orderlist where memberId = $memberId";
    }
} else {
    $memberId = $_GET["id"];
    $sqll = "select listnumber from orderlist where memberId = $memberId";
}
$sqlls = mysqli_query($link, $sqll);


//獲取點擊訂單號碼時的
if (isset($_GET["listshow"])) {
    $listshow = $_GET["listshow"];
    //echo $listshow;
    $_SESSION["listshow"] = $listshow;
    header("Location: listnum.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>訂單資料</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel=stylesheet type="text/css" href="main.css">
</head>

<body style="background-color: #c1eff7">

  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>
  <div id="all">
    <form method="post" class="header">
      <h1>
      <a href="index.php" >黑心購物網</a>
      </h1>
      <a href="login.php" class="btn btn-outline-info btn-lg fl" name="btnlogin"><?php if ($user == "guest") {?><?="登入"?><?php } else {?><?="登出"?><?php }?></a>
      <a href="membermanage.php" id=btnmember style="<?php if ($_SESSION["check"] == 0) {?><?="display:none"?><?php }?>" name=btnmember class="btn btn-outline-info btn-lg fm">會員管理</a>
    </form>
    <div>
      <div class="tb">
        <table class="table table-dark">
          <tbody>

              <?php while ($rows = mysqli_fetch_assoc($sqlls)) {?>
              <tr>
              <td>
              <form>
                <input type="submit" name="listshow" value="<?=$rows["listnumber"]?>" class="btn btn-outline-success btn-sm"/>
              </form>
              </td>
              </tr>
              <?php }?>
          </tbody>
        </table>
      </div>
</body>

</html>