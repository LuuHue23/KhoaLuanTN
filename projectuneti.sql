CREATE DATABASE projectdh CHARACTER SET utf8 COLLATE utf8_unicode_ci;

CREATE TABLE target (
	Id_Tar int PRIMARY KEY auto_increment,
	Id_TarG varchar(30) NOT NULL, 
	Tar_Name varchar(50) NOT NULL , 
	Description text
);
CREATE TABLE targetgroup (
	Id_TarG varchar(30) PRIMARY KEY ,
	TarG_Name varchar(60) NOT NULL, 
	Description text
);

CREATE TABLE staff (
	Id_Staff int PRIMARY KEY auto_increment,
	Id_Position char(30) NOT NULL, 
	Id_Depart char(30) NOT NULL,
	Password varchar(255) NOT NULL,
	Staff_Name varchar(100) NOT NULL, 
	Email varchar(70) NOT NULL UNIQUE,
	Status tinyint(1) DEFAULT '1'
);

CREATE TABLE depart (
	Id_Depart char(30) PRIMARY KEY,
	Depart_Name varchar(60) NOT NULL
);

CREATE TABLE position (
	Id_Position char(30) PRIMARY KEY,
	Position_Name varchar(60) NOT NULL
);

CREATE TABLE work_pro (
	Id_Tar int(30),
	Id_TarG varchar(30) NOT NULL,
	Id_Staff int (11) NOT NULL,
	Date_Start date NOT NULL,
	Date_End date NOT NULL,
	Status tinyint(1) NOT NULL DEFAULT '0'
);
CREATE TABLE rate (
	Id_Tar int(30) NOT NULL,
	Id_Staff int(11) NOT NULL,
	Rate varchar(30) NOT NULL,
	Status tinyint(1)NOT NULL  DEFAULT '1'
);
CREATE TABLE todo_list(
	id int(11) PRIMARY KEY,
	Id_Tar int(11) NOT NULL,
	Id_Staff int(11) NOT NULL,
	todo_name varchar(200) NOT NULL,
	status tinyint(1) DEFAULT ('0')

);

ALTER TABLE target ADD FOREIGN KEY FK_TARGET_TARGG(Id_TarG) REFERENCES targetgroup(Id_TarG);


ALTER TABLE staff ADD FOREIGN KEY FK_staffT_depart(Id_Depart) REFERENCES depart(Id_Depart);
ALTER TABLE staff ADD FOREIGN KEY fk_staff_position(Id_Position) REFERENCES position(Id_Position);




ALTER TABLE work_pro ADD FOREIGN KEY fk_work_target(Id_Tar) REFERENCES target(Id_tar);

ALTER TABLE work_pro ADD FOREIGN KEY fk_work_staff(Id_Staff) REFERENCES staff(Id_Staff);
ALTER TABLE work_pro ADD FOREIGN KEY fk_work_targg(Id_TarG) REFERENCES targetgroup(Id_TarG);

ALTER TABLE rate ADD FOREIGN KEY fk_rate_todo(Id_Tar) REFERENCES todo_list(Id_Tar);
ALTER TABLE rate ADD FOREIGN KEY FK_rate_target(Id_Tar) REFERENCES target(Id_Tar);
ALTER TABLE rate ADD FOREIGN KEY fk_rate_staff(Id_Staff) REFERENCES staff(Id_Staff);




