<?php
  session_start();
  require("connect.php");
  //echo $_SESSION["login"];
  $id= $_GET["id"];
  //echo $id;
  if($_SESSION["login"]==0)
  {
     $ban = <<< plus
     update member set login=1 where memberId = $id;
     plus;
  }
  else
  {
     $ban=<<<lift
     update member set login=0 where memberId = $id;
     lift;
  }
   $result= mysqli_query($link,$ban);

   $sql= <<<sel
    select login from member where memberId = $id;
   sel;
   
   $res = mysqli_query($link,$sql);
  //var_dump($res);
   $rowid= mysqli_fetch_assoc($res);
  //echo $rowid["login"]; 
  $_SESSION["login"]=$rowid["login"];
  echo $_SESSION["login"];
  //echo $rowid["login"];
  header("Location: membermanage.php");
  
  
?>