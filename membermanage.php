<?php
   session_start();
   require("connect.php");
   
   $man ="Select * from member";
   $result = mysqli_query($link,$man);
   $testid =mysqli_query($link,$man);
  //  $rowid = mysqli_fetch_assoc($testid);
  //  //var_dump($result);
  //  $_SESSION["login"]= $rowid["login"];
  //  $login=$_SESSION["login"];
   //echo $login;
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
    <title>會員管理</title>
</head>
<body style="background-color: #c1eff7">
<div id = "all" class="header">
<h1><a href="index.php" >黑心購物網</a></h1>
</div>
<table class="table table-dark">
    <thead>
      <tr>
        <th>暱稱</th>
        <th>帳號</th>
        <th>密碼</th>
      </tr>
    </thead>
    <tbody>
     <?php while($row = mysqli_fetch_assoc($result)){?>
      <tr>
        <td><?= $row["username"]?></td>
        <td><?= $row["muse"]?></td>
        <td><?= $row["paswd"]?></td>
        <td>
            <span>
                <a href="./ban.php?id=<?= $row["memberId"]?>" class="btn btn-outline-success btn-sm">
               <?php if($row["login"]==0){ echo "封鎖";}else{echo"解鎖";}?></a>
                <a href="./buylist.php?id=<?= $row["memberId"]?>" class="btn btn-outline-danger btn-sm">訂單管理</a>
            </span>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</body>
</html>