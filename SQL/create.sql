#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------

create database weTransfer;
# drop database weTransfer;
use weTransfer;

#------------------------------------------------------------
# Table: utilisateur
#------------------------------------------------------------

CREATE TABLE utilisateur(
        id            int primary key auto_increment,
        login         varchar (255),
        mdp           varchar (255),
        quota_restant int);


#------------------------------------------------------------
# Table: file
#------------------------------------------------------------

CREATE TABLE file(
        id              int primary key auto_increment,
        file_name		varchar(255),
        download_number int,
        size            int,
        id_utilisateur         int);
ALTER TABLE file
	add constraint fk_utilisateur
    foreign key (id_utilisateur)
    references utilisateur(id);