DROP DATABASE IF EXISTS quote_management_system;
CREATE DATABASE quote_management_system;

USE quote_management_system;


CREATE TABLE users
(
        acc_id int auto_increment primary key,
		username varchar(30) unique not null,
		password varchar(30) not null,

		security_question varchar(255) not null,
		security_answer varchar(255) not null,
        
		created_at timestamp default now()	
);

create table quotes
	(
		quote_id int auto_increment primary key,
		quote_text varchar(255) not null,
        quote_source varchar(255) not null,
		user_id int not null,
		created_at timestamp default now(),
		foreign key(user_id) references users(acc_id) on delete cascade	 
	);

insert into users(username,password,security_question,security_answer)values('johndoe','welcome123','Name of the artist of your favorite song?','John Mayer');
insert into quotes(quote_text,quote_source,user_id)values
    ("For 50 years, WWF has been protecting the future of nature. The world's leading conservation organization, WWF works in 100 countries and is supported by 1.2 million members in the United States and close to 5 million globally.",
    "From WWF's website",
    "1");