CREATE OR REPLACE VIEW v_fiche_departement 
AS SELECT max(dept_manager.to_date),employees.first_name,employees.last_name,departments.dept_no from departments 
   join dept_manager on departments.dept_no = dept_manager.dept_no join employees on dept_manager.emp_no = employees.emp_no group by departments.dept_no;

CREATE OR REPLACE VIEW v_employees_pardepartement 
AS SELECT employees.first_name,employees.last_name,employees.emp_no,departments.dept_no from departments 
   join dept_emp on departments.dept_no = dept_emp.dept_no join employees on dept_emp.emp_no = employees.emp_no
   ORDER BY employees.first_name ASC;

CREATE OR REPLACE VIEW v_fiche_employe 
AS SELECT 
    e.emp_no,
    e.first_name,
    e.last_name,
    e.birth_date,
    e.hire_date,
    e.gender,
    t.title,
    departments.dept_name,
    departments.dept_no,
    MIN(t.from_date) AS from_date,
    MAX(t.to_date) AS to_date,
    MAX(s.salary) AS salaire_max

FROM departments
JOIN dept_emp ON departments.dept_no = dept_emp.dept_no
JOIN employees e ON dept_emp.emp_no = e.emp_no
JOIN titles t ON e.emp_no = t.emp_no
JOIN salaries s ON s.emp_no = e.emp_no
AND s.from_date BETWEEN t.from_date AND t.to_date
 GROUP BY t.title, e.emp_no, e.first_name,e.last_name;

CREATE OR REPLACE VIEW v_employe 
AS SELECT employees.first_name,employees.last_name,employees.emp_no,departments.dept_no,employees.birth_date ,departments.dept_name,titles.title from departments 
join dept_emp on departments.dept_no = dept_emp.dept_no join employees on dept_emp.emp_no = employees.emp_no 
join titles on titles.emp_no = employees.emp_no
order by employees.first_name ASC;


SELECT * from v_employe WHERE 1=1
         AND (dept_no like 'd%'
         OR dept_no like 'd%')
         AND (first_name like 'Alex%'
         OR last_name like 'Alex%'
         OR first_name like 'Alex%'
         OR last_name like 'Alex%'
         OR CONCAT(first_name, ' ', last_name) LIKE 'Alex%')
         AND TIMESTAMPDIFF(YEAR,birth_date,NOW()) between 30 and 70 limit 20, 20;