CREATE OR REPLACE VIEW v_fiche_departement 
AS SELECT employees.first_name,employees.last_name,departments.dept_no from departments 
   join dept_manager on departments.dept_no = dept_manager.dept_no join employees on dept_manager.emp_no = employees.emp_no;

CREATE OR REPLACE VIEW v_employees_pardepartement 
AS SELECT employees.first_name,employees.last_name,employees.emp_no,departments.dept_no from departments 
   join dept_emp on departments.dept_no = dept_emp.dept_no join employees on dept_emp.emp_no = employees.emp_no;

CREATE OR REPLACE VIEW v_fiche_employe 
AS SELECT 
    e.emp_no,
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
 GROUP BY t.title, e.emp_no, e.first_name,e.last_name;



