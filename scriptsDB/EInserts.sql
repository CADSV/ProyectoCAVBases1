-- INSERCIÓN E: Solo 7 usuarios han hecho formal su inscripción.----------------------------------------------------------------

--PaymentCard--
INSERT INTO paymentcard VALUES (6276559076321199,123,'Alejandro','Pestana','2025-11-11');
INSERT INTO paymentcard VALUES (1122334455667788,000,'Vicente','Mirabal','2022-07-24');
INSERT INTO paymentcard VALUES (0102030405060708,858, 'Carlos', 'Doffiny S-V','2023-08-15');
INSERT INTO paymentcard VALUES (9900886673651286,112,'Josefa','America','2021-12-21');
INSERT INTO paymentcard VALUES (7624541287976542,075,'Greeicy','Rendón','2023-07-04');
INSERT INTO paymentcard VALUES (0001000200030004,666,'Ying','Yang','2100-01-01');
INSERT INTO paymentcard VALUES (1878126903615428,163,'Hassan','Nasrallah','2025-10-27');


--IsSuscribed--
INSERT INTO issuscribed VALUES (1,3,123,6276559076321199,'2021-07-08 14:01:01',NULL);
UPDATE user SET UserIsSuscribed = 1 WHERE IdUser = 1;

INSERT INTO issuscribed VALUES (2,3,000,1122334455667788,'2021-07-08 14:01:01',NULL);
UPDATE user SET UserIsSuscribed = 1 WHERE IdUser = 2;

INSERT INTO issuscribed VALUES (3,3,858,0102030405060708,'2021-07-08 14:01:01',NULL); 
UPDATE user SET UserIsSuscribed = 1 WHERE IdUser = 3;

INSERT INTO issuscribed VALUES (6,1,112,9900886673651286,'2021-10-18 23:13:56',NULL); 
UPDATE user SET UserIsSuscribed = 1 WHERE IdUser = 6;

INSERT INTO issuscribed VALUES (8,3,075,7624541287976542,'2021-08-15 00:00:01',NULL); 
UPDATE user SET UserIsSuscribed = 1 WHERE IdUser = 8;

INSERT INTO issuscribed VALUES (10,2,666,0001000200030004,'2022-01-03 09:53:27',NULL); --
UPDATE user SET UserIsSuscribed = 1 WHERE IdUser = 10;

INSERT INTO issuscribed VALUES (4,3,163,1878126903615428,'2021-07-11 22:22:01',NULL);
UPDATE user SET UserIsSuscribed = 1 WHERE IdUser = 4;-- INSERCIÓN E: Solo 7 usuarios han hecho formal su inscripción.