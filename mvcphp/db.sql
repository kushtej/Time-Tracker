DROP DATABASE IF EXISTS phpmvc;
CREATE DATABASE phpmvc;
USE phpmvc;
CREATE TABLE user
(
        acc_id int auto_increment primary key,
		first_name varchar(30) not null,
        last_name varchar(30) not null,
		password varchar(30) not null,
		email varchar(30) not null,
		created_at timestamp default now()	
);