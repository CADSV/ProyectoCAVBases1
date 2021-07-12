-- INSERCIÓN A: 10 Usuarios registrados, de los cuales solo 5 poseen 1 solo perfil creado. Los demás poseen al menos 2.----------------------------

-- USUARIOS--
INSERT INTO user VALUES (1,2,'alejandro','alejandropestana@outlook.com','ad34fa31d862f743f0edd3b83c91417668165a9b9bdb56737fb8c0ab4a8b7a11c66ea8cb235448b8b67c6e28edc2a97f92894adfcd6d6e48eb4ebd148894395d','Alejandro','Pestana',DEFAULT,4247652471,'M', NULL, NULL , NULL );
INSERT INTO user VALUES (2,3,'vicente','vicentemirabal16@gmail.com','ad34fa31d862f743f0edd3b83c91417668165a9b9bdb56737fb8c0ab4a8b7a11c66ea8cb235448b8b67c6e28edc2a97f92894adfcd6d6e48eb4ebd148894395d','Vicente','Mirabal',DEFAULT,4129886511,'M', NULL, NULL, NULL);
INSERT INTO user VALUES (3,2,'carlos','cadoffiny.19@est.ucab.edu.ve','ad34fa31d862f743f0edd3b83c91417668165a9b9bdb56737fb8c0ab4a8b7a11c66ea8cb235448b8b67c6e28edc2a97f92894adfcd6d6e48eb4ebd148894395d','Carlos','Doffiny S-V',DEFAULT,4241455809,'M', NULL, NULL, NULL);
INSERT INTO user VALUES (4,25,'hassan85','hassan@freepalestine.lb','ad34fa31d862f743f0edd3b83c91417668165a9b9bdb56737fb8c0ab4a8b7a11c66ea8cb235448b8b67c6e28edc2a97f92894adfcd6d6e48eb4ebd148894395d','Hassan','Nasrallah',DEFAULT,416983643,'M', NULL, NULL, NULL);
INSERT INTO user VALUES (5,4,'zoyAmerix','nosequiensoy@indefinido.com','ad34fa31d862f743f0edd3b83c91417668165a9b9bdb56737fb8c0ab4a8b7a11c66ea8cb235448b8b67c6e28edc2a97f92894adfcd6d6e48eb4ebd148894395d','Amerix','Peer2peer',DEFAULT,4127659900,'N/A', NULL, NULL, NULL);
INSERT INTO user VALUES (6,6,'Josefa','joseita@gmail.com','ad34fa31d862f743f0edd3b83c91417668165a9b9bdb56737fb8c0ab4a8b7a11c66ea8cb235448b8b67c6e28edc2a97f92894adfcd6d6e48eb4ebd148894395d','Josefa','America',DEFAULT,4148782255,'F', NULL, NULL, NULL);
INSERT INTO user VALUES (7,21,'vania25','vaniaf25@gmail.com','ad34fa31d862f743f0edd3b83c91417668165a9b9bdb56737fb8c0ab4a8b7a11c66ea8cb235448b8b67c6e28edc2a97f92894adfcd6d6e48eb4ebd148894395d','Vania','Fernandes',DEFAULT,4167826621,'F', NULL, NULL, NULL);
INSERT INTO user VALUES (8,19,'greeicyFans','greeicyfanclub@mujeres.com','ad34fa31d862f743f0edd3b83c91417668165a9b9bdb56737fb8c0ab4a8b7a11c66ea8cb235448b8b67c6e28edc2a97f92894adfcd6d6e48eb4ebd148894395d','Greeicy','Rendón',DEFAULT,4240014257,'F', NULL, NULL, NULL);
INSERT INTO user VALUES (9,12,'albertico','albertico@eldelaeropuerto.com','ad34fa31d862f743f0edd3b83c91417668165a9b9bdb56737fb8c0ab4a8b7a11c66ea8cb235448b8b67c6e28edc2a97f92894adfcd6d6e48eb4ebd148894395d','Alberto','Fernandes',DEFAULT,4128752983,'M', NULL, NULL, NULL);
INSERT INTO user VALUES (10,29,'chinito','estonoesunmeme@piongyang.com','ad34fa31d862f743f0edd3b83c91417668165a9b9bdb56737fb8c0ab4a8b7a11c66ea8cb235448b8b67c6e28edc2a97f92894adfcd6d6e48eb4ebd148894395d','Ying','Yang',DEFAULT,4147123131,'M', NULL, NULL, NULL);
INSERT INTO user VALUES (11,18,'aDriana','adririvera@gmail.com','ad34fa31d862f743f0edd3b83c91417668165a9b9bdb56737fb8c0ab4a8b7a11c66ea8cb235448b8b67c6e28edc2a97f92894adfcd6d6e48eb4ebd148894395d','Adriana','Rivera',DEFAULT,78327373,'F',NULL,NULL,NULL);
INSERT INTO user VALUES (12,10,'reyAdriano','emperador@roma.italia','ad34fa31d862f743f0edd3b83c91417668165a9b9bdb56737fb8c0ab4a8b7a11c66ea8cb235448b8b67c6e28edc2a97f92894adfcd6d6e48eb4ebd148894395d','Adriano','Trajano',DEFAULT,87127645,'M',NULL, NULL, NULL);


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