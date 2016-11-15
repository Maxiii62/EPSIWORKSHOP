#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------

CREATE SCHEMA IF NOT EXISTS `workshopEATineraire` DEFAULT CHARACTER SET utf8 ;
USE `workshopEATineraire` ;


#------------------------------------------------------------
# Table: Utilisateur
#------------------------------------------------------------

CREATE TABLE Utilisateur(
        id              int (11) Auto_increment  NOT NULL ,
        nom             Varchar (25) NOT NULL ,
        prenom          Varchar (25) NOT NULL ,
        dateNaissance   Date NOT NULL ,
        mail            Varchar (25) NOT NULL ,
		password		Varchar(25) NOT NULL,
        numeroTelephone Varchar (25) NOT NULL ,
        nombrePoints    Int ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Rdv
#------------------------------------------------------------

CREATE TABLE Rdv(
        id         int (11) Auto_increment  NOT NULL ,
        horaire    Varchar (25) NOT NULL ,
        idCreateur Int NOT NULL ,
        dateRdv    Date NOT NULL ,
        id_Lieu    Int NOT NULL ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Lieu
#------------------------------------------------------------

CREATE TABLE Lieu(
        id          int (11) Auto_increment  NOT NULL ,
        coordonnees Varchar (25) NOT NULL ,
        nomLieu     Varchar (25) ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Verdict
#------------------------------------------------------------

CREATE TABLE Verdict(
        id          int (11) Auto_increment  NOT NULL ,
        note        Int ,
        description Varchar (200) ,
        id_Rdv      Int NOT NULL ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: utilisateur_rdv
#------------------------------------------------------------

CREATE TABLE utilisateur_rdv(
        id     Int NOT NULL ,
        id_Rdv Int NOT NULL ,
        PRIMARY KEY (id ,id_Rdv )
)ENGINE=InnoDB;

ALTER TABLE Rdv ADD CONSTRAINT FK_Rdv_id_Lieu FOREIGN KEY (id_Lieu) REFERENCES Lieu(id);
ALTER TABLE Verdict ADD CONSTRAINT FK_Verdict_id_Rdv FOREIGN KEY (id_Rdv) REFERENCES Rdv(id);
ALTER TABLE utilisateur_rdv ADD CONSTRAINT FK_utilisateur_rdv_id FOREIGN KEY (id) REFERENCES Utilisateur(id);
ALTER TABLE utilisateur_rdv ADD CONSTRAINT FK_utilisateur_rdv_id_Rdv FOREIGN KEY (id_Rdv) REFERENCES Rdv(id);

