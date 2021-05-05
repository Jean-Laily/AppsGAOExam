CREATE TABLE centreCulturel(
   id_centre INT NOT NULL,
   nomDuCentre VARCHAR(50) NOT NULL,
   nomSecretaire VARCHAR(50) NOT NULL,
   prenomSecretaire VARCHAR(50) NOT NULL,
   heuresOuverture TIME NOT NULL,
   heureFermeture TIME NOT NULL,
   identifiant VARCHAR(50) NOT NULL,
   motDePasse VARCHAR(255) NOT NULL,
   PRIMARY KEY(id_centre)
);

CREATE TABLE posteInformatique(
   id_poste INT NOT NULL,
   nomDuPc VARCHAR(50) NOT NULL,
   heureConnexion TIME,
   heureDeconnexion TIME,
   dateCreation DATETIME NOT NULL,
   supprimer tinyint(1) NOT NULL,
   version INT NOT NULL,
   id_centre INT NOT NULL,
   PRIMARY KEY(id_poste),
   FOREIGN KEY(id_centre) REFERENCES centreCulturel(id_centre)
);

CREATE TABLE utilisateur(
   id_user INT NOT NULL,
   nom VARCHAR(100) NOT NULL,
   prenom VARCHAR(100) NOT NULL,
   adresse VARCHAR(255) NOT NULL,
   codePostal INT NOT NULL,
   ville VARCHAR(100) NOT NULL,
   dateCreation DATETIME NOT NULL,
   supprimer tinyint(1) NOT NULL,
   version INT NOT NULL,
   id_poste INT NOT NULL,
   PRIMARY KEY(id_user),
   FOREIGN KEY(id_poste) REFERENCES posteInformatique(id_poste)
);

CREATE TABLE dateDuJour(
   id_date DATE NOT NULL,
   libelle VARCHAR(50) NOT NULL,
   PRIMARY KEY(id_date)
);

CREATE TABLE creneauHoraire(
   id_creneauxHrs INT NOT NULL,
   heuresDebut TIME NOT NULL,
   heureFin TIME NOT NULL,
   libelle VARCHAR(100) NOT NULL,
   id_date DATE NOT NULL,
   id_centre INT NOT NULL,
   PRIMARY KEY(id_creneauxHrs),
   FOREIGN KEY(id_date) REFERENCES dateDuJour(id_date),
   FOREIGN KEY(id_centre) REFERENCES centreCulturel(id_centre)
);


INSERT INTO centreCulturel (id_centre, nomDuCentre, nomSecretaire, prenomSecretaire, heuresOuverture, heureFermeture, identifiant, motDePasse) VALUES (1, 'cuturelCenter', 'Doe', 'Jane', '08:00:00', '16:00:00', 'admin', '@12345678');

