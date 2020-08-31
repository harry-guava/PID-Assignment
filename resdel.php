<?php
   $id = $_GET["id"];
   require("connect.php");


   $sql = "delete from res where resId = $id";
   mysqli_query($link,$sql);

   header("Location: resmanage.php");

?>