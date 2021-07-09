--REPORTE A: Películas que duren más de 2 horas y media, sean de drama, que hayan ganado un premio
-- y su calificación promedio es mayor o igual 4, ordenadas cronológicamente por el año de lanzamiento.

INSERT INTO award VALUES (15,NULL,2002,'BAFTA Mejor Diseño de Producción');


SELECT * FROM featurecontent 
WHERE FeatureRunTime >= '02:30:00';

SELECT * FROM isabout
WHERE IdGenre = (SELECT IdGenre FROM genre
                WHERE GenreName = 'Drama');


SELECT  * FROM featurecontent
WHERE IdContent IN (SELECT IdContent FROM award);


SELECT COUNT (Rating) FROM hasseen
WHERE (Rating != NULL) AND IdContent = (SELECT IdContent FROM featurecontent
                                        WHERE );

SELECT SUM (Rating) FROM hasseen
WHERE (Rating != NULL) AND IdContent = (SELECT IdContent FROM featurecontent
                                        WHERE );

ORDER BY ReleaseYearCont;