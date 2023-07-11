create database re_gym;

\c re_gym

create table user(
    iduser serial primary key,
    username varchar(30),
    mail varchar(30),
    mdp varchar(15),
    type int
);

create table details_user(
    iddetails_user serial primary key,
    iduser int references user(iduser),
    age int,
    taille int,
    poids double precision,
    sexe varchar(10),
    adresse varchar(30),
    img varchar(50)
);

create table code(
    idcode serial primary key,
    designation varchar(20),
    valeur double precision,
    etat int
);

create table payement(
    idpayement serial primary key,
    iduser int references user(iduser),
    idcode int references code(idcode),
    etat int
);

create table prix_regime_jour(
    idprix serial primary key,
    prix double precision
);


create table type_regime(
    idtype_regime serial primary key,
    categorie varchar(10),
    nbrrepas int,
    nbrsport int,
    pourc_viande double precision,
    pourc_poisson double precision,
    pourc_volaille double precision
);

create table convention(
    idconvention serial primary key,
    poids double precision,
    categorie_regime varchar(10)
);


-- ito no notification
create table validation_transaction(
    idvalidation serial primary key,
    iduser int references user(iduser),
    idcode int references  code(idcode),
    etat int default 0
);

INSERT INTO user(iduser, username, mail, mdp, type)
VALUES
    (default, 'admin', 'admin@gmail.com', 'admin', 1),
    (default, 'User1', 'user1@gmail.com', 'password1', 0),
    (default, 'User2', 'user2@gmail.com', 'password2', 0),
    (default, 'User3', 'user3@gmail.com', 'password3', 0),
    (default, 'User4', 'user4@gmail.com', 'password4', 0);

INSERT INTO code (idcode, designation, valeur, etat)
VALUES
    (default, '830203956128502', 1000, 0),
    (default, '426395048362026', 1000, 0),
    (default, '103702715375153', 1000, 0),
    (default, '850301736411144', 1000, 0),
    (default, '750987653749506', 1000, 0),
    (default, '859302973694445', 1000, 0),
    (default, '674654131375060', 1000, 0),
    (default, '019273684050033', 1000, 0),
    (default, '123456789098764', 1000, 0),
    (default, '098765432112345', 1000, 0),
    (default, '654321678907643', 1000, 0),
    (default, '123450987612346', 1000, 0),
    (default, '098765123456899', 1000, 0),
    (default, '123456654328765', 1000, 0),
    (default, '098765430987623', 1000, 0);

create table sport(
    idsport serial primary key,
    designation varchar(20),
    categorie varchar(15),
    calorie_par_heure double precision,
    img varchar(30)
);

INSERT INTO sport(idsport, designation, categorie, calorie_par_heure, img)
VALUES
    -- maison
    (default, 'Cordes a sauter','maison', 500, 'cordesauter.jpg'),
    (default, 'Course à pied','maison', 600, 'courir.jpg'),
    (default, 'Pompes','maison', 400, 'pompes.jpg'),
    -- salle
    (default, 'Soulevé de terre','en salle', 500, 'soulevedeterre.jpg'),
    (default, 'Squats','en salle', 300, 'squat.jpg'),
    (default, 'Abdominaux','en salle', 500, 'abdo.jpg'),
    -- exterieur
    (default, 'Natation', 'exterieur', 500, 'natation.jpg'),
    (default, 'Cyclisme', 'exterieur', 400, 'velo.jpg'),
    (default, 'Football', 'exterieur', 300, 'foot.jpg');

INSERT INTO convention(idconvention, poids, categorie_regime)
VALUES
    (default, 1, 'easy'),
    (default, 1.5, 'medium'),
    (default, 2, 'hard');

CREATE TABLE plat (
    idplat SERIAL PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    categorie VARCHAR(100) NOT NULL,
    calories DECIMAL(10,2) NOT NULL,
    image VARCHAR(100)
);


INSERT INTO plat (nom,categorie, calories, image) VALUES ('Salade de poulet grillé', 'perdre',300, 'Salade_de_poulet_grillé.jpg');
INSERT INTO plat (nom,categorie, calories, image) VALUES ('Saumon poché avec légumes vapeur', 'perdre',400, 'Saumon_poché_avec_légumes_vapeur.jpg');
INSERT INTO plat (nom,categorie, calories, image) VALUES ('Wraps aux légumes', 'perdre',250, 'Wraps_aux_légumes.jpg');
INSERT INTO plat (nom,categorie, calories, image) VALUES ('Bol de quinoa aux légumes rôtis', 'perdre',350, 'Bol_de_quinoa_aux_légumes_rôtis.jpg');
INSERT INTO plat (nom,categorie, calories, image) VALUES ('Salade de crevettes et avocat', 'perdre',200, 'Salade_de_crevettes_et_avocat.jpg');
INSERT INTO plat (nom,categorie, calories, image) VALUES ('Soupe aux légumes', 'perdre',150, 'Soupe_aux_légumes.jpg');
INSERT INTO plat (nom,categorie, calories, image) VALUES ('Omelette aux légumes', 'perdre',250, 'Omelette_aux_légumes.jpg');
INSERT INTO plat (nom,categorie, calories, image) VALUES ('Poulet rôti avec légumes sautés', 'perdre',400, 'Poulet_rôti_avec_légumes_sautés.jpg');
INSERT INTO plat (nom,categorie, calories, image) VALUES ('Pâtes aux légumes grillés', 'perdre',350, 'Pâtes_aux_légumes_grillés.jpg');

INSERT INTO plat (nom, categorie, calories, image) VALUES ('Steak de boeuf', 'gagne', 400, 'Steak_de_boeuf.jpg');
INSERT INTO plat (nom, categorie, calories, image) VALUES ('Poulet grillé', 'gagne', 350, 'Poulet_grillé.jpg');
INSERT INTO plat (nom, categorie, calories, image) VALUES ('Saumon grillé', 'gagne', 300, 'Saumon_grillé.jpg');
INSERT INTO plat (nom, categorie, calories, image) VALUES ('Omelette aux légumes et fromage', 'gagne', 250, 'Omelette_aux_légumes_et_fromage.jpg');
INSERT INTO plat (nom, categorie, calories, image) VALUES ('Pâtes au pesto de basilic et poulet', 'gagne', 450, 'Pâtes_au_pesto_de_basilic_et_poulet.jpg');
INSERT INTO plat (nom, categorie, calories, image) VALUES ('Riz brun avec légumes et tofu', 'gagne', 400, 'Riz_brun_avec_légumes_et_tofu.jpg');
INSERT INTO plat (nom, categorie, calories, image) VALUES ('Smoothie protéiné aux fruits et beurre de cacahuète', 'gagne', 350, 'Smoothie_protéiné_aux_fruits_et_beurre_de_cacahuète.jpg');
INSERT INTO plat (nom, categorie, calories, image) VALUES ('Salade de quinoa avec avocat et poulet', 'gagne', 300, 'Salade_de_quinoa_avec_avocat_et_poulet.jpg');
INSERT INTO plat (nom, categorie, calories, image) VALUES ('Yaourt grec avec noix et miel', 'gagne', 200, 'Yaourt_grec_avec_noix_et_miel.jpg');

create table transaction(
    idtransaction INT AUTO_INCREMENT PRIMARY KEY,
    iduser int references user(iduser),
    money_entre double precision,
    money_sortie double precision,
    money double precision,
    temps timestamp
);

INSERT INTO transaction(iduser, money_entre, money_sortie, money, temps) values(1, 1000, 0, 0, '2023-07-11 10:45:00');
INSERT INTO transaction(iduser, money_entre, money_sortie, money, temps) values(1, 0, 800, 1000, '2023-07-11 10:50:00');
INSERT INTO transaction(iduser, money_entre, money_sortie, money, temps) values(1, 1000, 0, 200, '2023-07-11 10:55:00');
INSERT INTO transaction(iduser, money_entre, money_sortie, money, temps) values(3, 0, 0, 30000, '2023-07-11 10:55:00');

create table convention_kg(
    idconvention_kg SERIAL PRIMARY KEY,
    poids_depense_semaine DECIMAL(10,2) NOT NULL,
    categorie VARCHAR(50) NOT NULL
);


INSERT INTO convention_kg (poids_depense_semaine, categorie) VALUES (0.25, 'easy');
INSERT INTO convention_kg (poids_depense_semaine, categorie) VALUES (0.5, 'medium');
INSERT INTO convention_kg (poids_depense_semaine, categorie) VALUES (1, 'hard');


create table prix_journalier(
    idprix_journalier SERIAL PRIMARY KEY,
    prix_journalier DECIMAL(10,2) NOT NULL,
    categorie VARCHAR(50) NOT NULL
);
INSERT INTO prix_journalier (prix_journalier, categorie) VALUES (30, 'easy');
INSERT INTO prix_journalier (prix_journalier, categorie) VALUES (50, 'medium');
INSERT INTO prix_journalier (prix_journalier, categorie) VALUES (70, 'hard');

create table user_regime(
    iduser_regime serial primary key,
    iduser int references user(iduser),
    sport varchar(1000),
    objectif varchar(10) not null, -- gagner ou perdre
    gain double precision,
    debut timestamp,
    pack varchar(10),
    delai int,
    prix double precision,
    calendrier varchar(1000)
);
