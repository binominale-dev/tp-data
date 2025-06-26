<?php 
require("../inc/fonction.php");
$employes=get_employes($_GET['dept_no']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table border="1">
      <?php 
      foreach($employes as $emp)
      { ?>
        <tr>
            <td><?=$emp['first_name']?></td>
            <td><?=$emp['last_name']?></td>
        </tr>
      <?php } ?>
    </table>
</body>
</html>