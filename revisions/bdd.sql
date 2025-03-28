/* ### Tables Principales :
- **UTILISATEUR** (Id_Utilisateur, Email, Mot_de_passe, Nom, Prénom, Photo_profil, Date_inscription, Role)
- 
- **EVENEMENT** (Id_Evenement, Nom, Description, Date, Heure, Lieu, Capacité_Max, Image, Catégorie, Créé_par)
- 
- **RESERVATION** (Id_Reservation, Id_Evenement#, Id_Utilisateur#, Nombre_Personnes, Date_Reservation, Statut)
- 
- **CATEGORIE** (Id_Catégorie, Nom, Description)

> Les clefs étrangères sont indiquées par un astérisque (#). */


CREATE DATABASE IF NOT EXISTS evenements;

USE evenements;

CREATE TABLE IF NOT EXISTS utilisateur(
    Id_Utilisateur INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    Email VARCHAR(255) NOT NULL,
    Mot_de_passe VARCHAR(255) NOT NULL,
    Nom VARCHAR(255) NOT NULL,
    Prénom VARCHAR(255) NOT NULL,
    Photo_profil VARCHAR(255) NULL,
    Date_inscriptiont VARCHAR(255) NOT NULL,
    Role VARCHAR(255) NOT NULL
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS evenement(
    Id_Evenement INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    Nom VARCHAR(255) NOT NULL,
    Description TEXT NULL,
    Date DATE NOT NULL,
    Heure INT NOT NULL,
    Lieu VARCHAR(255) NOT NULL,
    Capacité_Max INT NOT NULL,
    Image VARCHAR(255) NOT NULL,
    Id_Catégorie INT NOT NULL,
    Créé_par VARCHAR(255) NOT NULL,
    FOREIGN KEY (Id_Catégorie) REFERENCES categorie(Id_Catégorie)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS reservation (
    Id_Reservation INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    Id_Evenement INT NOT NULL,
    Id_Utilisateur INT NOT NULL,
    Nombre_Personnes INT NOT NULL,
    Date_Reservation DATE NOT NULL,
    Statut VARCHAR(255) NOT NULL,
    FOREIGN KEY (Id_Evenement) REFERENCES evenement(Id_Evenement),
    FOREIGN KEY (Id_Utilisateur) REFERENCES utilisateur(Id_Utilisateur)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS categorie (
    Id_Catégorie INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    Nom VARCHAR(255) NOT NULL,
    Description TEXT NOT NULL
)ENGINE=InnoDB;


INSERT INTO `categorie` (`Id_Catégorie`, `Nom`, `Description`) VALUES
(1, 'Conférence', 'Événements professionnels et éducatifs'),
(2, 'Concert', 'Performances musicales et spectacles'),
(3, 'Atelier', 'Sessions pratiques et interactives'),
(4, 'Exposition', 'Présentations artistiques et culturelles'),
(5, 'Sport', 'Événements sportifs et compétitions');



INSERT INTO `utilisateur` (`Id_Utilisateur`, `Email`, `Mot_de_passe`, `Nom`, `Prénom`, `Photo_profil`, `Date_inscription`, `Role`) VALUES
(1, 'admin@example.com', '$2y$10$8MNE.3xYYjA4Vbgwk8JXZOVOQwYVQiXBkJfnAUHlBTFN5MqB4VLqe', 'Admin', 'Super', 'default.jpg', '2025-03-28 09:34:46', 'admin'),
(2, 'user@example.com', '$2y$10$8MNE.3xYYjA4Vbgwk8JXZOVOQwYVQiXBkJfnAUHlBTFN5MqB4VLqe', 'Utilisateur', 'Test', 'default.jpg', '2025-03-28 09:34:46', 'user');



INSERT INTO `evenement` (`Id_Evenement`, `Nom`, `Description`, `Date`, `Heure`, `Lieu`, `Capacité_Max`, `Image`, `Id_Catégorie`, `Créé_par`) VALUES
(1, 'Conférence PHP 2025', 'Découvrez les dernières nouveautés de PHP et les meilleures pratiques de développement.', '2025-06-15', '09:00:00', 'Centre de Conférences, Paris', 200, 'conf-php.png', 1, 1),
(2, 'Concert Jazz au Parc', 'Une soirée jazz en plein air avec les meilleurs musiciens de la région.', '2025-07-20', '20:00:00', 'Parc Municipal, Lyon', 500, 'jazz-concert.jpg', 2, 1),
(3, 'Atelier Développement Web', 'Apprenez à créer votre premier site web avec HTML, CSS et JavaScript.', '2025-05-10', '14:00:00', 'Campus Numérique, Bordeaux', 30, 'web-workshop.jpg', 3, 1),
(4, 'Exposition Art Moderne', 'Découvrez les œuvres d\'artistes contemporains innovants.', '2025-08-05', '10:00:00', 'Galerie d\'Art, Marseille', 100, 'modern-art.webp', 4, 1),
(5, 'Tournoi de Basketball', 'Compétition amicale ouverte à tous les niveaux.', '2025-09-12', '13:00:00', 'Gymnase Municipal, Lille', 80, 'basketball.webp', 5, 1);
