-- REPORTE B: ¿Cuál es el usuario que ha visto más episodios de series originales? 
-- Imprimir la información del usuario, de dónde es y la cantidad de episodios vistos. 

-- SEGUNDA ENTREGA (LISTO)



CREATE VIEW reporte_B AS
SELECT U.IdUser, U.Username, U.NameUser, U.LastNameUser, U.UserIsSuscribed, Ci.CityName, Co.CountryName, SUM(H.TimesSeen) AS NumEp
FROM User AS U, City As Ci, Country AS Co, HasSeen AS H, Profile AS P, EpisodicContent AS E
WHERE (U.IdCity = Ci.IdCity) AND (Ci.IdCountry = Co.IdCountry) AND (U.IdUser = P.IdUser) AND (P.IdProfile = H.IdProfile) AND (H.IdContent = E.IdContent) AND (E.IsOriginalCont = 1) AND
    (U.IdUser = (SELECT PD.IdUser
                FROM (SELECT P.IdUser
                      FROM User as U, City as C, EpisodicContent as E, HasSeen as H, Profile as P
                      WHERE (U.IdCity = C.IdCity) AND (U.IdUser = P.IdUser) AND (P.IdProfile = H.IdProfile) AND (H.IdContent = E.IdContent) AND (E.IsOriginalCont = 1)) AS PD  -- PD: Profiles Data
                GROUP BY PD.IdUser 
                HAVING COUNT(PD.IdUser) = (SELECT MAX(myTable.myCount)
                                          FROM (  SELECT COUNT(PD.IdUser) as myCount
                                                  FROM (SELECT P.IdUser
                                                        FROM User as U, City as C, EpisodicContent as E, HasSeen as H, Profile as P
                                                        WHERE (U.IdCity = C.IdCity) AND (U.IdUser = P.IdUser) AND (P.IdProfile = H.IdProfile) AND (H.IdContent = E.IdContent) AND (E.IsOriginalCont = 1) ) as PD
                                                  GROUP BY PD.IdUser) as myTable)) ) ;


