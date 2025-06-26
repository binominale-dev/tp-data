<?php
require("../inc/fonction.php");
$departments=get_departements();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/bootstrap/bootstrap.min.css">
</head>
<body>
  <table border="1">
      <?php 
      foreach($departments as $dp)
      { 
        $managers=get_managers($dp['dept_no']);
        ?>
      <tr>
         <td><a href="salaries.php?dept_no=<?=$dp['dept_no']?>"><?=$dp['dept_name']?></a></td>
      </tr>
      <?php foreach($managers as $mg){ ?>
        <tr>
            <td><?=$mg['first_name']?></td>
            <td><?=$mg['last_name']?></td>
        </tr>
         <?php } ?>
      <?php } ?>
    </table>
</body>
</html>