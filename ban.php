<?php
  session_start();

  $id= $_GET["id"];
  $ban = <<< plus
  update member set login=login+1 where memberId = $id;

  plus;
  $result=mysqli_query($link,$ban);






?>