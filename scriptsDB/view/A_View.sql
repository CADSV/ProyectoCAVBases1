--REPORTE A: Películas que duren más de 2 horas y media, sean de drama, que hayan ganado un premio
-- y su calificación promedio es mayor o igual 4, ordenadas cronológicamente por el año de lanzamiento.

INSERT INTO award VALUES (19,NULL,2002,'BAFTA Mejor Diseño de Producción');

INSERT INTO hasseen VALUES (1, 15, CURRENT_TIMESTAMP, 4.2, DEFAULT, DEFAULT, '2:55:00', '2:55:00');
INSERT INTO hasseen VALUES (2, 15, CURRENT_TIMESTAMP, 5, DEFAULT, DEFAULT, '2:54:04', '2:54:04');
INSERT INTO hasseen VALUES (3, 16, CURRENT_TIMESTAMP, 3, DEFAULT, DEFAULT, '1:00:04', '1:00:04');
INSERT INTO hasseen VALUES (4, 17, CURRENT_TIMESTAMP, NULL, DEFAULT, DEFAULT, '0:52:11', '0:52:11');



CREATE VIEW reporteA AS;

SELECT * FROM featurecontent 
WHERE ((FeatureRunTime >= '02:30:00') AND (IdContent IN (SELECT IdContent FROM award)) 
AND (IdContent = (SELECT IdContent FROM genre WHERE GenreName = 'Drama')) 
AND (IdContent IN ())
);
AND ( 4.0 <= (SELECT AVG(Rating) FROM hasseen WHERE IdContent = (SELECT IdContent FROM featurecontent WHERE IdContent = 15)))
);



SELECT * FROM isabout
WHERE IdContent = (SELECT IdContent FROM genre
                WHERE GenreName = 'Drama');


SELECT  * FROM featurecontent
WHERE IdContent IN (SELECT IdContent FROM award);


SELECT COUNT (Rating) FROM hasseen
WHERE IdContent = (SELECT IdContent FROM featurecontent
                                        WHERE IdContent = 15);

SELECT AVG(Rating) FROM hasseen
WHERE IdContent = (SELECT IdContent FROM featurecontent
                                        WHERE IdContent = 15);



ORDER BY ReleaseYearCont;