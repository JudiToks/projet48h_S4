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

create table sport(
    idsport serial primary key,
    designation varchar(20),
    categorie varchar(15),
    calorie_par_heure double precision,
    img varchar(15)
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

create table transaction(
    idtransaction serial primary key,
    iduser int references user(iduser),
    money_entre double precision,
    money_sortie double precision,
    money double precision,
    temps timestamp
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
    (default, 10, 'easy'),
    (default, 15, 'medium'),
    (default, 20, 'hard');

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

