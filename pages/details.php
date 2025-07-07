<?php 
require("../inc/fonction.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEATAILS</title><link rel="stylesheet" href="../assets/css/bootstrap/css/bootstrap.min.css">
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

  <div class="container mt-5">
    <h2 class="text-center mb-4">Le nombre total d'employees hommes et femmes</h2>
    <div class="table-responsive">
      <table class="table table-bordered table-striped align-middle">
        <tr>
          <th>Genre</th>
          <th>Nb employees</th>
        </tr>
        <tr>
            <td>Men</td>
            <td><?= count_employee_gender("M")["count(gender)"]; ?></td>
        </tr>
        <tr>
            <td>Women</td>
            <td><?= count_employee_gender("F")["count(gender)"]; ?></td>
        </tr>
      </table>
    </div>

    <h2 class="text-center mb-4">Le salaire moyen</h2>
    <div class="table-responsive">
      <table class="table table-bordered table-striped align-middle">
        <tr>
          <th>Emploi</th>
          <th>Men</th>
          <th>Women</th>
          <th>Salaire moyen</th>
        </tr>
        <tr>
            <td>Manager</td>
            <td>800</td>
            <td>800</td>
            <td>800</td>
        </tr>
        <tr>
            <td>Assistant</td>
            <td>700</td>
            <td>700</td>
            <td>700</td>
        </tr>
      </table>
    </div>
  </div>
    
</body>
</html>

<!-- <?php 
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
              <td><?= count($employes = get_employes($dp['dept_no']));?></td>
            </tr>
          <?php } ?>
          <?php } ?> -->