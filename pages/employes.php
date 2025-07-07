<?php 
require("../inc/fonction.php");
$employes = get_employes($_GET['dept_no']);
$departement = get_dept_name($_GET['dept_no']);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Employés</title>
     <link rel="stylesheet" href="../assets/css/bootstrap/css/bootstrap.min.css">

</head>
<body>
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
          Departement
          </a>
          <ul class="dropdown-menu">
            <?php foreach($departments as $dp) {?>
              <li><a class="dropdown-item" href="employes.php?dept_no=<?=$dp['dept_no']?>">
              <?=$dp['dept_name']?>
            </a></li>
            <?php } ?>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">See all</a></li>
          </ul>
        </li>
        
        <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li>
      </ul>
      
    </div>
  </div>
</nav>
<div class="container mt-5">
    <h2 class="mb-4 text-center">Liste des employés du département <?=$departement['dept_name']?></h2>
    <table class="table table-bordered table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>Prénom</th>
                <th>Nom</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($employes as $emp){?>
            <tr>
                <td><?= htmlspecialchars($emp['first_name']) ?></td>
                <td class="d-flex justify-content-between">
                  <?= htmlspecialchars($emp['last_name']) ?>
                 <a class="link-opacity-25-hover" href="fiche.php?emp_no=<?=$emp['emp_no']?>">Voir fiche</a>
              </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>
