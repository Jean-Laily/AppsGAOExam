CREATE DATABASE IF NOT EXISTS appsgao DEFAULT CHARACTER SET utf8;

USE appsgao;

CREATE TABLE centre_cult(
   numID INT,
   nomCentre VARCHAR(50) NOT NULL,
   nomSecretaire VARCHAR(50) NOT NULL,
   prenomSecretaire VARCHAR(50) NOT NULL,
   hrsOuvert TIME NOT NULL,
   hrsFermer TIME NOT NULL,
   identifiant VARCHAR(50) NOT NULL,
   password VARCHAR(255) NOT NULL,
   PRIMARY KEY(numID)
);

CREATE TABLE post_info(
   numPoste INT,
   nomPc VARCHAR(50) NOT NULL,
   etatPc VARCHAR(50) NOT NULL,
   date_crea DATETIME NOT NULL,
   version INT,
   PRIMARY KEY(numPoste)
);

CREATE TABLE utilisateur(
   numUtil INT,
   nomUtil VARCHAR(100) NOT NULL,
   prenomUtil VARCHAR(100) NOT NULL,
   adresse VARCHAR(255) NOT NULL,
   codeP INT NOT NULL,
   ville VARCHAR(100) NOT NULL,
   date_crea DATETIME NOT NULL,
   email VARCHAR(50) NOT NULL,
   password VARCHAR(50) NOT NULL,
   supprimer INT NOT NULL,
   version INT NOT NULL,
   PRIMARY KEY(numUtil)
);

CREATE TABLE dateDuJour(
   id_date DATE,
   libelle VARCHAR(50) NOT NULL,
   PRIMARY KEY(id_date)
);

CREATE TABLE creneau_hor(
   numCreneau INT,
   creneauDebut INT NOT NULL,
   creneauFin TIME NOT NULL,
   libelle VARCHAR(100) NOT NULL,
   id_date DATE NOT NULL,
   PRIMARY KEY(numCreneau),
   FOREIGN KEY(id_date) REFERENCES dateDuJour(id_date)
);

CREATE TABLE attribuer(
   numPoste INT,
   numUtil INT,
   numCreneau INT,
   PRIMARY KEY(numPoste, numUtil, numCreneau),
   FOREIGN KEY(numPoste) REFERENCES post_info(numPoste),
   FOREIGN KEY(numUtil) REFERENCES utilisateur(numUtil),
   FOREIGN KEY(numCreneau) REFERENCES creneau_hor(numCreneau)
);


INSERT INTO centre_cult (numID, nomCentre, nomSecretaire, prenomSecretaire, hrsOuvert, hrsFermer, identifiant, password) 
   VALUES (1, 'culturelCenter', 'Doe', 'Jane', '08:00:00', '16:00:00', 'admin', '$2y$14$NXCdYb4b7YKv.3blb.RvPuYmOuD9r8RPpjg98Y8M9f9EnSo.ATwXq');

INSERT INTO dateDuJour (id_date, libelle)

INSERT INTO creneau_hor (numCreneau, creneauDebut, creneauFin, libelle)
   VALUES(1,'08:00:00', '09:00:00', '8h-9h',),
         (2,'09:00:00', '10:00:00', '9h-10h'),
         (3,'10:00:00', '11:00:00', '10h-11h'),
         (4,'11:00:00', '12:00:00', '11h-12h'),
         (5,'13:00:00', '14:00:00', '13h-14h'),
         (6,'14:00:00', '15:00:00', '14h-15h'),
         (7,'15:00:00', '16:00:00', '15h-16h');

