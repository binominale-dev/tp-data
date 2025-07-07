<?php 
require("../inc/fonction.php");
$departements = get_departements();?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Liste des Employés</title>
  <link rel="stylesheet" href="../assets/css/bootstrap/css/bootstrap.min.css" />
</head>
<body>
  <script src="../assets/css/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Barre de navigation -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">EMPLOYES</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
    <form action="resultat_recherche.php" method="get">
      <h1 class="mb-4">Recherche des employés</h1>

 
      <div class="mb-3">
        <label for="departement" class="form-label">Département</label>
        <select class="form-select" name="departement" id="departement">
          <option value="d00">Tous</option>
          <?php foreach($departements as $dp){ ?>
          <option value="<?=$dp['dept_no']?>"><?=$dp['dept_name']?></option>
         <?php } ?>
        </select>
      </div>

     
      <div class="mb-3">
        <label for="nom" class="form-label">Nom de l'employé</label>
        <input type="search" class="form-control" name="nom" id="nom" placeholder="Entrez le nom de l'employé" />
      </div>


      <div class="mb-3">
        <label class="form-label">Âge</label>
        <div class="d-flex gap-2">
          <input type="number" class="form-control" name="agemin" placeholder="Âge min" />
          <input type="number" class="form-control" name="agemax" placeholder="Âge max" />
        </div>
      </div>


      <div class="mb-3">
        <input type="submit" class="btn btn-primary" value="Valider" />
      </div>


    </form>
  </div>
</body>
</html>
