-- INSERCIÓN A: 10 Usuarios registrados, de los cuales solo 5 poseen 1 solo perfil creado. Los demás poseen al menos 2.----------------------------

-- USUARIOS--
INSERT INTO user VALUES (1,1,'alejandro','alejandropestana@outlook.com','contraseña','Alejandro','Pestana',DEFAULT,12345678,'M', NULL, NULL , NULL );
INSERT INTO user VALUES (2,2,'vicente','vicentemirabal16@gmail.com','jajaja','Vicente','Mirabal',DEFAULT,12345678,'M', NULL, NULL, NULL);
INSERT INTO user VALUES (3,1,'carlos','cadoffiny.19@est.ucab.edu.ve','notelawaadecir','Carlos','Doffiny S-V',DEFAULT,12345678,'M', NULL, NULL, NULL);
INSERT INTO user VALUES (4,24,'hassan85','hassan@freepalestine.lb','hbl9158','Hassan','Nasrallah',DEFAULT,423451678,'M', NULL, NULL, NULL);
INSERT INTO user VALUES (5,3,'zoyAmerix','nosequiensoy@indefinido.com','nobinario','Amerix','Peer2peer',DEFAULT,12345678,'N/A', NULL, NULL, NULL);
INSERT INTO user VALUES (6,5,'Josefa','joseita@gmail.com','jos5648','Josefa','America',DEFAULT,98546984,'F', NULL, NULL, NULL);
INSERT INTO user VALUES (7,20,'vania25','vaniaf25@gmail.com','contrasenha','Vania','Fernandes',DEFAULT,72345678,'F', NULL, NULL, NULL);
INSERT INTO user VALUES (8,18,'greeicyFans','greeicyfanclub@mujeres.com','greeicy','Greeicy','Rendón',DEFAULT,12345678,'F', NULL, NULL, NULL);
INSERT INTO user VALUES (9,11,'albertico','albertico@eldelaeropuerto.com','123456','Alberto','Fernandes',DEFAULT,23546897,'M', NULL, NULL, NULL);
INSERT INTO user VALUES (10,28,'chinito','estonoesunmeme@piongyang.com','dictadura','Ying','Yang',DEFAULT,12345678,'M', NULL, NULL, NULL);
INSERT INTO user VALUES (11,17,'aDriana','adririvera@gmail.com','161020','Adriana','Rivera',DEFAULT,78327373,'F',NULL,NULL,NULL);
INSERT INTO user VALUES (12,9,'reyAdriano','emperador@roma.italia','romamia','Adriano','Trajano',DEFAULT,87127645,'M',NULL, NULL, NULL);


SELECT COUNT(IdProfile) FROM profile;


-- PERFILES--
INSERT INTO profile VALUES (1,1,3,'alejandro');
INSERT INTO profile VALUES (2,2,2,'vicente');
INSERT INTO profile VALUES (3,3,1,'carlos');
INSERT INTO profile VALUES (4,4,4,'hassan85');
INSERT INTO profile VALUES (5,5,5,'zoyAmerix');
INSERT INTO profile VALUES (6,6,2,'Josefa');
INSERT INTO profile VALUES (7,6,3,'María');
INSERT INTO profile VALUES (8,7,1,'vania25');
INSERT INTO profile VALUES (9,7,5,'Bebé');
INSERT INTO profile VALUES (10,8,2,'greeicyFans');
INSERT INTO profile VALUES (11,8,1,'Carlitos');
INSERT INTO profile VALUES (12,9,4,'Albertico');
INSERT INTO profile VALUES (13,9,3,'Ignacio');
INSERT INTO profile VALUES (14,9,5,'Piragua');
INSERT INTO profile VALUES (15,10,2,'chinito');
INSERT INTO profile VALUES (16,10,2,'Hong');
INSERT INTO profile VALUES (17,10,2,'Kong');
INSERT INTO profile VALUES (18,11,1,'aDriana');
INSERT INTO profile VALUES (19,11,3,'Reina');
INSERT INTO profile VALUES (20,12,5,'reyAdriano');
INSERT INTO profile VALUES (21,12,4,'Emperador');