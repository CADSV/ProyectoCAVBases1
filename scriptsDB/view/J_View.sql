-- REPORTE  J. Liste los usuarios con suscripción activa del plan Premium y del plan VIP, que tengan asociados al menos 2 perfiles.

-- ENTREGADO

CREATE VIEW reporte_J AS
SELECT Profile.IdUser, COUNT(IdProfile), User.Username, Membership.MembershipName
FROM Profile
INNER JOIN User ON Profile.IdUser = User.IdUser
INNER JOIN IsSuscribed ON User.IdUser = IsSuscribed.IdUser
INNER JOIN Membership ON IsSuscribed.IdMembership = Membership.IdMembership
WHERE User.IdUser IN
	(SELECT IdUser 
	FROM IsSuscribed
	WHERE IdMembership >=2 AND EndDateSus IS NULL
	) 
GROUP BY IdUser
HAVING COUNT(IdProfile) >= 2
ORDER BY COUNT(IdProfile);

