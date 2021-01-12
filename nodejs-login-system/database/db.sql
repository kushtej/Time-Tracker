drop database if exists nodejs_login_system;
create database nodejs_login_system;
use nodejs_login_system;

create table users
	(
		acc_id int auto_increment primary key,
		username varchar(255) unique not null,
        email varchar(30) default "I'd Rather Not Say",
		password varchar(255) not null,
		created_at timestamp default now()	
	);
