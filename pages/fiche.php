<?php 
require("../inc/fonction.php");
$fiches = get_fiche($_GET['emp_no']);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiche Employé</title>
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

    <div class="card shadow p-4 mb-4">
        <h3 class="text-center mb-3">Fiche de l'employé</h3>
        <?php $first = $fiches[0]; ?>
        <div class="row mb-2">
            <div class="col-md-6"><strong>Nom :</strong> <?= htmlspecialchars($first['last_name']) ?></div>
            <div class="col-md-6"><strong>Prénom :</strong> <?= htmlspecialchars($first['first_name']) ?></div>
        </div>
        <div class="row mb-2">
            <div class="col-md-6"><strong>Date de naissance :</strong> <?= htmlspecialchars($first['birth_date']) ?></div>
            <div class="col-md-6"><strong>Genre :</strong> <?= htmlspecialchars($first['gender']) ?></div>
        </div>
        <div class="row mb-2">
            <div class="col-md-6"><strong>Date d'embauche :</strong> <?= htmlspecialchars($first['hire_date']) ?></div>
            <div class="col-md-6"><strong>Departement :</strong> <?= htmlspecialchars($first['dept_name']) ?></div>
        </div>  
        <div class="row mb-2">
            <div class="col-md-6"><strong>Poste actuel :</strong> <?= htmlspecialchars($first['title']) ?></div>
            <div class="col-md-6"><strong>Salaire :</strong> <?= htmlspecialchars($first['salaire_max']) ?> €</div>
        </div>
    </div>

    <div class="card shadow p-4">
        <h4 class="mb-3">Postes occupés et salaires</h4>
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Poste</th>
                        <th>Du</th>
                        <th>Au</th>
                        <th>Salaire Max (€)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($fiches as $key=>$f) { 
                       if($key == 0)continue;?>
                        <tr>
                            <td><?= htmlspecialchars($f['title']) ?></td>
                            <td><?= htmlspecialchars($f['from_date']) ?></td>
                            <td><?= htmlspecialchars($f['to_date']) ?></td>
                            <td><?= htmlspecialchars($f['salaire_max']) ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

</body>
</html>
