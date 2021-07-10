-- REPORTE J: Liste los usuarios con suscripción activa que tengan asociados al menos 2 perfiles en su cuenta y hayan visto menos de dos películas de suspenso. (Suscripción)

CREATE VIEW reporteJ AS
SELECT Profile.IdUser, COUNT(IdProfile), User.Username, User.EmailUser
FROM Profile
INNER JOIN User ON Profile.IdUser = User.IdUser
GROUP BY IdUser
HAVING COUNT(IdProfile) >= 2
ORDER BY COUNT(IdProfile)