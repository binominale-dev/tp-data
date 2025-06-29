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
   $req="SELECT employees.first_name,employees.last_name,employees.emp_no from departments 
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
function get_fiche($emp_no){
      $req="SELECT 
    e.first_name,
    e.last_name,
    e.birth_date,
    e.hire_date,
    e.gender,
    t.title,
    MIN(t.from_date) AS from_date,
    MAX(t.to_date) AS to_date,
    MAX(s.salary) AS salaire_max
FROM employees e
JOIN titles t ON e.emp_no = t.emp_no
JOIN salaries s ON s.emp_no = e.emp_no
AND s.from_date BETWEEN t.from_date AND t.to_date
WHERE e.emp_no = %d
GROUP BY t.title, e.emp_no, e.first_name, e.last_name";
   $req=sprintf($req,$emp_no);
   $env=mysqli_query(db_connect(),$req);
  $arr=[];
   while($res=mysqli_fetch_assoc($env)){
      $arr[]=$res;
   }
   return $arr;
}

?>