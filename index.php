<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style type="text/css">
    .all
    {
      width:600px;
      margin:0 auto;
    }
    .header
    {
      height:50px;
      line-height:80px;
      background-color: #c1eff7;   
    }
    .form1
    { 
      margin-top:50px;
      height:200px;
      line-height:105px;
      background-color:#faffd1;
    }
    .form2
    {
      margin-top:0px;
    }
    .form3
    {
      height:200px;
      margin-top:0px auto;
      line-height:100px;
      background-color: #a9fcab;
    }
    .fl
    {
      position:absolute;
      right:0px;
      top:0px;
    }
    .fm
    {
      position:absolute;
      right:75px;
      top:0px;
    }
  </style>
</head>
<body>
<div id = "all">
<div class="header">
  <h1>黑心購物網</h1>
    <form method="post">
      <a href = "login.php" class = "btn btn-outline-info btn-lg fl">登入</a>
      <?php if(isset($_SESSION["check"])){?>
      <a href = "membermange.php" class = "btn btn-outline-info btn-lg fm">會員管理</a>
      <?php }?>
    </form>
<div>
<div>
<nav class="navbar navbar-expand-md navbar-dark bg-dark ">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
</body>
</html>