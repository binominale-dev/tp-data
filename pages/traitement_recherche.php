<?php 
   require("../inc/fonction.php");
   if(empty($_GET['agemin'])) {
        $agemin = 0;
        $_SESSION['agemin'] = $agemin;
   }
   if(empty($_GET['agemax'])) {
       $agemax = 110;
       $_SESSION['agemax'] = $agemax;
   }
   else if(!empty($_GET['agemin']) || !empty($_GET['agemax'])){
       $agemin = $_GET['agemin'];
   $_SESSION['agemin'] = $agemin;
       $agemax = $_GET['agemax'];
   $_SESSION['agemax'] = $agemax;
   }

    $_SESSION['departement'] = $_GET['departement'];
    $_SESSION['nom'] = $_GET['nom'];
   
   $i = $_GET['page'];

   header("Location:resultat_recherche.php?page=$i");
?>