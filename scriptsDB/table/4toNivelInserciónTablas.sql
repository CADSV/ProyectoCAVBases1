-------------------------------------------------------------------------------
-- CUARTO NIVEL DE TABLAS (Que tienen FK que dependen del 1er, 2do y 3er Nivel)
-------------------------------------------------------------------------------

CREATE TABLE HasSeen ( -- Ha visto, relación entre perfil y contenido

    IdProfile       INT(10) NOT NULL,
    IdContent       INT(10) NOT NULL,
    LastDateWatched DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, 
    Rating          FLOAT(2),
    WatchedByRecomm BIT(1) NOT NULL DEFAULT 0, -- 1: Visto por recomendación, 0: Visto sin recomendación.
    TimesSeen       INT(10) NOT NULL DEFAULT 1,  -- 1 es la primera visualización del contenido.
    LastMinWatched  TIME,
    TimeWatchedLastTime TIME,

    CONSTRAINT HasSeen_PK PRIMARY KEY (IdProfile, IdContent),

    CONSTRAINT RATING_Domain CHECK (Rating BETWEEN 1 AND 5),

    CONSTRAINT HasSeen_FK1 FOREIGN KEY (IdProfile) REFERENCES Carlevix.Profile(IdProfile) ON DELETE CASCADE ON UPDATE CASCADE, 
    CONSTRAINT HasSeen_FK2 FOREIGN KEY (IdContent) REFERENCES Carlevix.Content(IdContent) ON DELETE CASCADE ON UPDATE CASCADE
);


CREATE TABLE HasSeenOf ( -- Ha visto de, relación entre perfil y género de contenido

    IdProfile INT(10) NOT NULL,
    IdGenre INT(10) NOT NULL,
    TimesSeen INT(10) NOT NULL DEFAULT 1, -- 1 es la primera visualización del contenido.
    TotalSeenTime TIME,

    CONSTRAINT HasSeenOf_PK PRIMARY KEY (IdProfile, IdGenre),

    CONSTRAINT HasSeenOf_FK1 FOREIGN KEY (IdProfile) REFERENCES Carlevix.Profile(IdProfile) ON DELETE CASCADE ON UPDATE CASCADE, 
    CONSTRAINT HasSeenOf_FK2 FOREIGN KEY (IdGenre) REFERENCES Carlevix.Genre(IdGenre) ON DELETE CASCADE ON UPDATE CASCADE
);


CREATE TABLE Blocked( -- Bloqueado, relación 

    IdProfile INT(10) NOT NULL, 
    IdContent INT(10) NOT NULL, 
    IsBlocked BIT(1) NOT NULL DEFAULT 0, -- 1: Está bloqueado, 0: No está bloqueado.

    CONSTRAINT Blocked_PK PRIMARY KEY (IdProfile, IdContent),
    
    CONSTRAINT Blocked_FK1 FOREIGN KEY (IdProfile) REFERENCES Carlevix.Profile(IdProfile) ON DELETE CASCADE ON UPDATE CASCADE, 
    CONSTRAINT Blocked_FK2 FOREIGN KEY (IdContent) REFERENCES Carlevix.Content(IdContent) ON DELETE CASCADE ON UPDATE CASCADE
);


CREATE TABLE Session( -- Sesión, relación entre perfil y dispositivo

    IdUser       INT(10) NOT NULL,
    IdDevice        INT(10) NOT NULL,     
    ConStartDate    DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, 
    SessionTotalTime TIME,

    CONSTRAINT Session_PK PRIMARY KEY (IdUser, IdDevice, ConStartDate),
    
    CONSTRAINT Session_FK1 FOREIGN KEY (IdUser) REFERENCES Carlevix.User(IdUser) ON DELETE CASCADE ON UPDATE CASCADE, 
    CONSTRAINT Session_FK2 FOREIGN KEY (IdDevice) REFERENCES Carlevix.Device(IdDevice) ON DELETE CASCADE ON UPDATE CASCADE

);


CREATE TABLE Watchlist ( -- Lista de contenidos para ver más tarde (Mi Lista)

    IdProfile   INT(10) NOT NULL,
    IdContent   INT(10) NOT NULL,

    CONSTRAINT Watchlist_PK PRIMARY KEY (IdProfile, IdContent),

    CONSTRAINT Watchlist_FK1 FOREIGN KEY (IdProfile) REFERENCES Carlevix.Profile(IdProfile) ON DELETE CASCADE ON UPDATE CASCADE, 
    CONSTRAINT Watchlist_FK2 FOREIGN KEY (IdContent) REFERENCES Carlevix.Content(IdContent) ON DELETE CASCADE ON UPDATE CASCADE
);


CREATE TABLE Configurate ( -- Configura, relación entre perfil e idioma, clasificación por edad y subitítulo

    IdProfile       INT(10) NOT NULL,
    IdLanguage      INT(10),     
    MinAge          TINYINT(2),  
    Font            VARCHAR(20),
    Size            TINYINT(2), 
    ConfigurationDate DATETIME DEFAULT CURRENT_TIME,

    CONSTRAINT Configurate_PK PRIMARY KEY (IdProfile, ConfigurationDate),

    CONSTRAINT FONT_Domain CHECK ((Font='Arial') OR (Font='Helvetica') OR (Font='Sans-Serif')),


    CONSTRAINT Configurate_FK1 FOREIGN KEY (IdProfile) REFERENCES Carlevix.Profile(IdProfile) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT Configurate_FK2 FOREIGN KEY (IdLanguage) REFERENCES Carlevix.Language(IdLanguage) ON DELETE SET NULL  ON UPDATE CASCADE,
    CONSTRAINT Configurate_FK3 FOREIGN KEY (MinAge) REFERENCES Carlevix.AgeClass(MinAge) ON DELETE SET NULL ON UPDATE CASCADE,
    CONSTRAINT Configurate_FK4 FOREIGN KEY (Font, Size) REFERENCES Carlevix.Subtitle(Font, Size) ON DELETE SET NULL ON UPDATE CASCADE
);

CREATE TABLE Episode( -- Episodio que puede tener temporada

    IdEpisode INT(10) NOT NULL AUTO_INCREMENT, 
    IdSeason INT(10) NOT NULL,
    IdContent   INT(10)  NOT NULL,
    EpisodeName VARCHAR(30) NOT NULL,
    EpisodeRunTime TIME NOT NULL,
    EpisodeVideo  VARCHAR(255),

    CONSTRAINT Episode_PK PRIMARY KEY (IdEpisode, IdSeason, IdContent),

    CONSTRAINT Episode_FK FOREIGN KEY (IdSeason,IdContent) REFERENCES Carlevix.Season(IdSeason,IdContent) ON DELETE CASCADE ON UPDATE CASCADE
);