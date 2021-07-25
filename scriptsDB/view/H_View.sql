-- REPORTE H: Liste toda la información de las usuarias que tengan en su nombre la cadena “aDRi”, tengan una 
-- suscripción activa y hayan visto al menos 2 contenidos que requieran suscripción.

-- SEGUNDA ENTREGA (LISTO)
CREATE VIEW reporte_H AS
SELECT U.IdUser, U.Username, U.NameUser, U.UserIsSuscribed, U.UserGender, Ci.CityName, U.UserAvenueStreet, U.UserBuildingHouse
FROM User AS U, City As Ci
WHERE (U.NameUser LIKE '%aDRi%') AND (U.IdCity = Ci.IdCity)
        AND  (U.UserIsSuscribed=1)
        AND  (U.IdUser IN
                    (SELECT IdUser
                    FROM profile
                    WHERE IdProfile IN
                                    (SELECT IdProfile
                                    FROM hasseen
                                    WHERE IdContent IN
                                                        (SELECT IdContent
                                                        FROM EpisodicContent
                                                        WHERE  ReqSusCont=1)         
                                                        UNION  
                                                        (SELECT IdContent
                                                        FROM FeatureContent
                                                        WHERE  ReqSusCont=1) )))
ORDER BY U.IdUser;