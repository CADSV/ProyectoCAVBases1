-- REPORTE F: Imprima el top 3 de series tomando en cuenta la calificación promedio de sus episodios. 

-- TERCERA ENTREGA


CREATE VIEW reporte_F AS
SELECT EpisodicContent.IdContent, EpisodicContent.TitleCont, CAST(Avg(hasseen.Rating) AS DECIMAL(10,2)) as CalificacionAvg
FROM HasSeen
INNER JOIN episodicContent on HasSeen.IdContent = episodicContent.IdContent
GROUP BY Hasseen.IdContent
ORDER BY Avg(hasseen.Rating) DESC 
LIMIT 3;






