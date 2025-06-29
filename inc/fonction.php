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

?>