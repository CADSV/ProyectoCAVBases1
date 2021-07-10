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
INSERT INTO isabout VALUES (18,2,2);
INSERT INTO isabout VALUES (19,10,1);
INSERT INTO isabout VALUES (19,2,2);
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

-- Performer -> Stars -> Content
INSERT INTO stars VALUES (2,1,3);
INSERT INTO stars VALUES (1,2,1);
INSERT INTO stars VALUES (3,2,3);
INSERT INTO stars VALUES (1,3,1);
INSERT INTO stars VALUES (4,3,3);
INSERT INTO stars VALUES (1,4,1);
INSERT INTO stars VALUES (5,4,3);
INSERT INTO stars VALUES (1,5,1);
INSERT INTO stars VALUES (6,5,3);
INSERT INTO stars VALUES (1,6,1);
INSERT INTO stars VALUES (11,6,1);
INSERT INTO stars VALUES (1,7,1);
INSERT INTO stars VALUES (7,7,3);
INSERT INTO stars VALUES (1,8,1);
INSERT INTO stars VALUES (8,8,3);
INSERT INTO stars VALUES (1,9,1);
INSERT INTO stars VALUES (9,9,3);
INSERT INTO stars VALUES (1,10,1);
INSERT INTO stars VALUES (10,10,3);
INSERT INTO stars VALUES (1,11,1);
INSERT INTO stars VALUES (11,11,2);
INSERT INTO stars VALUES (1,12,1);
INSERT INTO stars VALUES (2,12,3);
INSERT INTO stars VALUES (1,13,1);
INSERT INTO stars VALUES (3,13,3);
INSERT INTO stars VALUES (1,14,1);
INSERT INTO stars VALUES (4,14,3);
INSERT INTO stars VALUES (1,15,1);
INSERT INTO stars VALUES (5,15,3);
INSERT INTO stars VALUES (1,16,1);
INSERT INTO stars VALUES (6,16,3);
INSERT INTO stars VALUES (1,17,1);
INSERT INTO stars VALUES (7,17,3);
INSERT INTO stars VALUES (1,18,1);
INSERT INTO stars VALUES (8,18,3);
INSERT INTO stars VALUES (1,19,1);
INSERT INTO stars VALUES (9,19,3);
INSERT INTO stars VALUES (8,20,1);
INSERT INTO stars VALUES (7,20,1);
INSERT INTO stars VALUES (11,20,2);
INSERT INTO stars VALUES (1,21,1);
INSERT INTO stars VALUES (10,21,3);
INSERT INTO stars VALUES (1,22,1);
INSERT INTO stars VALUES (2,22,3);
INSERT INTO stars VALUES (1,23,1);
INSERT INTO stars VALUES (2,23,3);
INSERT INTO stars VALUES (1,24,1);
INSERT INTO stars VALUES (3,24,3);
INSERT INTO stars VALUES (1,25,1);
INSERT INTO stars VALUES (4,25,3);
INSERT INTO stars VALUES (1,26,1);
INSERT INTO stars VALUES (5,26,3);
INSERT INTO stars VALUES (1,27,1);
INSERT INTO stars VALUES (6,27,3);
INSERT INTO stars VALUES (1,28,1);
INSERT INTO stars VALUES (7,28,3);
INSERT INTO stars VALUES (1,29,1);
INSERT INTO stars VALUES (8,29,3);
INSERT INTO stars VALUES (1,30,1);
INSERT INTO stars VALUES (9,30,3);




