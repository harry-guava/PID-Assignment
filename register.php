<?php
session_start();
if(isset($_POST["addsub"]))
{
    $adus = $_POST["addacc"];
    $adpswd = $_POST["addpswd"];
    $adname = $_POST["addname"];
    $ademail = $_POST["addemail"];
    $adiden = $_POST["addiden"];
    $adphone = $_POST["addphone"];
    if(trim(($adname&&$adus&&$adpswd)!=""))
    {
        $_SESSION["adname"]= $adname;
        $_SESSION["addacc"]= $adus;
        $_SESSION["addpswd"]= $adpswd;
        $_SESSION["ademail"] = $ademail;
        $_SESSION["addien"] = $adiden;
        require("connect.php");
        $sql = <<<add
         insert into member (`muse`,paswd,`username`,`email`,`iden`) values
         ('$adus','$adpswd','$adname','$ademail','$adiden');
        add;
        mysqli_query($link,$sql);
         
        //echo "$adname<br>$adus<br>$adpswd<br>";
        echo "<script type='text/javascript'>alert('建立成功,開始享受你的購物之旅吧！');</script>";
        
        header("refresh:0; url= index.php");
    }
    else
    {
        echo '<script>language:"javascript"';
        echo 'alert("欄位請勿空白")';
        echo "</script>";

    }
}
if(isset($_POST["cancel"]))
{
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>註冊</title>
    <style>
        
    </style>
</head>
<body style="background-color: #c1eff7">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<form method = "post">
  <div class="form-group row">
    <label for="text1" class="col-2 col-form-label" style="background-color:#FFE4C4">暱稱</label> 
    <div class="col-3">
      <input id="addname" name="addname" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="text2" class="col-2 col-form-label" style="color:yellow;background-color:#48D1CC">帳號</label> 
    <div class="col-4">
      <input id="addacc" name="addacc" type="text" class="form-control">
    </div>
  </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="text3" class="col-2 col-form-label" style="color:red;background-color:#98FB98">密碼</label> 
    <div class="col-4 ">
      <input id="addpswd" name="addpswd" type="text" class="form-control">
    </div>
  </div> 
  <div class="form-group row">
    <label for="text4" class="col-2 col-form-label" style="color:green;background-color:pink">信箱</label> 
    <div class="col-4 ">
      <input id="addemail" name="addemail" pattern="\w*([.-]\w)*@\w+([.-]\w+)+" type="text" class="form-control">
    </div>
  </div> 
  <div class="form-group row">
    <label for="text5" class="col-2 col-form-label" style="color:green;background-color:pink">手機</label> 
    <div class="col-4 ">
      <input id="addphone" name="addphone" pattern="[0][9]\d{8}" maxlength="10" type="text" class="form-control">
    </div>
  </div> 
  <div class="form-group row">
    <label for="text6" class="col-2 col-form-label" style="color:purple;background-color:yellow">身分證字號</label> 
    <div class="col-4 ">
      <input id="addiden" name="addiden" type="text" pattern="[A-Z][12]\d{8}" maxlength="10" class="form-control">
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-2 col-10">
      <button name="addsub" id= "addsub" type="submit" class="btn btn-success">確認送出</button>
      <button name="cancel" type="submit" class="btn btn-outline-dark">取消離開</button>
    </div>
  </div>
</form>

</body>
</html>