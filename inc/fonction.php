<?php
require("connection.php");

function get_departements(){
     $req="SELECT * from departments";
     $env=mysqli_query(db_connect(),$req);
     $arr=[];
     while($res=mysqli_fetch_assoc($env)){
        $arr[]=$res;
     }
     return $arr;
}
function get_managers($dept_no){
   $req="SELECT * from v_fiche_departement where dept_no = '%s'";
   $req=sprintf($req,$dept_no);
   $env=mysqli_query(db_connect(),$req);
   $arr=[];
   while($res=mysqli_fetch_assoc($env)){
      $arr[]=$res;
   }
   return $arr;
}
function get_employes($dept_no){
   $req="SELECT * FROM v_employees_pardepartement where dept_no = '%s'";
   $req=sprintf($req,$dept_no);
   $env=mysqli_query(db_connect(),$req);
   $arr=[];
   while($res=mysqli_fetch_assoc($env)){
      $arr[]=$res;
   }
   return $arr;
}
function get_dept_name($dept_no){
     $req="SELECT dept_name from departments where dept_no = '%s' ";
     $req=sprintf($req,$dept_no);
     $env=mysqli_query(db_connect(),$req);
     $res=mysqli_fetch_assoc($env);
     $arr=$res;
     return $arr;
}
function get_fiche($emp_no){
      $req="SELECT * from v_fiche_employe WHERE emp_no = %d";
   $req=sprintf($req,$emp_no);
   $env=mysqli_query(db_connect(),$req);
  $arr=[];
   while($res=mysqli_fetch_assoc($env)){
      $arr[]=$res;
   }
   return $arr;
}
function recherche($departement,$nom_employe,$age_min,$age_max,$i){
   $lim = 5;
   $req="SELECT * from v_employe WHERE 1=1
   AND (dept_no like '%s'
   OR dept_no like '%s')
   AND (first_name like '%s'
   OR last_name like '%s'
   OR first_name like '%s'
   OR last_name like '%s'
   OR CONCAT(first_name, ' ', last_name) LIKE '%s')
   AND TIMESTAMPDIFF(YEAR,birth_date,NOW()) between %d and %d limit %d, %d";
   $req=sprintf($req,$departement,"$departement%","$nom_employe%","$nom_employe%",$nom_employe,$nom_employe,$nom_employe,$age_min,$age_max,($i*$lim),$lim);
   $env=mysqli_query(db_connect(),$req);
   $arr=[];
   while($res=mysqli_fetch_assoc($env)){
   $arr[]=$res;
   }
   return $arr;
}
function count_employee_gender($gender) {
   $req = "select count(gender) from employees where gender='%s'";
   $req = sprintf($req, $gender);
   $env = mysqli_query(db_connect(), $req);
   $res=mysqli_fetch_assoc($env);
     $nb=$res;
     return $nb;
}
function count_employee_gender_title($gender) {
   $req = "select title, count(gender) from v_fiche_employe where gender='%s' group by title;";
   $req = sprintf($req, $gender);
   $env = mysqli_query(db_connect(), $req);
   $res=mysqli_fetch_assoc($env);
     $nb=$res['count(gender)'];
     return $nb;
}

?>