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
                                                                    HAVING COUNT(IdEpisode)>10)))));

