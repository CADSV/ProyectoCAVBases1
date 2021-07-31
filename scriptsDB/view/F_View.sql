-- REPORTE F: Imprima el top 3 de series tomando en cuenta la calificación promedio de sus episodios. 

-- TERCERA ENTREGA



SELECT EpisodicContent.IdContent, EpisodicContent.TitleCont, Avg(hasseen.Rating) as AveragePromedio
FROM HasSeen
INNER JOIN episodicContent on HasSeen.IdContent = episodicContent.IdContent
GROUP BY Hasseen.IdContent
ORDER BY Avg(hasseen.Rating) DESC LIMIT 3;






