CREATE DATABASE IF NOT EXISTS appsgao DEFAULT CHARACTER SET utf8;

USE appsgao;

CREATE TABLE attribuer(
   numPoste INT(11) NOT NULL,
   numCreneau INT(11) NOT NULL,
   numUtil INT(11) NOT NULL,
   dateJour DATE NOT NULL,
   annuler tinyint(4) NOT NULL DEFAULT 0
);

INSERT INTO attribuer (numPoste, numUtil, numCreneau, dateJour, annuler) VALUES
(1, 1, 1, '2021-05-05', 0),
(1, 1, 2, '2021-05-06', 0),
(2, 2, 1, '2021-05-06', 0);


CREATE TABLE centre_cult(
   numID INT(11) NOT NULL,
   nomCentre VARCHAR(50) NOT NULL,
   nomSecretaire VARCHAR(50) NOT NULL,
   prenomSecretaire VARCHAR(50) NOT NULL,
   hrsOuvert TIME NOT NULL,
   hrsFermer TIME NOT NULL,
   identifiant VARCHAR(50) NOT NULL,
   pass VARCHAR(255) NOT NULL 
);

INSERT INTO centre_cult (numID, nomCentre, nomSecretaire, prenomSecretaire, hrsOuvert, hrsFermer, identifiant, pass) VALUES 
(1, 'centre culturel Nord', 'Doe', 'Jane', '08:00:00', '16:00:00', 'admin', '$2y$14$VK35Y/ilOB1UFVjCmf1gNeVcdHUabunatYZRJwiXINLE4H3jjZAlS');


CREATE TABLE creneau_hor(
   numCreneau INT(11) NOT NULL ,
   creneauDebut TIME NOT NULL,
   creneauFin TIME NOT NULL,
   libelle VARCHAR(100) NOT NULL
);

INSERT INTO creneau_hor (numCreneau, creneauDebut, creneauFin, libelle) VALUES
(1, '08:00:00', '09:00:00', '8h00 - 9h00'),
(2, '09:00:00', '10:00:00', '9h00 - 10h00'),
(3, '10:00:00', '11:00:00', '10h00 - 11h00'),
(4, '11:00:00', '12:00:00', '11h00 - 12h00'),
(5, '13:00:00', '14:00:00', '13h00 - 14h00'),
(6, '14:00:00', '15:00:00', '14h00 - 15h00'),
(7, '15:00:00', '16:00:00', '15h00 - 16h00');

CREATE TABLE post_info(
   numPoste INT(11) NOT NULL,
   nomPc VARCHAR(50) NOT NULL,
   etatPc VARCHAR(50) NOT NULL,
   date_crea DATETIME NOT NULL,
   versionPost TINYINT(1) NOT NULL DEFAULT 0
);

INSERT INTO post_info (numPoste, nomPc, etatPc, date_crea, versionPost) VALUES
(1, 'Poste N°01', 'Opérationnel', '2021-05-05 10:12:26', 1),
(2, 'Poste N°02', 'Opérationnel', '2021-05-05 10:15:26', 1),
(3, 'Poste N°03', 'Opérationnel', '2021-05-08 11:12:32', 1),
(4, 'Poste N°05', 'Opérationnel', '2021-05-08 11:13:50', 1);

CREATE TABLE utilisateur(
   numUtil INT(11) NOT NULL,
   nomUtil VARCHAR(100) NOT NULL,
   prenomUtil VARCHAR(100) NOT NULL,
   adresse VARCHAR(255) NOT NULL,
   codeP VARCHAR(25) NOT NULL,
   ville VARCHAR(100) NOT NULL,
   date_crea DATETIME NOT NULL,
   email VARCHAR(100) NOT NULL,
   passW VARCHAR(255) NOT NULL,
   supprimer TINYINT(1) NOT NULL DEFAULT 0,
   versionUtil TINYINT(1) NOT NULL DEFAULT 0
);

INSERT INTO utilisateur (numUtil, nomUtil, prenomUtil, adresse, codeP, ville, date_crea, email, passW, supprimer, versionUtil) VALUES
(1, 'DOE', 'John', '25 rue les chaussette', 97400, 'Saint-Denis', '2021-05-25 11:12:26', 'john.doe@gmail.com', 'PKj54Hd71YeO0', 0, 1),
(2, 'HUNTER', 'Paul', '55 rue les baskets', 97400, 'Saint-Denis', '2021-05-25 12:12:26', 'Paul.doe@gmail.com', '7854EdTTYe41', 0, 1);



ALTER TABLE attribuer
   ADD PRIMARY KEY(numPoste, numCreneau, numUtil),
   ADD KEY attr_poste_FK_idx (numPoste),
   ADD KEY attr_util_FK_idx (numUtil),
   ADD KEY attr_creneau_FK_idx (numCreneau);

ALTER TABLE centre_cult
   ADD PRIMARY KEY(numID),
   ADD UNIQUE KEY numID_UNIQUE (numID),
   ADD UNIQUE KEY identifiant_UNIQUE (identifiant);

ALTER TABLE creneau_hor
   ADD PRIMARY KEY(numCreneau),
   ADD UNIQUE KEY numCreneau_UNIQUE (numCreneau);

ALTER TABLE post_info
   ADD PRIMARY KEY(numPoste),
   ADD UNIQUE KEY numPoste_UNIQUE (numPoste),
   ADD UNIQUE KEY nomPC_UNIQUE (nomPc);

ALTER TABLE utilisateur
   ADD PRIMARY KEY(numUtil),
   ADD UNIQUE KEY numUtil_UNIQUE (numUtil),
   ADD UNIQUE KEY email_UNIQUE (email);


ALTER TABLE utilisateur 
	MODIFY numUtil int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 3;

ALTER TABLE post_info 
	MODIFY numPoste int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 5;

ALTER TABLE creneau_hor 
	MODIFY numCreneau int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 8;


ALTER TABLE attribuer
  ADD CONSTRAINT attr_creneau_FK FOREIGN KEY (numCreneau) REFERENCES creneau_hor (numCreneau) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT attr_poste_FK FOREIGN KEY (numPoste) REFERENCES post_info (numPoste) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT attr_util_FK FOREIGN KEY (numUtil) REFERENCES utilisateur (numUtil) ON DELETE NO ACTION ON UPDATE NO ACTION;
