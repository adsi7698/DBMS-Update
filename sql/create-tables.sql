delimiter ;
create database if not exists SABS;
use SABS;

create table person (
	personID int auto_increment,
	firstName varchar(50) not null,
	lastName varchar(50),
	gender varchar(6) not null,
	dob date not null,
	phoneNumber bigint(10) not null,
	registerDate date not null,

	primary key (personID)
) engine = InnoDB, auto_increment = 1001, default charset = utf8;

create table personLogin (
	personID int not null,
	email varchar(100) not null,
	password varchar(100) not null,
	question varchar(100) not null,
	answer varchar(100) not null,
	lastLogin datetime not null,

	primary key (email)
) engine = InnoDB, default charset = utf8;

create table doctor (
	doctorID int auto_increment,
	firstName varchar(50) not null,
	lastName varchar(50),
	gender varchar(6) not null,
	dob date not null,
	phoneNumber bigint(10) not null,
	registerDate date not null,

	qualification varchar(100) not null,
	departmentID int not null,
	buildingID int not null,
	experience int(2),
	fee int(4) not null,

	primary key (doctorID)
) engine = InnoDB, auto_increment = 1001, default charset = utf8;

create table doctorLogin (
	doctorID int not null,
	email varchar(100) not null,
	password varchar(100) not null,
	question varchar(100) not null,
	answer varchar(100) not null,
	lastLogin datetime not null,

	primary key (email)
) engine = InnoDB, default charset = utf8;

create table department (
	departmentID int auto_increment,
	name varchar(100) not null,

	primary key (departmentID)
) engine = InnoDB, auto_increment = 11, default charset = utf8;

create table building (
	buildingID int auto_increment,
	name varchar(100) not null,
	type varchar(8) not null,

	addressLine1  varchar(100) not null,
	addressLine2 varchar(100) not null,
	addressLine3 varchar(100) not null,
	city varchar(50) not null,
	pin int(6) not null,

	latitude double not null,
	longitude double not null,

	primary key (buildingID)
) engine = InnoDB, auto_increment = 101, default charset = utf8;

create table booking (
	bookingID int auto_increment,
	bookingDate date not null,
	appointmentDate date not null,
	personID int not null,
	doctorID int not null,
	slot time not null,
	bookingStatus varchar(9) not null,

	primary key (bookingID)
) engine = InnoDB, auto_increment = 36890001, default charset = utf8;

create table history (
	bookingID int,
	bookingDate date not null,
	appointmentDate date not null,
	personID int not null,
	doctorID int not null,
	slot time not null,
	bookingStatus varchar(9) not null,

	primary key (bookingID)
) engine = InnoDB, default charset = utf8;

alter table personLogin
	add constraint FK_personLogin
	foreign key (personID) references person (personID)
	on delete restrict
	on update cascade;

alter table doctorLogin
	add constraint FK_doctorLogin
	foreign key (doctorID) references doctor (doctorID)
	on delete restrict
	on update cascade;

alter table doctor
	add constraint FK_department
	foreign key (departmentID) references department (departmentID)
	on delete restrict
	on update cascade;

alter table doctor
	add constraint FK_building
	foreign key (buildingID) references building (buildingID)
	on delete restrict
	on update cascade;

alter table booking
	add constraint FK_personBooking
	foreign key (personID) references person (personID)
	on delete restrict
	on update cascade;

alter table booking
	add constraint FK_doctorBooking
	foreign key (doctorID) references doctor (doctorID)
	on delete restrict
	on update cascade;

alter table history
	add constraint FK_personBookingHistory
	foreign key (personID) references person (personID)
	on delete restrict
	on update cascade;

alter table history
	add constraint FK_doctorBookingHistory
	foreign key (doctorID) references doctor (doctorID)
	on delete restrict
	on update cascade;

set global event_scheduler = on;

delimiter .

create event eventHistory
on schedule every 24 hour
starts '2017-11-21 00:00:01'
do begin
	insert into history
	select * from booking
	where appointmentDate < curdate();

	delete from booking
	where appointmentDate < curdate();
end.

delimiter ;
