create database user_database;

create table if not exists user_table
(
	`username`		varchar(64) NOT NULL DEFAULT "Guest",
	`email`			varchar(64) NOT NULL,
	`password`		varchar(64) NOT NULL,
	`creation date`	DATE NOT NULL DEFAULT CURRENT_TIME,
	PRIMARY KEY (username);
);