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
  <title>Départements & Managers</title>
  <link rel="stylesheet" href="../assets/css/bootstrap/css/bootstrap.min.css">
</head>
<body class="bg-light">
  
  
  
<script src="../assets/css/bootstrap/js/bootstrap.bundle.min.js"></script>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">EMPLOYES</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="recherche.php">Search</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>




  <div class="container mt-5">
    <h2 class="text-center mb-4">Liste des Départements et Managers</h2>
    <div class="table-responsive">
      <table class="table table-bordered table-striped align-middle">
        <tr>
          <th>Departement</th>
          <th></th>
          <th>Current Manager</th>
        </tr>
        <?php 
        foreach($departments as $dp){ 
          $managers=get_managers($dp['dept_no']);
          foreach($managers as $mg){
        ?>
        <tr class="table-primary">
          <td colspan="2">
            <a href="employes.php?dept_no=<?=$dp['dept_no']?>" class="fw-bold text-decoration-none text-dark">
              <?=$dp['dept_name']?>
            </a>
          </td>
            <td class="ps-4"><?=$mg['first_name']?> <?=$mg['last_name']?></td>
          </tr>
        <?php } ?>
        <?php } ?>
      </table>
    </div>
  </div>

</body>
</html>
