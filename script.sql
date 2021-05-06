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
   pass VARCHAR(255) NOT NULL,
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
   email VARCHAR(100) NOT NULL,
   passW VARCHAR(255) NOT NULL,
   supprimer INT NOT NULL,
   version INT NOT NULL,
   PRIMARY KEY(numUtil)
);

CREATE TABLE creneau_hor(
   numCreneau INT,
   creneauDebut TIME NOT NULL,
   creneauFin TIME NOT NULL,
   libelle VARCHAR(100) NOT NULL,
   PRIMARY KEY(numCreneau)
);

CREATE TABLE attribuer(
   numPoste INT,
   numUtil INT,
   numCreneau INT,
   dateJour DATE NOT NULL,
   PRIMARY KEY(numPoste, numUtil, numCreneau),
   FOREIGN KEY(numPoste) REFERENCES post_info(numPoste),
   FOREIGN KEY(numUtil) REFERENCES utilisateur(numUtil),
   FOREIGN KEY(numCreneau) REFERENCES creneau_hor(numCreneau)
);


INSERT INTO centre_cult (numID, nomCentre, nomSecretaire, prenomSecretaire, hrsOuvert, hrsFermer, identifiant, pass) VALUES 
(1, 'centre culturel Nord', 'Doe', 'Jane', '08:00:00', '16:00:00', 'admin', '$2y$14$VK35Y/ilOB1UFVjCmf1gNeVcdHUabunatYZRJwiXINLE4H3jjZAlS');

INSERT INTO creneau_hor (numCreneau, creneauDebut, creneauFin, libelle) VALUES
(1, '08:00:00', '09:00:00', '8h - 9h'),
(2, '09:00:00', '10:00:00', '9h - 10h'),
(3, '10:00:00', '11:00:00', '10h - 11h'),
(4, '11:00:00', '12:00:00', '11h - 12h'),
(5, '13:00:00', '14:00:00', '13h - 14h'),
(6, '14:00:00', '15:00:00', '14h - 15h'),
(7, '15:00:00', '16:00:00', '15h - 16h');

INSERT INTO utilisateur (numUtil, nomUtil, prenomUtil, adresse, codeP, ville, date_crea, email, passW, supprimer, version) VALUES
(1, 'Doe', 'John', '25 rue les chaussette', 97400, 'Saint-Denis', '2021-05-25 11:12:26', 'john.doe@gmail.com', 'PKj54Hd71YeO0', 0, 0),
(2, 'Doe', 'Paul', '55 rue les baskets', 97400, 'Saint-Denis', '2021-05-25 12:12:26', 'Paul.doe@gmail.com', '7854EdTTYe41', 0, 0);

INSERT INTO post_info (numPoste, nomPc, etatPc, date_crea, version) VALUES
(1, 'PC01', 'OK', '2021-05-05 10:12:26', 0),
(2, 'PC02', 'OK', '2021-05-05 10:15:26', 0);

INSERT INTO attribuer (numPoste, numUtil, numCreneau, dateJour) VALUES
(1, 1, 1, '2021-05-05'),
(1, 1, 2, '2021-05-06'),
(2, 2, 1, '2021-05-06');