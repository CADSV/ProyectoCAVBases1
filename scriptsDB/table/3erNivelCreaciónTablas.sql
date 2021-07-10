--------------------------------------------------------------------------
-- TERCER NIVEL DE TABLAS (Que tienen FK que dependen del 1er y 2do Nivel)
--------------------------------------------------------------------------

-- CREATE DOMAIN EMAIL_DOMAIN AS VARCHAR NOT NULL CHECK (VALUE ~* '^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+[.][A-Za-z]+$');

CREATE TABLE User ( -- Cuenta tipo usuario en Carlevix
    
    IdUser      INT(10) UNIQUE NOT NULL AUTO_INCREMENT, 
    IdCity      INT(10),     -- NULL: Ciudad Desconocida.
    Username    VARCHAR(60) UNIQUE NOT NULL , 
    EmailUser   VARCHAR(60) UNIQUE NOT NULL,    
    PasswordUser    VARCHAR(20) NOT NULL,
    NameUser        VARCHAR(30) NOT NULL,
    LastNameUser    VARCHAR(30) NOT NULL,
    UserIsSuscribed     BIT(1)  NOT NULL DEFAULT 0, -- 1: Suscrito, 0: No suscrito
    UserPhone           BIGINT(15) NOT NULL,
    UserGender          VARCHAR(3) NOT NULL,
    UserPostalCode      INT(10),
    UserAvenueStreet    VARCHAR(20),
    UserBuildingHouse   VARCHAR(20),
    
    CONSTRAINT User_PK PRIMARY KEY (IdUser),

    CONSTRAINT EMAIL_Domain CHECK (EmailUser LIKE '%_@__%.__%'),
    CONSTRAINT GENDER_Domain CHECK (UserGender='M' OR UserGender='F' OR UserGender='N/A'),

    CONSTRAINT User_FK FOREIGN KEY (IdCity) REFERENCES Carlevix.City(IdCity) ON DELETE SET NULL ON UPDATE CASCADE
);

    CREATE TABLE IsSuscribed ( -- Relación entre usuario y membresía, que indica suscripción actual o pasada

    IdUser INT(10) NOT NULL, 
    IdMembership INT(10) NOT NULL,
    CVV INT(3) NOT NULL,
    CardNumber BIGINT(20) NOT NULL,
    StartDateSus DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, 
    EndDateSus DATETIME,
    
    CONSTRAINT IsSuscribed_PK PRIMARY KEY (IdUser, StartDateSus),
    
    CONSTRAINT IsSuscribed_FK1 FOREIGN KEY (IdUser) REFERENCES Carlevix.User(IdUser) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT IsSuscribed_FK2 FOREIGN KEY (IdMembership) REFERENCES Carlevix.Membership(IdMembership) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT IsSuscribed_FK3 FOREIGN KEY (CardNumber, CVV) REFERENCES Carlevix.PaymentCard(CardNumber, CVV) ON DELETE CASCADE ON UPDATE CASCADE
);



-- CREATE DOMAIN PROFILE_PHOTO_DOMAIN AS INT(1) NOT NULL CHECK (VALUE IN (1, 2, 3, 4, 5)); --   1: Azul 2: Rojo 3: Amarillo 4: Verde 5: Morado */


CREATE TABLE Profile ( -- Perfil que tiene usuario en Carlevix para ver y preferir contenidos
    
    IdProfile       INT(10) UNIQUE NOT NULL AUTO_INCREMENT,
    IdUser          INT(10) NOT NULL,
    ProfilePhoto    INT(1) NOT NULL,   
    ProfileName     VARCHAR(20) NOT NULL,

    CONSTRAINT Profile_PK PRIMARY KEY (IdProfile),
    
    CONSTRAINT PROFILE_PHOTO_Domain CHECK ((ProfilePhoto = 1) OR (ProfilePhoto = 2) OR (ProfilePhoto = 3) OR (ProfilePhoto = 4) OR (ProfilePhoto = 5)),  --   1: Azul 2: Rojo 3: Amarillo 4: Verde 5: Rosado
    
    CONSTRAINT Profile_FK FOREIGN KEY (IdUser) REFERENCES Carlevix.User(IdUser) ON DELETE CASCADE ON UPDATE CASCADE -- Al eliminar un usuario se eliminan sus perfiles
);


-- CREATE DOMAIN RELEVANCE_DOMAIN AS INT(1) NOT NULL CHECK (VALUE IN (1, 2)); -- 1: Lead (Principal), 2: Secondary (Secundario) */

CREATE TABLE IsAbout ( -- Es sobre, relación entre contenido y género (o categoría)

    IdContent INT(10) NOT NULL,
    IdGenre INT(10) NOT NULL, 
    Relevance INT(1) NOT NULL,

    CONSTRAINT IsAbout_PK PRIMARY KEY (IdContent, IdGenre),

    CONSTRAINT RELEVANCE_Domain CHECK ((Relevance = 1) OR (Relevance = 2)), -- 1: Lead (Principal), 2: Secondary (Secundario)

    CONSTRAINT IsAbout_FK1 FOREIGN KEY (IdContent) REFERENCES Carlevix.Content(IdContent) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT IsAbout_FK2 FOREIGN KEY (IdGenre) REFERENCES Carlevix.Genre(IdGenre) ON DELETE CASCADE ON UPDATE CASCADE  
);


CREATE TABLE FeatureContent( -- Contenido individual, como películas
    
    IdContent       INT(10)  UNIQUE NOT NULL, 
    TitleCont       VARCHAR(100)  NOT NULL,
    ReleaseYearCont YEAR NOT NULL,
    IsOriginalCont  BIT(1) NOT NULL DEFAULT 0, -- 1: Es ORGINAL De Netflix, 0: No es ORGINAL De Netflix
    ReqSusCont      BIT(1) NOT NULL DEFAULT 0, -- 1: Requiere suscripcion, 0: no requiere suscripcion
    ContentImage    VARCHAR(250)  NOT NULL,
    Description     VARCHAR(250)  NOT NULL,
    FeatureRunTime  TIME NOT NULL,
    
    CONSTRAINT FeatureContent_PK PRIMARY KEY (IdContent),

    CONSTRAINT FeatureContent_FK FOREIGN KEY (IdContent) REFERENCES Carlevix.Content(IdContent) ON DELETE CASCADE ON UPDATE CASCADE 
); 


CREATE TABLE EpisodicContent( -- Contenido episódico, es decir que tiene varias partes (temporadas y episodios)
    
    IdContent       INT(10)  UNIQUE NOT NULL, 
    TitleCont       VARCHAR(100)  NOT NULL,
    ReleaseYearCont YEAR NOT NULL,
    IsOriginalCont  BIT(1) NOT NULL DEFAULT 0, -- 1: Es ORGINAL De Netflix, 0: No es ORGINAL De Netflix
    ReqSusCont      BIT(1) NOT NULL DEFAULT 0, -- 1: Requiere suscripcion, 0: no requiere suscripcion
    ContentImage    VARCHAR(250)  NOT NULL,
    Description     VARCHAR(250)  NOT NULL,
    EpisodicTotalRunTime    TIME NOT NULL ,

    CONSTRAINT EpisodicContent_PK PRIMARY KEY (IdContent),
    
    CONSTRAINT EpisodicContent_FK FOREIGN KEY (IdContent) REFERENCES Carlevix.Content(IdContent) ON DELETE CASCADE ON UPDATE CASCADE 
); 


CREATE TABLE Season( -- Temporada que tiene contenido episódico, es decir grupo de episodios/capítulos
    
    IdSeason INT(10)  NOT NULL AUTO_INCREMENT,
    IdContent INT(10) NOT NULL,
    SeasonName VARCHAR(30) NOT NULL,
    TotalSeasonTime TIME NOT NULL,

    CONSTRAINT Season_PK PRIMARY KEY (IdSeason, IdContent),
    
    CONSTRAINT Season_FK FOREIGN KEY (IdContent) REFERENCES Carlevix.Content(IdContent) ON DELETE CASCADE ON UPDATE CASCADE 
);


CREATE TABLE Award( -- Premio que puede tener contenido

    IdContent INT(10),
    IdAward INT(10) NOT NULL AUTO_INCREMENT,
    WinningYear YEAR,
    AwardName VARCHAR(30) NOT NULL, 

    CONSTRAINT Award_PK PRIMARY KEY (IdAward, IdContent, WinningYear),
    
    CONSTRAINT Award_FK FOREIGN KEY (IdContent) REFERENCES Carlevix.Content(IdContent) ON DELETE CASCADE ON UPDATE CASCADE 
);


CREATE TABLE Directed ( -- Dirige, relación entre director y contenido

    IdWorker INT(10) NOT NULL,
    IdContent INT(10) NOT NULL,

    CONSTRAINT Directed_PK PRIMARY KEY (IdWorker, IdContent),

    CONSTRAINT Directed_FK1 FOREIGN KEY (IdWorker) REFERENCES Carlevix.FilmWorker(IdWorker) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT Directed_FK2 FOREIGN KEY (IdContent) REFERENCES Carlevix.Content(IdContent) ON DELETE CASCADE ON UPDATE CASCADE
);


-- CREATE DOMAIN ROLE_DOMAIN AS INT(1) NOT NULL CHECK (VALUE IN (1, 2, 3)); -- 1: Lead (Principal), 2: Side (De reparto), 3: Guest (Invitado) */

CREATE TABLE Stars  ( -- Actúa, relación entre actor y contenido

    IdWorker    INT(10) NOT NULL, 
    IdContent   INT(10) NOT NULL, 
    Role        INT(1) NOT NULL, 

    CONSTRAINT Stars_PK PRIMARY KEY (IdWorker, IdContent),

    CONSTRAINT ROLE_Domain CHECK ((Role = 1) OR (Role = 2) OR (Role = 3)), -- 1: Lead (Principal), 2: Side (De reparto), 3: Guest (Invitado)

    CONSTRAINT Stars_FK1 FOREIGN KEY (IdWorker) REFERENCES Carlevix.FilmWorker(IdWorker) ON DELETE CASCADE ON UPDATE CASCADE, 
    CONSTRAINT Stars_FK2 FOREIGN KEY (IdContent) REFERENCES Carlevix.Content(IdContent) ON DELETE CASCADE ON UPDATE CASCADE
);