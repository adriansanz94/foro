drop database foro_db;
create database foro_db;
create user 'adminAlumno'@'localhost' identified by '1234';
grant all privileges on foro_db.* to 'adminAlumno'@'localhost' with grant option;


