-- INSERCIÓN J: Cada contenido posee al menos 1 género y 2 actores asociados

-- Géneros/Categorías:
INSERT INTO genre VALUES (1, 'Acción');
INSERT INTO genre VALUES (2, 'Drama');
INSERT INTO genre VALUES (3, 'Neo-noir');
INSERT INTO genre VALUES (4, 'Ciencia ficción');
INSERT INTO genre VALUES (5, 'Suspenso');
INSERT INTO genre VALUES (6, 'Guerra');
INSERT INTO genre VALUES (7, 'Crimen');
INSERT INTO genre VALUES (8, 'Superhéroes');
INSERT INTO genre VALUES (9, 'Terror');
INSERT INTO genre VALUES (10, 'Comedia');
INSERT INTO genre VALUES (11, 'Aventura');
INSERT INTO genre VALUES (12, 'Fantasía');
INSERT INTO genre VALUES (13, 'Misterio');
INSERT INTO genre VALUES (14, 'Historia');


-- Content -> IsAbout -> Genre:
-- Películas:
INSERT INTO isabout VALUES (1,1,1);
INSERT INTO isabout VALUES (2,2,1);
INSERT INTO isabout VALUES (3,3,1);
INSERT INTO isabout VALUES (3,4,2);
INSERT INTO isabout VALUES (4,1,1);
INSERT INTO isabout VALUES (4,5,2);
INSERT INTO isabout VALUES (5,1,1);
INSERT INTO isabout VALUES (5,5,2);
INSERT INTO isabout VALUES (6,2,1);
INSERT INTO isabout VALUES (6,6,2);
INSERT INTO isabout VALUES (7,7,1);
INSERT INTO isabout VALUES (7,5,2);
INSERT INTO isabout VALUES (8,8,1);
INSERT INTO isabout VALUES (9,5,1);
INSERT INTO isabout VALUES (10,1,1);
INSERT INTO isabout VALUES (10,9,2);
INSERT INTO isabout VALUES (11,6,1);
INSERT INTO isabout VALUES (11,2,2);
INSERT INTO isabout VALUES (12,10,1);
INSERT INTO isabout VALUES (13,10,1);
INSERT INTO isabout VALUES (14,5,1);
INSERT INTO isabout VALUES (14,7,2);
INSERT INTO isabout VALUES (15,2,1);
INSERT INTO isabout VALUES (16,4,1);
INSERT INTO isabout VALUES (17,11,1);
INSERT INTO isabout VALUES (17,12,2);
INSERT INTO isabout VALUES (18,4,1);
INSERT INTO isabout VALUES (19,10,1);
INSERT INTO isabout VALUES (20,8,1);

-- Series:
INSERT INTO isabout VALUES (21,5,1);
INSERT INTO isabout VALUES (21,13,2);
INSERT INTO isabout VALUES (22,2,1);
INSERT INTO isabout VALUES (23,2,1);
INSERT INTO isabout VALUES (24,7,1);
INSERT INTO isabout VALUES (24,2,2);
INSERT INTO isabout VALUES (25,2,1);
INSERT INTO isabout VALUES (26,12,1);
INSERT INTO isabout VALUES (26,11,2);
INSERT INTO isabout VALUES (27,14,1);
INSERT INTO isabout VALUES (27,2,2);
INSERT INTO isabout VALUES (28,11,1);
INSERT INTO isabout VALUES (29,2,1);
INSERT INTO isabout VALUES (29,14,1);
INSERT INTO isabout VALUES (30,2,1);
