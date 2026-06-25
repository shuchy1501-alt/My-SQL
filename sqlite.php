<?php
$db=new PDO("sqlite:db.db");
$db->exec("
create table departments(
id integer primary key autoincrement,
name text,
location text,
phone text
);
");
$db->exec("
insert into departments(name, location, phone)
values
('admin', 'dhaka', '2545456'),
('hr','dhaka' ,'254556'),
('sales', 'dhaka' ,'254586'),
('marketing', 'dhaka','254852');
");
$stmt= $db->query("select * from departments")->fetchAll();
print_r($stmt);
$db->exec("update departments set name='Accounting' where id=1");
print_r($stmt);



?>