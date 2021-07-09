
------------------------------------------------------------------------
-- SEGUNDO NIVEL DE TABLAS (Que tienen FK que dependen del Primer Nivel)
------------------------------------------------------------------------

CREATE TABLE City ( -- Ciudad que puede tener país y/o usuario viviendo en ella
    
    IdCity      INT(10) UNIQUE NOT NULL AUTO_INCREMENT,
    IdCountry   INT(10) NOT NULL,
    CityName    VARCHAR(30) NOT NULL,
    
    CONSTRAINT City_PK PRIMARY KEY (IdCity),
    
    CONSTRAINT City_FK FOREIGN KEY (IdCountry) REFERENCES Carlevix.Country(IdCountry) ON DELETE CASCADE -- Al eliminar un país se eliminan sus ciudades
);

CREATE TABLE Content ( -- Contenido audiovisual
    
    IdContent   INT(10) UNIQUE NOT NULL AUTO_INCREMENT,
    MinAge      TINYINT(2) NOT NULL,
    IdLanguage  INT(10) NOT NULL,

    CONSTRAINT Content_PK PRIMARY KEY (IdContent),
    
    CONSTRAINT Content_FK1 FOREIGN KEY (MinAge) REFERENCES Carlevix.AgeClass(MinAge) ON DELETE NO ACTION,  -- Al eliminar una clasificación por edad se deja como está
    CONSTRAINT Content_FK2 FOREIGN KEY (IdLanguage) REFERENCES Carlevix.Language(IdLanguage) ON DELETE NO ACTION -- Al eliminar un idioma se deja como está en sus contenidos
);

CREATE TABLE Director( -- Persona que dirige un contenido
    
    IdWorker INT(10) UNIQUE NOT NULL, 
    
    CONSTRAINT Director_PK PRIMARY KEY (IdWorker),

    CONSTRAINT Director_FK FOREIGN KEY (IdWorker) REFERENCES Carlevix.FilmWorker(IdWorker) ON DELETE CASCADE -- Al eliminar el trabajador, se elimina el subtipo
);


CREATE TABLE Performer( -- Persona que actúa en un contenido
    
    IdWorker INT(10) UNIQUE NOT NULL, 
    
    CONSTRAINT Performer_PK PRIMARY KEY (IdWorker),
    
    CONSTRAINT Performer_FK FOREIGN KEY (IdWorker) REFERENCES Carlevix.FilmWorker(IdWorker) ON DELETE CASCADE -- Verificar esto
);