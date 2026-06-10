create table employees(
    id int primary key auto_increment,
    name varchar(100),
    designation varchar(50),
    department varchar(50),
    basic_salary decimal(10,2),
    sales_amount decimal(10,2),
    commission_rate decimal(5,2),
    promotion_date date,
    joining_date date
);
INSERT INTO employees
(name, designation, department, basic_salary, sales_amount, commission_rate, promotion_date, joining_date)
VALUES
('Shuchy', 'Developer', 'IT', 50000, 100000, 5.00, '2026-01-01', '2025-06-01'),
('Nafisa', 'Developer', 'IT', 80000, 100000, 5.00, '2026-01-01', '2025-06-01'),
('Ruhi', 'Developer', 'IT', 60000, 100000, 5.00, '2026-01-01', '2025-06-01');                                                             