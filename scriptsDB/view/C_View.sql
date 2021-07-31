-- REPORTE C: Liste los 5 usuarios que más hayan visto películas recomendadas por el sistema,
-- ordenando descendentemente por la cantidad de películas recomendadas vistas.

-- TERCERA ENTREGA
SELECT User.IdUser,  User.NameUser,  SUM(HasSeen.TimesSeen) AS NumVisualizaciones
FROM HasSeen
INNER JOIN Featurecontent ON HasSeen.IdContent = FeatureContent.IdContent
INNER JOIN Profile ON HasSeen.IdProfile = Profile.IdProfile
INNER JOIN User ON Profile.IdUser = User.IdUser
WHERE HasSeen.WatchedByRecomm = true
GROUP BY User.IdUser
ORDER BY SUM(HasSeen.TimesSeen) DESC
LIMIT 5;
