-- REPORTE G: Imprima toda la información del contenido película que tenga una calificación 
-- mayor al promedio de películas y haya actuado “Daniel Brühl”.

-- TERCERA ENTREGA

CREATE VIEW reporte_G AS
SELECT TitleCont, ReleaseYearCont, IsOriginalCont, ReqSusCont, FeatureRunTime, Description, Rating
FROM FeatureContent
INNER JOIN HasSeen ON FeatureContent.IdContent = HasSeen.IdContent
INNER JOIN Stars ON FeatureContent.IdContent = Stars.IdContent 
INNER JOIN FilmWorker ON Stars.IdWorker = FilmWorker.IdWorker
INNER JOIN Performer ON FilmWorker.IdWorker = Performer.IdWorker
WHERE WorkerName = "Daniel" AND WorkerLastName = "Brühl"
HAVING Rating > (SELECT AVG(Rating) -- Se debe hacer subconsulta para obtener el promedio de todas las películas en general
                 FROM HasSeen
                 INNER JOIN FeatureContent ON HasSeen.IdContent = FeatureContent.IdContent)
ORDER BY Rating DESC