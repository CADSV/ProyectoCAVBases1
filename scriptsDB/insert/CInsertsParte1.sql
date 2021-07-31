-- INSERCIÓN C: 20 Películas, de las cuales 5 son contenido original. -------------------------------------------------------------------------------
INSERT INTO ageclass VALUES (0,'Todo público');
INSERT INTO ageclass VALUES (13,'PG-13');
INSERT INTO ageclass VALUES (18,'R');
INSERT INTO language VALUES (2,'Inglés');
INSERT INTO language VALUES (3,'Español');

INSERT INTO content VALUES (1, 18, 2);
INSERT INTO content VALUES (2, 13, 2);
INSERT INTO content VALUES (3, 13, 2);
INSERT INTO content VALUES (4, 13, 2);
INSERT INTO content VALUES (5, 13, 3);
INSERT INTO content VALUES (6, 18, 2);
INSERT INTO content VALUES (7, 18, 2);
INSERT INTO content VALUES (8, 13, 2);
INSERT INTO content VALUES (9, 18, 3);
INSERT INTO content VALUES (10, 18, 3);
INSERT INTO content VALUES (11, 18, 2);
INSERT INTO content VALUES (12, 0, 2);
INSERT INTO content VALUES (13, 13, 3);
INSERT INTO content VALUES (14, 13, 2);
INSERT INTO content VALUES (15, 13, 2);
INSERT INTO content VALUES (16, 13, 3);
INSERT INTO content VALUES (17, 13, 2);
INSERT INTO content VALUES (18, 13, 3);
INSERT INTO content VALUES (19, 0, 3);
INSERT INTO content VALUES (20, 13, 2);
INSERT INTO featurecontent VALUES (1,'Duro de Matar',1988,DEFAULT,1,'assets/thumbnails/Duro_de_matar.jpg','Una persona cuya vida es difícil de arrebatar salva al mundo','2:11:00'); -- Acción
INSERT INTO featurecontent VALUES (2,'Nomadland',2020,DEFAULT,1,'assets/thumbnails/Nomadland.jpg','Una nómada deja su hogar y viaja por los Estados Unidos','1:48:00'); -- Drama, premio Oscar mejor película
INSERT INTO featurecontent VALUES (3,'Blade Runner',1982,DEFAULT,1,'assets/thumbnails/Blade_Runner.jpg','En el futuro, la bioingeniería permite la fabricación de humanos artificiales','1:57:00'); -- Neo-noir y Ciencia ficción
INSERT INTO featurecontent VALUES (4,'Ava',2020,DEFAULT,1,'assets/thumbnails/Ava.jpg','Ava, alguna vez una militar y adicta, es una asesina a sueldo','1:37:00'); -- Acción y Suspenso
INSERT INTO featurecontent VALUES (5,'Las Desventuras de Rodrigo: La Película',2008,1,1,'assets/thumbnails/Rodrigo.jpg','Rodrigo debe luchar para sobrevivir ante los malévolos villanos que se avecinan','2:32:01'); -- Acción y Suspenso
INSERT INTO featurecontent VALUES (6,'Un Refugio Inesperado',2017,1,1,'assets/thumbnails/Refugio_inesperado.jpg','Una familia protege a los judíos en un zoológico durante la Segunda Guerra Mundial','2:07:00'); -- Actua Daniel Bruhl, Drama y Guerra
INSERT INTO featurecontent VALUES (7,'Los Infiltrados',2006,DEFAULT,1,'assets/thumbnails/Infiltrados.jpg','En Boston, la mafia y la policía chocan','2:31:00'); -- Oscar mejor película, Crimen y Suspenso
INSERT INTO featurecontent VALUES (8,'Vuela Alto',2005,DEFAULT,1,'assets/thumbnails/Volando_alto.jpg','Un superhéroe debe decidir entre salvar al mundo y salvar a su hija','2:44:00'); -- Superhéroes
INSERT INTO featurecontent VALUES (9,'¡A Correr!',2021,DEFAULT,DEFAULT,'A_correr','Ante una catástrofe, la gente debe huir','1:56:00'); -- Suspenso
INSERT INTO featurecontent VALUES (10,'¡Ayuda, Ahí Vienen!',2016,1,1,'assets/thumbnails/Ahi_vienen.jpg','Un día los zombies aparecen y destruyen a la humanidad','2:45:00'); -- Premio golden globe mejor actor, Acción y Terror
INSERT INTO featurecontent VALUES (11,'Solo en Berlín',2016,DEFAULT,1,'assets/thumbnails/Solo_en_Berlin.jpg','Drama en Berlín, durante la Segunda Guerra Mundial','1:43:00'); -- Actua Daniel Bruhl, Guerra y Drama
INSERT INTO featurecontent VALUES (12,'Incontenible',2002,1,1,'assets/thumbnails/Incontenible.jpg','Una graciosa aventura sobre un payaso y su hijo carambola','1:24:00'); -- Comedia
INSERT INTO featurecontent VALUES (13,'Cántame la Zona',1988,DEFAULT,1,'assets/thumbnails/Cantame_la_zona.jpg','Un viaje en carro se convierte en una divertida aventura','2:12:00'); -- Comedia
INSERT INTO featurecontent VALUES (14,'Tu Casa es Su Casa',2013,DEFAULT,1,'assets/thumbnails/Tu_casa_es_su_casa.jpg','Un criminal secuestra a una familia y pretende que todo está bien','2:06:00'); -- Suspenso
INSERT INTO featurecontent VALUES (15,'Mesa Verde',2001,DEFAULT,1,'assets/thumbnails/Mesa_verde.jpg','Un banco quiebra en medio de una crisis financiera','2:55:00'); -- Drama
INSERT INTO featurecontent VALUES (16,'La Base de Datos',2021,DEFAULT,1,'assets/thumbnails/BD.jpg','Un estudiante de ingeniería informática debe hacer una base de datos para guardar la información del mundo entero','2:11:00'); -- Ciencia ficción
INSERT INTO featurecontent VALUES (17,'El Señor de los Anillos: el retorno del Rey',2003,DEFAULT,1,'assets/thumbnails/Anillos.jpg','La conclusión de la trilogía del Señor de los Anillos','3:21:00'); -- Premio óscar mejor película, Aventura y Fantasía
INSERT INTO featurecontent VALUES (18,'Viaje al Sol',2005,1,1,'assets/thumbnails/Viaje_al_sol.jpg','Un grupo de astronautas debe viajar al Sol para salvar al sistema solar','2:44:00'); -- Premio Oscar mejor actor principal, Ciencia ficción y Drama
INSERT INTO featurecontent VALUES (19,'El Domingo No',2020,0,1,'assets/thumbnails/Domingo_no.jpg','Un señor quiere pasar sus domingos tranquilo, pero sus vecinos no lo dejan','2:46:00'); -- Premio Golden Globe mejor guión, Comedia y Drama
INSERT INTO featurecontent VALUES (20,'Capitán América: Civil War',2016,DEFAULT,1,'assets/thumbnails/Civil_war.jpg','Los Vengadores se pelean entre sí','2:27:00'); -- Actua Daniel Bruhl, Superhéroes
