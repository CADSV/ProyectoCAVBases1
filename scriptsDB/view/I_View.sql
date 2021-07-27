-- REPORTE I: Imprima el top 3 de películas más vistas por los usuarios machirulos.

-- SEGUNDA ENTREGA

CREATE VIEW reporte_I AS
SELECT FeatureContent.TitleCont, COUNT(HasSeen.IdContent)
FROM HasSeen
INNER JOIN FeatureContent ON HasSeen.IdContent = FeatureContent.IdContent
INNER JOIN Profile ON HasSeen.IdProfile = Profile.IdProfile
INNER JOIN User ON Profile.IdUser = User.IdUser
WHERE User.UserGender = 'M'
GROUP BY HasSeen.IdProfile
ORDER BY COUNT(HasSeen.IdContent) DESC
LIMIT 3
