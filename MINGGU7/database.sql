create database modul_6;
use modul_6;

CREATE TABLE `pengguna`(
    `id` int(11) NOT NULL auto_increment,
    `username` varchar(100),
    `password` varchar(100),
    PRIMARY KEY (`id`)
);