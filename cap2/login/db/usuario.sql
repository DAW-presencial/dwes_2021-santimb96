/**
  SE NECESITA CREAR UNA CONEXIÓN CON LA BASE DE DATOS
 */

create database userDB;

create table user (
    `id` int primary key auto_increment,
    `userName` varchar(20) not null,
    `password` varchar(20)
);

insert into user(userName, password) values (
 'admin', 'admin'
                                           );

drop table user;

