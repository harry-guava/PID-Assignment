<?php
  session_start();
  require("connect.php");

  if(isset($_POST["addres"]))
  {
    $adname = $_POST["txtname"];
    $adprice = $_POST["txtprice"];
    $adstock = $_POST["txtstock"];
      if(trim($adname&&$adprice&&$adstock)!="")
      {
          
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
    <title>新增商品</title>
</head>
<body>
<div class="tb">
<table class="table table-dark">
    <thead>
      <tr>
        <th>圖片</th>
        <th>商品名稱</th>
        <th>金額</th>
        <th>上架數</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <form method = "post">
        <td></td>
        <td><input type="text" name="txtname"/></td>
        <td><input type="text" name="txtprice"/></td>
        <td><input type="text" name="txtstock"/></td>
        <td><input type="submit" name="addres" id="addres" value="新增"/></td>
        </form>
      </tr>
    </tbody>
  </table>
</div>
</body>
</html>