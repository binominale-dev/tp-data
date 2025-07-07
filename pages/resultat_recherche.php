<?php
require("../inc/fonction.php");

    $agemin = $_SESSION['agemin'];
    $agemax = $_SESSION['agemax'];
    $departement = $_SESSION['departement'];
    $nom = $_SESSION['nom'];

$i = $_GET['page'];
$resultats = recherche($departement,$nom,$agemin,$agemax,$i);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultats</title>
    <link rel="stylesheet" href="../assets/css/bootstrap/css/bootstrap.min.css">
</head>

<body class="bg-light">

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

<div class="container my-5">
    <h2 class="text-center mb-4">Résultats de la recherche</h2>


        <?php foreach ($resultats as $first) { ?>
            <div class="card mb-3 shadow-sm">
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <strong>Nom :</strong> <?= htmlspecialchars($first['last_name']) ?>
                        </div>
                        <div class="col-md-6">
                            <strong>Prénom :</strong> <?= htmlspecialchars($first['first_name']) ?>
                        </div>
                        <div class="col-md-6">
                            <strong>Département :</strong> <?= htmlspecialchars($first['dept_name']) ?>
                        </div>
                        <div class="col-md-6">
                            <strong>Titre :</strong> <?= htmlspecialchars($first['title']) ?>
                        </div>
                    </div>

                    <div class="mt-3 text-end">
                        <a href="fiche.php?emp_no=<?= $first['emp_no'] ?>" class="btn btn-primary btn-sm">
                            Voir la fiche
                        </a>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>

<?php if ($i == 0) {?>
  <a href="traitement_recherche.php?page=<?= 1; ?>">Suivant</a>
<?php } else { ?>
  <a href="traitement_recherche.php?page=<?= $i-1; ?>">Precedent</a>
  <a href="traitement_recherche.php?page=<?= $i+1; ?>">Suivant</a>
<?php }?>
</body>

</html>