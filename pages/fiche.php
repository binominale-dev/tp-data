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
                    <?php foreach ($fiches as $f) { ?>
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
