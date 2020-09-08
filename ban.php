<?php
  session_start();
  require("connect.php");
  //echo $_SESSION["login"];
  $id= $_GET["id"];
  //echo $id;
  $sql= "select login from member where memberId = $id";
  $result= mysqli_query($link,$sql);
  $row = mysqli_fetch_assoc($result);
  if($row["login"]==0)
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
   mysqli_query($link,$ban);

   $sql2= <<<sel
    select login from member where memberId = $id;
   sel;
   
  $twresult = mysqli_query($link,$sql2);
  //var_dump($res);
  $rowid= mysqli_fetch_assoc($twresult);
  //echo $rowid["login"]; 
  $_SESSION["login"]=$rowid["login"];
  //echo $_SESSION["login"];
  //echo $rowid["login"];
  header("Location: membermanage.php");
  
  
?>