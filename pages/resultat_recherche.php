<?php
require("../inc/fonction.php");
if (empty($_GET['agemin'])) $agemin = 0;
if (empty($_GET['agemax'])) $agemax = 110;
else if (!empty($_GET['agemin']) || !empty($_GET['agemax'])) {
    $agemin = $_GET['agemin'];
    $agemax = $_GET['agemax'];
}
$resultats = recherche($_GET['departement'], $_GET['nom'], $agemin, $agemax);
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

</body>

</html>