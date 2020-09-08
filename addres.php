<?php
session_start();
require "connect.php";
// if(isset($_POST["submitpic"]))
// {

// }
if (isset($_POST["addres"])) {
    $adname = $_POST["txtname"];
    $adprice = $_POST["txtprice"];
    $adstock = $_POST["txtstock"];
    if (trim($adname && $adprice && $adstock) != "") {

        $sqlc = "select resname from res";
        $check = mysqli_query($link, $sqlc);
        $recheck = mysqli_fetch_assoc($check);
        if ($adname != $recheck["resname"]) {

            if (file_exists("resimage/" . $_FILES["file"]["name"])) {
                echo '<script>alert("檔案已經重複 請勿上傳同樣的檔案");</script>';
            } else {
                $sql = "insert into res (resname,price,stock,temp) values
           ('$adname',$adprice,$adstock,$adstock)";
                mysqli_query($link, $sql);
                $filename = $adname;

                rename(($_FILES["file"]["name"]), $filename);
                move_uploaded_file($_FILES["file"]["tmp_name"], "resimage/" . $filename . ".jpg");
                echo '<script>alert("新增商品成功！");location.replace("resmanage.php");</script>';
            }

        } else {
            echo '<script>alert("此產品已存在,請重新輸入")</script>';
        }

    } else {
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
    <link rel=stylesheet type="text/css" href="main.css">
    <title>新增商品</title>
    <script>

    if ( window.history.replaceState )
    {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
</head>
<body style="background-color: #c1eff7">
<div class="tb">
<table class="table table-dark">
    <thead>
      <tr>
        <th>上傳</th>
        <th>圖片</th>
        <th>商品名稱</th>
        <th>金額</th>
        <th>上架數</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <!--enctype="multipart/form-data提交表單不對字元編碼 使表單可把文件中的內容編到html請求中"-->
        <form  method = "post" enctype="multipart/form-data">
        <!--this 指向自己 id = "file"-->
        <td><input style="width:80px" type="file" name = "file" id= "file" onchange="showImg(this)"/></td>
        <!--照片預覽功能 設定onchange 當檔案改變後執行showImg-->
        <td><img id = "showimg" src="" style="display:none;width:50%;"/></td>
        <td><input type = "text" name="txtname"/></td>
        <td><input type = "number" oninput="if(value<1)value=1"  name="txtprice"/></td>
        <td><input type = "number" oninput="if(value<1)value=1" name="txtstock"/></td>
        <td><input type = "submit" name="addres" id="addres" value="新增"/></td>
        </form>
      </tr>
    </tbody>
  </table>
</div>
<script>
        //因為input type 被DOM變成object時 有選擇到檔案會將檔案放在test.files陣列中
        function showImg(test) {
      	var file = test.files[0];
	      if(window.FileReader) {
        //html 必須提交完表單才會讀取檔案
        //利用javascript 提供的FileReader
	    	var fr = new FileReader();
		  	var showimg = document.getElementById('showimg');
        //每次選擇完都會執行此事件
		    fr.onloadend = function(e) {
        //src為readAsDataURL讀取完的URL
		    showimg.src = e.target.result;
	      };
      	fr.readAsDataURL(file);//result屬性多一個data為讀取完成後表示文件數據的URL
	      showimg.style.display = 'block';}
        }
       </script>
</body>
</html>
