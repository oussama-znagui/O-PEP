CREATE DATABASE opep CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE utilisateur
(
   id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nom VARCHAR(100),
    prenom VARCHAR(100),
    email VARCHAR(255),
    pass VARCHAR(255),
    id_role int,
    FOREIGN KEY (id_role) REFERENCES role (id)
)

CREATE TABLE role
(
   id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    rl VARCHAR(100),
   
   

)


CREATE TABLE categorie
(
   id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nom VARCHAR(100),
   
)


CREATE TABLE article
(
   id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nom VARCHAR(100),
    Origine VARCHAR(100),
    type_ VARCHAR(100),
    Taille  VARCHAR(255),
    Température  VARCHAR(255),
    Prix float,
    id_cat int
    FOREIGN KEY (id_cat) REFERENCES categorie (id)
)

CREATE TABLE panier (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    id_client int,
    FOREIGN KEY (id_client) REFERENCES utilisateur (id)
)
CREATE TABLE commande (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    id_PP int,
    FOREIGN KEY (id_PP) REFERENCES panierplante (id_plantePanier)
)
CREATE TABLE plantePanier (
    id_panier int,
    id_plante int,
    qte int,
    PRIMARY KEY(id_plante),
    PRIMARY KEY(id_panier),
     FOREIGN KEY (id_panier) REFERENCES panier (id),
      FOREIGN KEY (id_plante) REFERENCES article (id)
)



INSERT INTO categorie VALUES(NULL,"Plantes d'Intérieur");
INSERT INTO categorie VALUES(NULL,"Plantes d'Extérieur");
INSERT INTO categorie VALUES(NULL,"Plantes Succulentes et Cactus");
INSERT INTO categorie VALUES(NULL,"Plantes à Fleurs");
INSERT INTO categorie VALUES(NULL,"Plantes d'Intérieur Faciles d'Entretien");
INSERT INTO categorie VALUES(NULL,"Plantes Aromatiques");
INSERT INTO categorie VALUES(NULL,"Plantes Tropicales");




INSERT INTO article (nom, Origine, img, Taille, Température, Prix, id_cat)
VALUES ("Fougère de Boston", "Amérique", "media/fern.jpg", "2-3 mètres", "Lumière indirecte brillante à modérée", 15.99, 1),
       ("Sansevieria trifasciata", "Afrique de l'Ouest", "media/snake_plant.jpg", "0.3-1 mètre", "Lumière indirecte à faible", 19.99, 1),
       ("Pothos", "Îles Salomon", "media/pothos.jpg", "3-6 mètres", "Lumière indirecte à faible", 12.99, 1),

        ("Rosier", "Asie", "media/rosier.jpg", "1-2 mètres", "Plein soleil", 24.99, 2),
       ("Lavande", "Méditerranée", "media/lavande.jpg", "0.3-0.6 mètre", "Plein soleil", 18.99, 2),
       ("Hosta", "Asie de l'Est", "media/hosta.jpg", "0.3-0.9 mètre", "Lumière indirecte à modérée", 14.99, 2);

        ("Echeveria", "Amérique du Nord", "media/echeveria.jpg", "0.1-0.3 mètre", "Plein soleil", 8.99, 3),
       ("Cactus de Noël", "Brésil", "media/christmas_cactus.jpg", "0.2-0.4 mètre", "Lumière indirecte à faible", 12.99, 3),
       ("Aloe vera", "Afrique", "media/aloe_vera.jpg", "0.3-0.6 mètre", "Plein soleil", 10.99, 3),

        ("Orchidée", "Asie", "media/orchid.jpg", "0.3-1 mètre", "Lumière indirecte à modérée", 29.99, 4),
       ("Géranium", "Afrique du Sud", "media/geranium.jpg", "0.3-1 mètre", "Plein soleil", 16.99, 4),
       ("Lys", "Europe et Asie", "media/lily.jpg", "0.6-1.8 mètres", "Lumière indirecte à modérée", 22.99, 4);
        ("Basilic", "Asie", "media/basil.jpg", "0.2-0.5 mètre", "Lumière indirecte à modérée", 7.99, 5),

       ("Menthe", "Méditerranée", "media/mint.jpg", "0.3-0.6 mètre", "Lumière indirecte à modérée", 9.99, 5),
       ("Tomate", "Amérique du Sud", "media/tomato.jpg", "1-3 mètres", "Plein soleil", 11.99)


ALTER TABLE plantepanier
DROP CONSTRAINT plantepanier_ibfk_1;