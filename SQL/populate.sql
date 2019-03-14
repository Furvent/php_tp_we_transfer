#------------------------------------------------------------
# Table: user
#------------------------------------------------------------
insert into utilisateur values (null, "bob", "lemdp", 1000);
insert into utilisateur values (null, "Erik", "erik01", 1000);

#------------------------------------------------------------
# Table: file
#------------------------------------------------------------
#CREATE TABLE file(
#        id              int primary key auto_increment,
#		 file_name		varchar(255),
#        download_number int,
#        size            int,
#        id_utilisateur         int);
insert into file values (null, "fichierDeBob_1", 0, 25, 1);
insert into file values (null, "fichierDeBob_2", 0, 48, 1);
insert into file values (null, "fichierDeErik_1", 0, 41, 2);
insert into file values (null, "fichierDeErik_2", 0, 152, 2);