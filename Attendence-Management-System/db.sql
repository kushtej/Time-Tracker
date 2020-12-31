DROP DATABASE IF EXISTS attendence_system;
CREATE DATABASE attendence_system;

USE attendence_system;

CREATE TABLE student
(
        acc_id int auto_increment primary key,
		student_name varchar(30) not null,
		password varchar(30) not null,
        class varchar(10) not null,

		email varchar(30) not null,
        father_name varchar(30) not null,
        mother_name varchar(30) not null,
        
		created_at timestamp default now()	
);

CREATE TABLE faculty
(
        acc_id int auto_increment primary key,
		faculty_name varchar(30) unique not null,
        faculty_class varchar(30) DEFAULT 'NOT ASSIGNED',
		password varchar(30) not null,

		email varchar(30) not null,
        
		created_at timestamp default now()	
);

CREATE TABLE attendence
(
    attendence_id int auto_increment primary key,
    student_id int not null,
    faculty_id int not null,

    present_date varchar(255) not null,
    present BOOLEAN not null,
    
    foreign key(student_id) references student(acc_id) on delete cascade,
    foreign key(faculty_id) references faculty(acc_id) on delete cascade
);



create table admin
(
    admin_id int primary key,
    admin_name varchar(255),
    admin_password varchar(255)
);
insert into admin(admin_id,admin_name,admin_password) values(1,'admin','admin');

INSERT INTO student(student_name,password,class,email,father_name,mother_name)
    VALUES  ('STUDENT-01','a','c1','asdf@asdf.com','father-01','mother-01'),
            ('STUDENT-02','a','c1','asdf@asdf.com','father-02','mother-02'),
            ('STUDENT-03','a','c1','asdf@asdf.com','father-03','mother-03'),
            ('STUDENT-04','a','c1','asdf@asdf.com','father-04','mother-04'),
            ('STUDENT-05','a','c2','asdf@asdf.com','father-05','mother-05'),
            ('STUDENT-06','a','c2','asdf@asdf.com','father-06','mother-06'),
            ('STUDENT-07','a','c2','asdf@asdf.com','father-07','mother-07'),
            ('STUDENT-08','a','c3','asdf@asdf.com','father-08','mother-08'),
            ('STUDENT-09','a','c3','asdf@asdf.com','father-09','mother-09'),
            ('STUDENT-10','a','c3','asdf@asdf.com','father-10','mother-10');

INSERT INTO faculty(faculty_name,faculty_class,email,password)
    VALUES  ('FACULTY-01','c1','asdf@asdf.com','a'),
            ('FACULTY-02','c2','asdf@asdf.com','a'),
            ('FACULTY-03','c3','asdf@asdf.com','a');

