-- REPORTE A: Películas que duren más de 2 horas y media, sean de drama, que hayan ganado un premio
-- y su calificación promedio es mayor o igual 4, ordenadas cronológicamente por el año de lanzamiento.

-- TERCERA ENTREGA (LISTO)

CREATE VIEW reporte_A AS
SELECT F.IdContent, F.TitleCont, A.AwardName, A.WinningYear, AVG(H.Rating) AS CalificacionAvg, F.ReleaseYearCont
FROM FeatureContent AS F
INNER JOIN IsAbout AS I ON (F.IdContent = I.IdContent)
INNER JOIN Genre AS G ON (I.IdGenre = G.IdGenre)
INNER JOIN Award AS A ON (F.IdContent = A.IdContent)
INNER JOIN HasSeen AS H ON (F.IdContent = H.IdContent)
WHERE (F.FeatureRunTime >= '02:30:00') AND (G.GenreName = 'Drama') AND
(F.IdContent IN (SELECT IdContent FROM award))
GROUP BY H.IdContent
HAVING AVG(H.Rating) >= 4.0
ORDER BY F.ReleaseYearCont;




