DROP TABLE  IF EXISTS panier,commande, produit, user, typeProduit, etat;

-- --------------------------------------------------------
-- Structure de la table typeproduit
--
CREATE TABLE IF NOT EXISTS typeProduit (
  id_type int(10) NOT NULL AUTO_INCREMENT,
  libelle varchar(50) DEFAULT NULL,
  PRIMARY KEY (id_type)
)  ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;
-- Contenu de la table typeproduit
INSERT INTO typeProduit (id_type, libelle) VALUES
(NULL, 'Bottine'),
(NULL, 'Tong'),
(NULL, 'Sport'),
(NULL, 'Mocassin');

-- --------------------------------------------------------
-- Structure de la table etat

CREATE TABLE IF NOT EXISTS etat (
  id_etat int(11) NOT NULL AUTO_INCREMENT,
  libelle varchar(20) NOT NULL,
  PRIMARY KEY (id_etat)
) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;
-- Contenu de la table etat
INSERT INTO etat (id_etat, libelle) VALUES
(1, 'A preparer'),
(2, 'Expedie'),
(3, 'Annulée');

-- --------------------------------------------------------
-- Structure de la table produit

CREATE TABLE IF NOT EXISTS produit (
  id int(10) NOT NULL AUTO_INCREMENT,
  id_type int(10) DEFAULT NULL,
  nom varchar(50) DEFAULT NULL,
  prix float(5,2) DEFAULT NULL,
  photo varchar(50) DEFAULT NULL,
  dispo tinyint(4) NOT NULL,
  stock int(11) NOT NULL,
  PRIMARY KEY (id),
  KEY id_type (id_type),
  CONSTRAINT produit_fk_1 FOREIGN KEY (id_type) REFERENCES typeProduit (id_type)
) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;


INSERT INTO produit (id, id_type, nom, prix,photo,dispo,stock)VALUES (NULL, 3, 'Asics patriot 6', '89.99','asics.jpg',10,5);
INSERT INTO produit (id, `id_type`, `nom`, `prix`,`photo`,dispo,stock)VALUES (NULL, 3, 'Nike Air Jordan', '120.00','jordan.jpg',10,5);
INSERT INTO produit (`id`, `id_type`, `nom`, `prix`,`photo`,dispo,stock)VALUES (NULL, 1, 'One pier', '60.00','one.jpg',10,5);
INSERT INTO produit (`id`, `id_type`, `nom`, `prix`,`photo`,dispo,stock)VALUES (NULL, 1, 'Zara Botine', '54.99','zara.jpg',10,5);
INSERT INTO produit (`id`, `id_type`, `nom`, `prix`,`photo`,dispo,stock)VALUES (NULL, 4, 'Mocassin Tomy', '90','tommy.jpg',10,5);
INSERT INTO produit (`id`, `id_type`, `nom`, `prix`,`photo`,dispo,stock)VALUES (NULL, 2, 'Quick silver Tongue', '30.00','quick.jpg',10,5);
INSERT INTO produit (`id`, `id_type`, `nom`, `prix`,`photo`,dispo,stock)VALUES (NULL, 1, 'Celio Bottine', 59.99,'celio.jpg',10,5);


-- --------------------------------------------------------
-- Structure de la table user

CREATE TABLE IF NOT EXISTS user (
  id_user int(11) NOT NULL AUTO_INCREMENT,
  email varchar(255) NOT NULL,
  password varchar(255) NOT NULL,
  login varchar(255) NOT NULL,
  nom varchar(255) NOT NULL,
  code_postal varchar(255) NOT NULL,
  ville varchar(255) NOT NULL,
  adresse varchar(255) NOT NULL,
  valide tinyint NOT NULL,
  droit tinyint NOT NULL,
  PRIMARY KEY (id_user)
) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;

# Contenu de la table user
INSERT INTO user (id_user,nom,login,password,email,valide,droit,code_postal,ville,adresse) VALUES
(NULL ,'Julien', 'admin', 'admin', 'admin@gmail.com',1,2,90000,'Belfort','6 rue de madrid'),
(NULL ,'Dupond', 'vendeur', 'vendeur', 'vendeur@gmail.com',1,2,90000,'Belfort','6 rue de madrid'),
(NULL ,'Renalde','client', 'client','client@gmail.com',1,1,90000,'Belfort','6 rue de madrid'),
(NULL ,'Valentin' ,'client2', 'client2', 'client2@gmail.com',1,1,90000,'Belfort','6 rue de madrid'),
(NULL , 'Francois','client3', 'client3', 'client3@gmail.com',1,1,90000,'Belfort','6 rue de madrid');




CREATE TABLE IF NOT EXISTS commande (
  id_commande int(11) NOT NULL AUTO_INCREMENT,
  id_user int(11) NOT NULL,
  id_lieu int(11) NOT NULL,
  prix float(5,2) NOT NULL,
  date_achat date NOT NULL,
  id_etat int(11) NOT NULL,
  PRIMARY KEY (id_commande,id_user,id_lieu,id_etat)
) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;

--
-- Contraintes pour la table commande
--
ALTER TABLE commande
ADD CONSTRAINT commande_fk_1 FOREIGN KEY (id_user) REFERENCES user (id_user),
ADD CONSTRAINT commande_fk_2 FOREIGN KEY (id_etat) REFERENCES etat (id_etat);



-- --------------------------------------------------------
-- Structure de la table panier
CREATE TABLE IF NOT EXISTS panier (
  id_panier int(11) NOT NULL AUTO_INCREMENT,
  id_user int(11) NOT NULL,
  id_produit int(11) NOT NULL,
  quantite int(11) NOT NULL,
  prix float(5,2) NOT NULL,
  id_commande int(1) NOT NULL,
  dateAjoutPanier datetime NOT NULL,
  PRIMARY KEY (id_panier,id_produit,id_user)
) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;


--
-- Contraintes pour la table panier
--
ALTER TABLE panier
  ADD CONSTRAINT panier_fk_1 FOREIGN KEY (id_user) REFERENCES user (id_user),
  ADD CONSTRAINT panier_fk_2 FOREIGN KEY (id_produit) REFERENCES produit (id);



update panier set quantite = (select quantite  from (select quantite from panier where id_produit ='1' ) as x)  + 1 where panier.id_produit='1' ;