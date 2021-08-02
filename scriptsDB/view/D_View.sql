-- REPORTE D: Imprima los países donde vivan usuarios que ven series con más de 10 episodios.

-- SEGUNDA ENTREGA (LISTO)

CREATE VIEW reporte_D AS
SELECT IdCountry, CountryName
FROM country
WHERE IdCountry IN

(SELECT IdCountry
FROM city
WHERE IdCity IN
                (SELECT IdCity
                FROM user
                WHERE IdUser IN
                                (SELECT IdUser
                                FROM profile
                                WHERE IdProfile IN
                                                (SELECT IdProfile
                                                FROM hasseen
                                                WHERE IdContent IN 
                                                                    (SELECT IdContent 
                                                                    FROM episode
                                                                    GROUP BY IdContent
                                                                    HAVING COUNT(IdEpisode)>10)))))
ORDER BY CountryName;


-- Otra forma de hacer la consulta

/*
SELECT country.IdCountry, (country.CountryName)
FROM country
INNER JOIN city ON country.IdCountry = city.IdCountry
INNER JOIN user ON user.IdCity = city.IdCity
INNER JOIN profile on user.IdUser = profile.IdUser
INNER JOIN hasseen on hasseen.IdProfile = profile.IdProfile
WHERE hasseen.IdContent in (SELECT IdContent 
                            FROM episode
                            GROUP BY IdContent
                            HAVING COUNT(IdEpisode)>10)
ORDER BY CountryName;*/

