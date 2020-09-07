<?php
session_start();
require("connect.php");
$memberId = $_SESSION["memberId"];
$sql = "select * from member where memberId = $memberId";
  $result= mysqli_query($link,$sql);
  $row = mysqli_fetch_assoc($result);
  //echo $memberId;
  echo $row;
if(isset($_POST["editsub"]))
{
    $adus = $_POST["addacc"];
    $adpswd = $_POST["addpswd"];
    $adname = $_POST["addname"];
    $ademail = $_POST["addemail"];
    $adphone = $_POST["addphone"];
    
    if(trim(($adname&&$adus&&$adpswd&&$ademail&&$adphone)!=""))
    {
        $sql2 = <<<upt
        update `member` set `username` ='$adname',`muse`='$adus',`paswd`='$adpswd',`email`='$ademail',`phone`='$adphone'
        where memberId ='$id';
        upt;
        mysqli_query($link,$sql2);
        //echo "$adname<br>$adus<br>$adpswd<br>";
        echo "<script type='text/javascript'>alert('資料修改完成！！');</script>";
        
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
    <title>修改個資</title>
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
      <input id="addname" name="addname" type="text" class="form-control" value="<?= $row["username"]?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="text2" class="col-2 col-form-label" style="color:yellow;background-color:#48D1CC">帳號</label> 
    <div class="col-4">
      <input id="addacc" name="addacc" type="text" class="form-control" value="<?= $row["muse"]?>">
    </div>
  </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="text3" class="col-2 col-form-label" style="color:red;background-color:#98FB98">密碼</label> 
    <div class="col-4 ">
      <input id="addpswd" name="addpswd" type="text" class="form-control" value= "<?= $row["paswd"]?>"> 
    </div>
  </div> 
  <div class="form-group row">
    <label for="text4" class="col-2 col-form-label" style="color:green;background-color:pink">信箱</label> 
    <div class="col-4 ">
      <input id="addemail" name="addemail" pattern="\w*([.-]\w)*@\w+([.-]\w+)+" type="text" class="form-control" value="<?= $row["email"]?>">
    </div>
  </div> 
  <div class="form-group row">
    <label for="text5" class="col-2 col-form-label" style="color:green;background-color:pink">手機</label> 
    <div class="col-4 ">
      <input id="addphone" name="addphone" pattern="[0][9]\d{8}" maxlength="10" type="text" class="form-control" value="<?= $row["phone"]?>">
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-2 col-10">
      <button name="editsub" id= "editsub" type="submit" class="btn btn-success">確認送出</button>
      <button name="cancel" type="submit" class="btn btn-outline-dark">取消離開</button>
    </div>
  </div>
</form>

</body>
</html>