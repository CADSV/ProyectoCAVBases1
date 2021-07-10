CREATE DATABASE Carlevix;

USE Carlevix;

------------------------------------------------
-- PRIMER NIVEL DE TABLAS (Los que no tienen FK)
------------------------------------------------
CREATE TABLE PaymentCard ( -- Tarjeta con la que usuario pagan membresía
   
    CardNumber      BIGINT(20) NOT NULL,
    CVV             INT(3) NOT NULL,
    OwnerName       VARCHAR(30) NOT NULL,
    OwnerLastname   VARCHAR(30) NOT NULL,
    ExpDate         DATE NOT NULL,

    CONSTRAINT PaymentCard_PK PRIMARY KEY (CardNumber, CVV)
);


CREATE TABLE Membership ( -- Plan de suscripción que usuario puede pagar
    
    IdMembership    INT(10) UNIQUE NOT NULL AUTO_INCREMENT,
    MembershipName  VARCHAR(10) UNIQUE NOT NULL,
    Description     VARCHAR(100) NOT NULL,
    Price           FLOAT(30) NOT NULL,

    CONSTRAINT Membership_PK PRIMARY KEY (IdMembership) 
);


CREATE TABLE Country ( -- País en el que puede vivir usuario
    
    IdCountry   INT(10) UNIQUE NOT NULL AUTO_INCREMENT,
    CountryName  VARCHAR(30) UNIQUE NOT NULL,
    
    CONSTRAINT Country_PK PRIMARY KEY (IdCountry)
);


-- CREATE DOMAIN DTYPE AS VARCHAR(13) NOT NULL CHECK (VALUE = "Laptop" OR VALUE = "Computer" OR VALUE = "Cellphone" OR VALUE = "Tablet" OR VALUE = "Other/Unknown")); -- Tipo de dispositivo

CREATE TABLE Device ( -- Dispositivo que puede utilizar usuario para navegar en Carlevix
   
    IdDevice        INT(10) UNIQUE NOT NULL AUTO_INCREMENT,
    DeviceType      VARCHAR(20) NOT NULL,
    DeviceModel     VARCHAR(20) NOT NULL,
    DeviceCompany   VARCHAR(20) NOT NULL,

    CONSTRAINT DTYPE_Domain CHECK ((DeviceType='Laptop') OR (DeviceType='Computer') OR (DeviceType='Cellphone') OR (DeviceType='Tablet') OR (DeviceType='Other/Unknown')), -- Tipo de dispositivo

    CONSTRAINT Device_PK PRIMARY KEY (IdDevice)
);


CREATE TABLE Subtitle( -- Tipo de subtítulo que puede preferir perfil

    Font VARCHAR(20) NOT NULL,
    Size TINYINT(2) NOT NULL, 
    
    CONSTRAINT FONT_Domain CHECK ((Font='Arial') OR (Font='Helvetica') OR (Font='Sans-Serif')),
    
    CONSTRAINT Subtitle_PK PRIMARY KEY (Font, Size)
);


CREATE TABLE Genre ( -- Categoría/Género/Tipo que puede tener contenido
    
    IdGenre     INT(10) UNIQUE NOT NULL AUTO_INCREMENT,
    GenreName   VARCHAR(20) UNIQUE NOT NULL,

    CONSTRAINT Genre_PK PRIMARY KEY (IdGenre) 
);


CREATE TABLE AgeClass( -- Clasificación por edad que puede tener contenido

    MinAge  TINYINT(2) UNIQUE NOT NULL,
    Description VARCHAR(30)  NOT NULL,

    CONSTRAINT AgeClass_PK PRIMARY KEY (MinAge)
);



CREATE TABLE Language( -- Idioma que puede preferir perfil y/o puede tener contenido

    IdLanguage INT(10) UNIQUE NOT NULL AUTO_INCREMENT ,
    LanguageName VARCHAR(30) UNIQUE NOT NULL,

    CONSTRAINT Language_PK PRIMARY KEY (IdLanguage)     
);


CREATE TABLE FilmWorker( -- Trabajador que puede tener contenido
    
    IdWorker INT(10) UNIQUE NOT NULL AUTO_INCREMENT, 
    WorkerName VARCHAR(30) NOT NULL,
    WorkerLastName VARCHAR(30) NOT NULL,
    WorkerGender VARCHAR(3) NOT NULL,

    CONSTRAINT GENDER_Domain CHECK (WorkerGender='M' OR WorkerGender='F' OR WorkerGender='N/A'),

    CONSTRAINT FilmWorker_PK PRIMARY KEY (IdWorker)
);