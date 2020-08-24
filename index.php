<?php
if (isset($_POST["btnlogin"])) 
{
    $userName = $_POST["txtuserName"];
    $passWord = $_POST["txtpassWord"];
    if (trim(($userName && $passWord) != "")) 
    {
        $_SESSION["userName"] = $userName;
        $_SESSION["passWord"] = $passWord;
        require("connect.php");
        $sql = <<< compare
          select * from member where user = '$userName' and paswd = '$passWord'; 
        compare;
        mysqli_query($link,$sql);
        $result = mysqli_query($link,$sql);
        //var_dump($result);
        $rownum =mysqli_num_rows($result);
        //echo $rownum;
        if($rownum!=0)
        {
          header("location: page.php");
          exit();
        }
        else
        {
          echo '<script language="javascript">';
          echo 'alert("請輸入正確的帳號或密碼")';
          echo '</script>';
          unset($_POST["btnlogin"]);
        }
    }
    else
    {
      echo '<script language="javascript">';
          echo 'alert("欄位請勿空白")';
          echo '</script>';
    }
}
if(isset($_POST["btnreg"]))
{
  header("location: register.php");
}

?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      .site
      {
        margin-top: -150px;
        margin-left:-150px;
        position: absolute;
        left:50%;
        top:50%;
      }
    </style>
</head>
<body>
  <!--避免F5又再送一次表單-->
<script>
    if ( window.history.replaceState ) 
    {
        window.history.replaceState( null, null, window.location.href );
    }

</script>
  
<form id="form1" name="form1" method="post" action="index.php" >
  <table class="site" width="350" border="0"  cellpadding="10" cellspacing="1" bgcolor="#F2F2F2">
    <tr>
      <tr>
        <td colspan="2" align="center" bgcolor="#a9ebd9">
          <font color="#6579fc">很黑購物網～歡迎您</font>
        </td>
      </tr>
      <tr>
        <td width="80" align="center" valign="baseline">帳號</td>
        <td valign="baseline">
        <input type="text" name="txtuserName" id="txtuserName" /></td>
      </tr>
        <tr>
          <td width="80" align="center" valign="baseline">密碼</td>
          <td valign="baseline">
          <input type="password" name="txtpassWord" id="txtpassWord" /></td>
        </tr>
        <td colspan="2" align="center" bgcolor="#ffa8c4">
          <input style="color:#d327f5;background-color:#ffed85" type="submit" name="btnlogin" id="btnlogin" value="登入"/>
          <input style="color:#034aff;background-color:#ffed85" type="submit" name="btnreg" id="btnreg" value="註冊會員"/>
        </td>
     <tr>
  </table>
</form>

</body>
</html>
