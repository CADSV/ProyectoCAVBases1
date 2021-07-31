
---------------------------------------------------------------------------------
---------------------------------------------------------------------------------
-- DEFAULT INSERTS

INSERT INTO subtitle VALUES ('Arial', 12);
INSERT INTO subtitle VALUES ('Arial', 14);

INSERT INTO subtitle VALUES ('Sans-Serif', 12);
INSERT INTO subtitle VALUES ('Sans-Serif', 14);
INSERT INTO subtitle VALUES ('Helvetica', 12);
INSERT INTO subtitle VALUES ('Helvetica', 14);

INSERT INTO country VALUES(1,'Desconocido');
INSERT INTO city VALUES(1,1,'Desconocido');
INSERT INTO language VALUES(1, 'Desconocido');
-- INSERT INTO ageclass VALUES(0,'Todo público');




-----------------------------------------------------------------------------------
-- HasSeen
----------------------------------------------------------------------------------



INSERT INTO hasseen VALUES (1,4,'2021-04-15 03:14:05',4,1,2,'00:25:59','00:40:59');
INSERT INTO hasseen VALUES (1,5,'2020-12-17 03:18:05',3,0,2,'00:23:59','00:50:59');
INSERT INTO hasseen VALUES (2,9,'2019-04-13 09:14:05',5,0,2,'00:25:59','00:30:59');
INSERT INTO hasseen VALUES (2,11,'2021-01-19 08:17:05',4,1,2,'00:45:59','00:10:59');
INSERT INTO hasseen VALUES (3,12,'2021-01-18 07:14:05',3,1,2,'00:22:59','00:20:59');
INSERT INTO hasseen VALUES (3,8,'2020-03-12 09:14:05',2,0,2,'00:15:59','00:50:59');
INSERT INTO hasseen VALUES (3,6,'2021-03-15 08:30:05',5,1,2,'00:16:59','00:20:59');
INSERT INTO hasseen VALUES (6,9,'2019-09-04 07:14:05',2,0,2,'00:17:59','00:30:59');
INSERT INTO hasseen VALUES (6,7,'2021-03-03 05:45:05',3,1,2,'00:18:59','00:40:59');
INSERT INTO hasseen VALUES (6,5,'2021-03-20 05:14:05',1,1,2,'00:52:59','00:20:59');



INSERT INTO hasseen VALUES (12,24,'2019-09-04 07:14:05',2,0,4,'00:17:59','01:30:59');
INSERT INTO hasseen VALUES (12,22,'2021-03-03 05:45:05',5,1,3,'00:18:59','00:40:59');
INSERT INTO hasseen VALUES (13,22,'2019-09-04 07:14:05',5,0,2,'00:17:59','01:30:59');
INSERT INTO hasseen VALUES (14,21,'2019-09-04 07:14:05',5,1,6,'00:17:59','01:30:59');
INSERT INTO hasseen VALUES (15,23,'2021-03-03 05:45:05',3,1,3,'00:18:59','01:40:59');
INSERT INTO hasseen VALUES (15,26,'2021-03-20 05:14:05',1,1,3,'00:52:59','00:20:59');
INSERT INTO hasseen VALUES (18,28,'2019-09-04 07:14:05',4,0,4,'00:17:59','01:30:59');
INSERT INTO hasseen VALUES (18,29,'2021-03-03 05:45:05',3,1,8,'00:18:59','00:40:59');
INSERT INTO hasseen VALUES (21,27,'2021-04-02 06:32:05',NULL,0,1,'00:1:23','00:1:23');
INSERT INTO hasseen VALUES (8,27,'2020-08-09 05:01:15',1,0,1,'00:19:23','00:19:23');
INSERT INTO hasseen VALUES (18,30,'2021-03-20 05:14:05',4,1,9,'00:52:59','01:20:59');

-- -------Agregados

INSERT INTO hasseen VALUES (12,27,'2021-05-02 06:32:05',NULL,0,4,'00:1:23','01:00:40');
INSERT INTO hasseen VALUES (12,28,'2020-08-09 05:01:15',1,0,3,'00:19:23','00:19:23');
INSERT INTO hasseen VALUES (12,30,'2021-06-20 05:14:05',4,1,6,'00:52:59','01:20:59');

INSERT INTO hasseen VALUES (13,25,'2021-05-02 06:32:05',NULL,0,4,'00:1:23','00:40:40');
INSERT INTO hasseen VALUES (13,24,'2020-08-09 05:01:15',1,0,3,'00:19:23','00:19:23');
INSERT INTO hasseen VALUES (15,30,'2021-06-20 05:14:05',4,1,6,'00:52:59','00:48:59');
INSERT INTO hasseen VALUES (15,29,'2021-06-20 05:14:05',4,1,6,'00:52:59','00:53:59');

INSERT INTO hasseen VALUES (16,15,'2021-06-20 05:14:05',4,1,1,'01:20:59','01:10:59');
INSERT INTO hasseen VALUES (16,3,'2021-06-20 05:14:05',4,1,1,'01:00:59','00:20:59');

INSERT INTO hasseen VALUES (17,18,'2021-02-20 05:14:05',4,1,1,'01:20:59','01:10:59');
INSERT INTO hasseen VALUES (17,4,'2021-04-20 05:14:05',4,1,1,'01:00:59','00:20:59');
INSERT INTO hasseen VALUES (21,16,'2021-06-23 05:14:05',4,1,1,'01:20:59','01:10:59');
INSERT INTO hasseen VALUES (21,14,'2021-06-25 05:14:05',4,1,1,'01:00:59','00:20:59');

INSERT INTO hasseen VALUES (13,4,'2021-01-20 18:10:05',4,1,1,'01:20:59','00:19:59');
INSERT INTO hasseen VALUES (21,4,'2020-03-20 07:10:05',4,1,1,'01:20:59','00:19:59');
INSERT INTO hasseen VALUES (15,4,'2019-08-10 09:14:05',4,1,1,'01:20:59','00:50:59');
INSERT INTO hasseen VALUES (12,4,'2021-06-23 05:14:05',4,1,1,'01:20:59','01:10:59');
INSERT INTO hasseen VALUES (16,4,'2021-06-23 05:14:05',4,1,1,'01:20:59','00:30:59');
INSERT INTO hasseen VALUES (21,15,'2018-10-25 05:14:05',4,1,1,'01:00:59','00:20:59');
INSERT INTO hasseen VALUES (15,15,'2017-02-23 05:14:05',4,1,1,'01:00:59','00:20:59');
INSERT INTO hasseen VALUES (17,15,'2021-08-77 05:14:05',4,1,1,'01:00:59','00:20:59');
INSERT INTO hasseen VALUES (13,15,'2017-03-20 07:14:05',4,1,1,'01:20:59','01:05:59');
INSERT INTO hasseen VALUES (13,16,'2016-10-20 07:14:05',4,1,1,'01:20:59','01:05:59');
INSERT INTO hasseen VALUES (17,16,'2020-07-20 07:14:05',4,1,1,'01:20:59','00:55:59');

INSERT INTO hasseen VALUES (12,16,'2021-12-20 07:14:05',4,1,1,'01:20:59','01:23:59');
INSERT INTO hasseen VALUES (19,19,'2021-03-20 05:14:05',4.5,1,9,'00:52:59','01:20:59');
-- ----------------------------------------------------------------------------------
-- Award
-- ----------------------------------------------------------------------------------

INSERT INTO award VALUES (6,1,2015,'OSCAR');
INSERT INTO award VALUES (7,2,2015,'EMMY');
INSERT INTO award VALUES (8,3,2015,'GRAMMY');
INSERT INTO award VALUES (9,4,2016,'OSCAR');
INSERT INTO award VALUES (10,5,2015,'GOLDEN');
INSERT INTO award VALUES (12,6,2017,'OSCAR');
INSERT INTO award VALUES (13,7,2018,'EMMY');
INSERT INTO award VALUES (14,8,2016,'GOLDEN');
INSERT INTO award VALUES (15,9,2012,'OSCAR');
INSERT INTO award VALUES (18,10,2018,'OSCAR');
INSERT INTO award VALUES (19,11,2021,'BAFTA');



-- ----------------------------------------------------------------------------------
-- Blocked
-- ----------------------------------------------------------------------------------
INSERT INTO blocked VALUES (1,11,1);
INSERT INTO blocked VALUES (2,9,1);
INSERT INTO blocked VALUES (12,5,1);
INSERT INTO blocked VALUES (6,24,1);
INSERT INTO blocked VALUES (3,15,1);
INSERT INTO blocked VALUES (15,18,1);
INSERT INTO blocked VALUES (18,15,1);

INSERT INTO blocked VALUES (7,4,1);
INSERT INTO blocked VALUES (11,7,1);
INSERT INTO blocked VALUES (13,14,1);
INSERT INTO blocked VALUES (14,18,1);


-- ----------------------------------------------------------------------------------
-- Configurate
-- ----------------------------------------------------------------------------------
INSERT INTO configurate VALUES (1,3,0,'Arial',12,'2020-07-11 22:22:01');
INSERT INTO configurate VALUES (3,2,0,'Arial',12,'2021-07-11 18:22:01');
INSERT INTO configurate VALUES (2,2,13,'Helvetica',12,'2019-03-16 05:22:01');
INSERT INTO configurate VALUES (6,3,18,'Helvetica',12,'2018-04-05 09:00:01');
INSERT INTO configurate VALUES (13,3,18,'Sans-Serif',12,'2021-07-24 13:22:01');
INSERT INTO configurate VALUES (15,2,0,'Arial',12,'2021-16-12 15:40:02');
INSERT INTO configurate VALUES (18,3,13,'Sans-Serif',12,'2021-07-10 14:22:30');

INSERT INTO configurate VALUES (4,3,18,'Helvetica',12,'2017-01-05 09:00:01');
INSERT INTO configurate VALUES (5,2,18,'Sans-Serif',14,'2021-05-24 14:22:01');
INSERT INTO configurate VALUES (11,2,0,'Arial',14,'2021-15-11 17:40:02');
INSERT INTO configurate VALUES (14,3,13,'Sans-Serif',12,'2021-02-10 18:22:30');


-- ----------------------------------------------------------------------------------
-- Watchlist
-- ----------------------------------------------------------------------------------
INSERT INTO watchlist VALUES (1,7);
INSERT INTO watchlist VALUES (1,6);
INSERT INTO watchlist VALUES (1,8);
INSERT INTO watchlist VALUES (1,15);
INSERT INTO watchlist VALUES (3,7);
INSERT INTO watchlist VALUES (3,18);
INSERT INTO watchlist VALUES (4,15);
INSERT INTO watchlist VALUES (4,7);
INSERT INTO watchlist VALUES (6,3);
INSERT INTO watchlist VALUES (6,12);
INSERT INTO watchlist VALUES (6,14);
INSERT INTO watchlist VALUES (15,1);
INSERT INTO watchlist VALUES (18,3);
INSERT INTO watchlist VALUES (17,7);
INSERT INTO watchlist VALUES (16,14);

-- ----------------------------------------------------------------------------------
-- Device
-- ----------------------------------------------------------------------------------
INSERT INTO device VALUES (1,'Movil');
INSERT INTO device VALUES (2,'Web');

-- ----------------------------------------------------------------------------------
-- Session
-- ----------------------------------------------------------------------------------
INSERT INTO session VALUES (1,1,'2021-04-15 3:14:16','1:36:04');
INSERT INTO session VALUES (1,1,'2020-12-17 03:18:05','2:36:04');
INSERT INTO session VALUES (2,1,'2019-04-13 09:14:05','1:10:04');
INSERT INTO session VALUES (2,1,'2021-01-19 08:17:05','0:46:04');
INSERT INTO session VALUES (3,2,'2021-03-15 08:30:05','1:36:04');
INSERT INTO session VALUES (3,2,'2020-03-12 09:14:05','2:36:03');-- 
INSERT INTO session VALUES (3,2,'2021-01-18 07:14:05','1:38:58');
INSERT INTO session VALUES (6,2,'2021-03-20 05:14:05','1:26:47');
INSERT INTO session VALUES (6,2,'2021-03-03 05:45:05','1:10:36');
INSERT INTO session VALUES (6,1,'2019-09-04 07:14:05','1:00:25');
INSERT INTO session VALUES (9,1,'2021-03-03 05:45:05','2:05:24');
INSERT INTO session VALUES (9,2,'2019-09-04 07:14:05','0:50:02');
INSERT INTO session VALUES (9,1,'2019-09-04 07:14:05','1:48:03');
INSERT INTO session VALUES (10,2,'2021-03-03 05:45:05','0:48:04');
INSERT INTO session VALUES (10,1,'2021-03-20 05:14:05','2:25:08');
INSERT INTO session VALUES (11,1,'2019-09-04 07:14:05','3:26:38');
INSERT INTO session VALUES (11,1,'2021-03-03 05:45:05','1:32:28');
INSERT INTO session VALUES (11,1,'2021-03-20 05:14:05','2:50:16');

-- ----------------------------------------------------------------------------------
-- hasseenof
-- ----------------------------------------------------------------------------------


INSERT INTO hasseenof VALUES (1,1,2,'1:40:04');
INSERT INTO hasseenof VALUES (1,5,2,'2:36:54');
INSERT INTO hasseenof VALUES (2,5,1,'1:20:34');
INSERT INTO hasseenof VALUES (2,2,1,'1:18:23');
INSERT INTO hasseenof VALUES (2,6,1,'1:12:08');

INSERT INTO hasseenof VALUES (3,2,1,'1:08:05');
INSERT INTO hasseenof VALUES (3,6,1,'1:07:13');
INSERT INTO hasseenof VALUES (3,8,1,'1:15:12');
INSERT INTO hasseenof VALUES (3,10,1,'1:14:16');

INSERT INTO hasseenof VALUES (6,2,1,'1:23:15');
INSERT INTO hasseenof VALUES (6,6,1,'1:18:26');
INSERT INTO hasseenof VALUES (6,5,2,'3:04:25');
INSERT INTO hasseenof VALUES (6,7,1,'1:36:32');

INSERT INTO hasseenof VALUES (12,2,5,'3:40:23');
INSERT INTO hasseenof VALUES (12,7,1,'1:14:36');

INSERT INTO hasseenof VALUES (13,2,4,'2:36:54');

INSERT INTO hasseenof VALUES (15,2,4,'2:10:48');
INSERT INTO hasseenof VALUES (15,11,1,'1:12:47');
INSERT INTO hasseenof VALUES (15,12,1,'2:36:35');
INSERT INTO hasseenof VALUES (18,11,1,'0:36:24');
INSERT INTO hasseenof VALUES (18,12,1,'0:45:14');
INSERT INTO hasseenof VALUES (18,2,2,'3:03:01');
INSERT INTO hasseenof VALUES (18,14,1,'0:38:06');





-- Agregados

INSERT INTO hasseenof VALUES (12,14,1,'0:40:36');
INSERT INTO hasseenof VALUES (12,11,1,'0:30:36');
INSERT INTO hasseenof VALUES (13,7,7,'0:59:54');
INSERT INTO hasseenof VALUES (13,1,1,'0:59:54');
INSERT INTO hasseenof VALUES (13,5,1,'0:40:54');
INSERT INTO hasseenof VALUES (13,4,1,'0:40:54');

INSERT INTO hasseenof VALUES (15,14,1,'0:53:48');
INSERT INTO hasseenof VALUES (16,2,1,'0:26:48');
INSERT INTO hasseenof VALUES (16,3,1,'1:02:48');
INSERT INTO hasseenof VALUES (16,4,1,'1:10:48');


INSERT INTO hasseenof VALUES (17,1,1,'0:32:48');
INSERT INTO hasseenof VALUES (17,2,2,'0:58:48');
INSERT INTO hasseenof VALUES (17,5,1,'0:58:48');
INSERT INTO hasseenof VALUES (17,4,2,'1:02:48');

INSERT INTO hasseenof VALUES (21,4,1,'0:58:48');
INSERT INTO hasseenof VALUES (21,7,1,'0:58:48');
INSERT INTO hasseenof VALUES (21,5,2,'0:22:0');
INSERT INTO hasseenof VALUES (21,2,2,'0:34:0');

INSERT INTO hasseenof VALUES (21,1,1,'0:42:0');
INSERT INTO hasseenof VALUES (15,1,1,'0:42:0');
INSERT INTO hasseenof VALUES (15,5,1,'0:22:0');
INSERT INTO hasseenof VALUES (12,1,1,'0:42:0');
INSERT INTO hasseenof VALUES (12,5,1,'0:42:0');
INSERT INTO hasseenof VALUES (16,1,1,'0:52:0');
INSERT INTO hasseenof VALUES (16,5,1,'0:24:0');

-- ----------------------------------------------------------------------------------
-- Directed
-- ----------------------------------------------------------------------------------

INSERT INTO directed VALUES (12,1);
INSERT INTO directed VALUES (13,2);
INSERT INTO directed VALUES (14,3);
INSERT INTO directed VALUES (15,4);
INSERT INTO directed VALUES (16,5);
INSERT INTO directed VALUES (17,6);
INSERT INTO directed VALUES (18,7);
INSERT INTO directed VALUES (19,8);
INSERT INTO directed VALUES (19,9);
INSERT INTO directed VALUES (20,10);
INSERT INTO directed VALUES (21,11);
INSERT INTO directed VALUES (22,12);
INSERT INTO directed VALUES (23,13);
INSERT INTO directed VALUES (24,13);
INSERT INTO directed VALUES (25,14);
INSERT INTO directed VALUES (25,15);
INSERT INTO directed VALUES (24,16);
INSERT INTO directed VALUES (23,17);
INSERT INTO directed VALUES (22,18);
INSERT INTO directed VALUES (21,19);
INSERT INTO directed VALUES (20,20);
INSERT INTO directed VALUES (19,21);
INSERT INTO directed VALUES (19,22);
INSERT INTO directed VALUES (19,23);
INSERT INTO directed VALUES (18,24);
INSERT INTO directed VALUES (18,25);
INSERT INTO directed VALUES (19,26);
INSERT INTO directed VALUES (21,27);
INSERT INTO directed VALUES (21,28);
INSERT INTO directed VALUES (15,29);
INSERT INTO directed VALUES (16,30);




