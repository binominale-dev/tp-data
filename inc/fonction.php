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
   $req="SELECT employees.first_name,employees.last_name from departments 
   join dept_manager on departments.dept_no = dept_manager.dept_no join employees on dept_manager.emp_no = employees.emp_no
   where departments.dept_no = '%s'";
   $req=sprintf($req,$dept_no);
   $env=mysqli_query(db_connect(),$req);
   $arr=[];
   while($res=mysqli_fetch_assoc($env)){
      $arr[]=$res;
   }
   return $arr;
}
function get_employes($dept_no){
   $req="SELECT employees.first_name,employees.last_name from departments 
   join dept_emp on departments.dept_no = dept_emp.dept_no join employees on dept_emp.emp_no = employees.emp_no
   where departments.dept_no = '%s'";
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
?>