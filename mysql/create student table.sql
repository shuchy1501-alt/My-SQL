create table schools(
    id int primary key auto_increment,
    name varchar(255),
    email varchar(150),
   phone varchar(30),
   address text
);
insert into schools(name,email,phone,address) values("jashore polytechnic institute","abc@gmail.com","000-111-222","jashore"),("Dhaka polytechnic institute","abc@gmail.com","000-111-222","Dhaka"),("chandpur polytechnic institute","abc@gmail.com","000-111-222","chandpur");