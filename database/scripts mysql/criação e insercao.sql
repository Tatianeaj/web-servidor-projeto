
create database dbevents;
use dbevents;

create table users(
cod_user int not null auto_increment,
name varchar(100),
birthdate date,
email varchar(70),
password varchar(50),
PRIMARY KEY(cod_user)
);

create table address(
cod_address INT NOT NULL auto_increment,
publicPlace varchar(100),
city varchar(40),
state varchar(40),
PRIMARY KEY(cod_address)
);

create table events(
cod_event INT NOT NULL AUTO_INCREMENT,
name varchar(50),
date date,
startTime time, 
cod_address int,
primary key(cod_event),
foreign key(cod_address) references address(cod_address)
);

create table users_events(
cod_event int,
cod_user int,
PRIMARY KEY(cod_event, cod_user),
FOREIGN KEY(cod_event) references events(cod_event),
FOREIGN KEY(cod_user) references users(cod_user)
);



insert into users(name, birthdate, email, password) values("Paula", "1999-01-23","paula1999@hotmail.com","paula@123");
insert into address(publicPlace, city, state) values("Mansão Hilda", "Ponta Grossa", "PR");
insert into address(publicPlace, city, state) values("Opera de arame", "Curitiba", "PR");
insert into address(publicPlace, city, state) values("Senac", "São Carlos", "SP");
insert into address(publicPlace, city, state) values("Pelourinho", "Salvador", "BA");
insert into address(publicPlace, city, state) values("Big House", "Belo Horizonte", "MG");
insert into address(publicPlace, city, state) values("Villa Tupuki", "Manaus", "AM");
insert into address(publicPlace, city, state) values("Centro de Eventos Ipanema", "Rio de janeiro", "RJ");
insert into address(publicPlace, city, state) values("Centro de Eventos POA", "Porto Alegre", "RS");
insert into address(publicPlace, city, state) values("Praia Moreninha", "Fortaleza", "CE");
insert into address(publicPlace, city, state) values("Teatro Raio de Sol", "Palmas", "TO");
insert into events(name, date, startTime, cod_address) values("Pamonhaço", "2023-12-12", "17:00", 1);
insert into users_events(cod_event, cod_user) values(1,1);

