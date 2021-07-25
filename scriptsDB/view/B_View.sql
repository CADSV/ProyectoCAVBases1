-- REPORTE B: ¿Cuál es el usuario que ha visto más episodios de series originales? 
-- Imprimir la información del usuario, de dónde es y la cantidad de episodios vistos. 

-- SEGUNDA ENTREGA



CREATE VIEW reporteB AS;


SELECT u.Username, u.EmailUser, u.NameUser, u.LastNameUser, u.UserGender, u.UserIsSuscribed, u.UserPhone, u.UserPostalCode, u.UserAvenueStreet, u.UserBuildingHouse, c.CityName, h.TimesSeen
FROM user as u, city as c, episodicContent as e, hasseen as h, profile as p
WHERE ;



SELECT * FROM user;


SELECT IdUser FROM hasseen
GROUP BY IdUser
HAVING ;

SELECT SUM(TimesSeen)
FROM hasseen
GROUP BY IdProfile
HAVING IdContent IN (SELECT IdContent FROM episodiccontent WHERE IsOriginalCont = 1);

