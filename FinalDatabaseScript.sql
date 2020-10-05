DROP DATABASE solarsystem;
CREATE DATABASE IF NOT EXISTS SolarSystem;

use SolarSystem;

DROP TABLE IF EXISTS SolarSystem;
CREATE TABLE SolarSystem
(
solarSystemID INT(10) AUTO_INCREMENT,
StarName VARCHAR(35)     NULL    NULL,
solarSystemName  VARCHAR(35)     NULL    NULL,
PRIMARY KEY (solarSystemID)
);

INSERT INTO solarsystem VALUES
(1,'sun','sol'),
(2,'alphacentuari', 'farwaysystem');

DROP TABLE IF EXISTS Planets;
CREATE TABLE Planets
(
planetID INT(10) NOT NULL AUTO_INCREMENT,
solarSystemID    INT(10),
planetName       VARCHAR(50)     NULL    NULL,
planetMass       VARCHAR(200)    NULL    NULL,
averageTemperature       INT(200)    NULL    NULL,
lowestTempOnPlanet       INT(200)    NULL    NULL,
highestTempOnPlanet      INT(200)    NULL    NULL,
PRIMARY KEY (planetID),
FOREIGN KEY (solarSystemID) REFERENCES solarsystem(solarSystemID)
ON DELETE SET NULL
ON UPDATE CASCADE
);

INSERT INTO Planets VALUES
(1,1,'Mercury','3.285 x 10^23 kg', '332', '-290', '800'),
(2,1,'Venus','4.867 x 10^24 k', '864', '460', '890'),
(3,1,'Earth','5.972 x 10^24 kg', '59', '-89', '134'),
(4,1,'Mars','6.39 x 10^23 kg', '-80', '-243', '70'),
(5,1,'Jupiter','1.898 x 10^27 kg', '-234', '-145', '-145'),
(6,1,'Saturn','5.683 x 10^26 kg', '-288', '-150', '134'),
(7,1,'Uranus','8.681 x 10^25 kg', '-371', '-371', '-340'),
(8,1,'Neptune','1.024 x 10^26 kg', '-353', '-328', '-315'),
(9,1,'Pluto','1.30900 x 10^22 kg', '-380', '-380', '-369');

DROP TABLE IF EXISTS Moons;
CREATE TABLE Moons
(
moonID   INT     PRIMARY KEY     AUTO_INCREMENT,
planetID INT     NULL    NULL,
moonName VARCHAR(200)    NULL    NULL,
moonMass VARCHAR(200)    NULL    NULL,
CONSTRAINT Moons_fk_Planets FOREIGN KEY(planetID)
REFERENCES planets(planetID)
ON DELETE SET NULL
ON UPDATE CASCADE
);

INSERT INTO Moons VALUES
(NULL,3,'Moon','7.35 x 10^22 kg'),
(NULL,4,'Phobos','10.6 x 1015 kg'),
(NULL,4,'Deimos','1.4762 x 1015kg'),
(NULL,5,'Europa','4.7998 x 1022 kg'),
(NULL,5,'IO','8.9319 x 1022 kg'),
(NULL,5,'Ganymede','1.4819 x 1023 kg'),
(NULL,6,'Titan','1.345 x 1023 kg'),
(NULL,6,'Enceladus','1.08 x 1020 kg'),
(NULL,6,'Mimas','3.75 x 1019 kg'),
(NULL,7,'Umbriel','1.27e+21'),
(NULL,7,'Titania','0.09 x 10^21 kg'),
(NULL,7,'Oberon','0.075 x 10^21 kilograms'),
(NULL,8,'Neso','2 x 1017kg.'),
(NULL,8,'Triton','2.14 x 1022 kg'),
(NULL,9,'Charon','1.55 x 10^21 kg');

CREATE INDEX planetName
ON Planets(planetName);

CREATE INDEX moonName
ON Moons(moonName);

DROP USER IF EXISTS 'bookkorama'@'localhost';

CREATE USER 'bookkorama'@'localhost'  identified by 'cpsc33000';
GRANT SELECT, INSERT, UPDATE, DELETE on SolarSystem.* TO 'bookkorama'@'localhost';