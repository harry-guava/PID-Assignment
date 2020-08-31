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
          $sqlc = "select resname from res";
          $check = mysqli_query($link,$sqlc);
          $recheck  = mysqli_fetch_assoc($check);
          if($adname!=$recheck["resname"])
          {
          $sql = "insert into res (resname,price,stock,temp) values
          ('$adname',$adprice,$adstock,$adstock)";
          mysqli_query($link,$sql);

          echo '<script>alert("新增商品成功！")</script>';
          }
          else
          {
            echo '<script>alert("此產品已存在,請重新輸入")</script>';
          }

      }
      else
      {
        echo '<script>alert("欄位請勿空白,請重新輸入")</script>';
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
    <script>
   
    if ( window.history.replaceState )
    {
        window.history.replaceState( null, null, window.location.href );
    }
 
  
</script>
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
        <td><label class ="btn btn-info">
        <input id = "upload_img" style ="display:none" type = "file"/>
        <i class= "fa fa-photo"></i>上傳圖片
        </label>
       </td>
        <td><input type="text" name="txtname"/></td>
        <td><input type="number" oninput="if(value<1)value=1"  name="txtprice"/></td>
        <td><input type="number" oninput="if(value<1)value=1" name="txtstock"/></td>
        <td><input type="submit" name="addres" id="addres" value="新增"/></td>
        </form>
      </tr>
    </tbody>
  </table>
</div>
</body>
</html>