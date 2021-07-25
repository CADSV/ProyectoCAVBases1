-- REPORTE H: Liste toda la información de las usuarias que tengan en su nombre la cadena “aDRi”, tengan una 
-- suscripción activa y hayan visto al menos 2 contenidos que requieran suscripción.

-- SEGUNDA ENTREGA (LISTO)
CREATE VIEW reporteH AS
SELECT *
FROM user
WHERE (NameUser LIKE '%aDRi%') 
        AND  UserIsSuscribed=1
        AND  IdUser IN
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
                                                        WHERE  ReqSusCont=1) ));