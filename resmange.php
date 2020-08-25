<?php
   session_start();
   require("connect.php");
   
   $man = <<< mem


   mem;
   mysqli_query($link,$man);




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員管理</title>
</head>
<body>
<table class="table table-dark">
    <thead>
      <tr>
        <th>暱稱</th>
        <th>帳號</th>
        <th>密碼</th>
        <th>訂單號碼</th>
      </tr>
    </thead>
    <tbody>
     <?php while($row = mysqli_fetch_assoc($result)){?>
      <tr>
        <td><?= $row["username"]?></td>
        <td><?= $row["muse"]?></td>
        <td><?= $row["paswd"]?></td>
        <td><?= $row["listId"]?></td>
        <td>
            <span>
                <a href="./editForm.php?id=<?= $row["employeeId"]?>"class="btn btn-outline-success btn-sm">Edit</a>
                <a href="./deleteForm.php?id=<?= $row["employeeId"]?>"class="btn btn-outline-danger btn-sm">delete</a>
            </span>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</body>
</html>