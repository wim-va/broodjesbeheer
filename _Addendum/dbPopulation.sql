-- DROP DATABASE if EXISTS BroodjeApp;
-- CREATE DATABASE  BroodjeApp;


-- USE BroodjeApp;
USE u155213p145642_broodje;

CREATE TABLE IF NOT EXISTS
beleg(
    belegId int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    belegNaam varchar(20),
    belegPrijs float
);

CREATE TABLE IF NOT EXISTS
bestelling(
    bestellingId int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    belegId int NOT NULL,
    formaatId int NOT NULL,
    sausId int NOT NULL,
    soortId int NOT NULL,
    cursistId int NOT NULL,
    bestellingDatum DATE
);

CREATE TABLE IF NOT EXISTS
cursist(
    cursistId int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    email varchar(50),
    wachtwoord varchar(50)
);

CREATE TABLE IF NOT EXISTS
formaat(
    formaatId int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    formaatNaam varchar(20),
    formaatPrijs float
);

CREATE TABLE IF NOT EXISTS
saus(
    sausId int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    sausNaam varchar(20),
    sausPrijs float
);

CREATE TABLE IF NOT EXISTS
soort(
    soortId int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    soortNaam varchar(20),
    soortPrijs float
);

-- INSERT TABLE DATA HERE
INSERT INTO beleg(belegId,belegNaam, belegPrijs)
VALUES
(1, "croque", 5.00),
(2, "hesp", 3.80),
(3, "kaas", 3.80),
(4, "martino", 4.00),
(5, "rosbief", 4.20);

INSERT INTO bestelling(bestellingId, belegId, formaatId, sausId, soortId, cursistId, bestellingDatum)
VALUES
(1, 3, 2, 3, 2, 9, '2008/12/24'),
(2, 3, 3, 1, 1, 13, '2021/10/5'),
(3, 4, 2, 4, 3, 5, '2020/6/8'),
(4, 3, 3, 4, 1, 9, '2018/3/26'),
(5, 1, 1, 1, 3, 26, '2016/10/15'),
(6, 4, 1, 2, 2, 4, '2019/2/7'),
(7, 5, 2, 3, 1, 25, '2006/8/1'),
(8, 5, 3, 3, 1, 21, '2013/4/9'),
(9, 1, 2, 2, 1, 6, '2006/6/28'),
(10, 5, 1, 1, 3, 3, '2020/6/25'),
(11, 3, 2, 1, 2, 16, '2010/8/27'),
(12, 5, 1, 2, 1, 21, '2010/12/3'),
(13, 1, 2, 3, 1, 2, '2008/9/24'),
(14, 4, 2, 1, 3, 18, '2009/7/15'),
(15, 2, 3, 3, 4, 6, '2010/12/25'),
(16, 3, 2, 6, 4, 20, '2013/2/3'),
(17, 1, 2, 2, 1, 6, '2016/8/4'),
(18, 5, 2, 2, 1, 22, '2015/5/12'),
(19, 1, 3, 5, 2, 9, '2013/7/8'),
(20, 5, 3, 1, 4, 27, '2017/3/10'),
(21, 3, 1, 6, 3, 3, '2013/9/11'),
(22, 3, 3, 1, 3, 18, '2017/1/4'),
(23, 4, 1, 1, 4, 10, '2019/5/19'),
(24, 2, 2, 3, 1, 2, '2021/12/13'),
(25, 1, 2, 6, 3, 2, '2009/5/12'),
(26, 2, 2, 4, 1, 27, '2015/10/17'),
(27, 3, 2, 1, 1, 12, '2018/7/1'),
(28, 1, 3, 2, 4, 24, '2016/6/23'),
(29, 1, 2, 6, 4, 11, '2005/8/12'),
(30, 3, 2, 1, 1, 22, '2011/3/14'),
(31, 5, 2, 4, 4, 4, '2009/3/12');

INSERT INTO cursist(cursistId,email,wachtwoord)
VALUES
(1, "dirk@hotmail.com", "59qogibZ"),
(2, "dirk@hotmail.be", "tnmXUOvT"),
(3, "dirk@hotmail.tk", "O4ZxM6k3"),
(4, "dirk@outlook.com", "faF9e10O"),
(5, "dirk@outlook.be", "2G89mwpX"),
(6, "dirk@outlook.tk", "RxfXGDxa"),
(7, "dirk@gmail.com", "kD3s35q7"),
(8, "dirk@gmail.be", "QzhLKw4F"),
(9, "dirk@gmail.tk", "VkkbSh0g"),
(10, "steven@hotmail.com", "BLA03EJ9"),
(11, "steven@hotmail.be", "670GnqQY"),
(12, "steven@hotmail.tk", "jdc62BpK"),
(13, "steven@outlook.com", "K4wxLtD5"),
(14, "steven@outlook.be", "fHYQiriP"),
(15, "steven@outlook.tk", "i3kzIW9c"),
(16, "steven@gmail.com", "PIyE627E"),
(17, "steven@gmail.be", "LYUMpt05"),
(18, "steven@gmail.tk", "1rbcmwFd"),
(19, "simon@hotmail.com", "XXD7wuJq"),
(20, "simon@hotmail.be", "ckCAbJnD"),
(21, "simon@hotmail.tk", "qsDdDY4U"),
(22, "simon@outlook.com", "8ME7HeIo"),
(23, "simon@outlook.be", "D3n5ECyZ"),
(24, "simon@outlook.tk", "EHFqNkuR"),
(25, "simon@gmail.com", "Fd5EXl03"),
(26, "simon@gmail.be", "Eo8MaKbZ"),
(27, "simon@gmail.tk", "OMKAYipH");

INSERT INTO formaat(formaatId,formaatNaam,formaatPrijs)
VALUES
(1, "klein", 0.00),
(2, "middel", 1.50),
(3, "groot", 3.00);

INSERT INTO saus(sausId,sausNaam,sausPrijs)
VALUES
(1,"zonder saus", 0.00),
(2,"andalouse", 0.50),
(3,"ketchup", 0.70),
(4,"samourai", 0.50),
(5,"stoofvlees", 2.00),
(6,"tartaar", 0.70);

INSERT INTO soort(soortId, soortNaam, soortPrijs)
VALUES
(1,"wit", 0.00),
(2,"bruin", 0.50),
(3,"fitness", 0.50),
(4,"meergranen", 1.00);
-- INSERT TABLE DATA HERE



ALTER TABLE bestelling
ADD CONSTRAINT FK_BelegBestelling
FOREIGN KEY bestelling(belegId) REFERENCES beleg(belegId);

ALTER TABLE bestelling
ADD CONSTRAINT FK_CursistBestelling
FOREIGN KEY bestelling(cursistId) REFERENCES cursist(cursistId);

ALTER TABLE bestelling
ADD CONSTRAINT FK_FormaatBestelling
FOREIGN KEY bestelling(formaatId) REFERENCES formaat(formaatId);

ALTER TABLE bestelling
ADD CONSTRAINT FK_SoortBestelling
FOREIGN KEY bestelling(soortId) REFERENCES soort(soortId);

ALTER TABLE bestelling
ADD CONSTRAINT FK_SausBestelling
FOREIGN KEY bestelling(sausId) REFERENCES saus(sausId);












-- ALTER TABLE broodje
-- ADD CONSTRAINT FK_BelegBroodje
-- FOREIGN KEY broodje(belegId) REFERENCES beleg(belegId);

-- ALTER TABLE broodje
-- ADD CONSTRAINT FK_FormaatBroodje
-- FOREIGN KEY broodje(formaatId) REFERENCES formaat(formaatId);

-- ALTER TABLE broodje
-- ADD CONSTRAINT FK_SausBroodje
-- FOREIGN KEY broodje(sausId) REFERENCES saus(sausId);

-- ALTER TABLE broodje
-- ADD CONSTRAINT FK_SoortBroodje
-- FOREIGN KEY broodje(soortId) REFERENCES soort(soortId);

-- ALTER TABLE bestelling
-- ADD CONSTRAINT FK_BroodjeBestelling
-- FOREIGN KEY bestelling(broodjeId) REFERENCES broodje(broodjeId);

-- ALTER TABLE bestelling
-- ADD CONSTRAINT FK_CursistBestelling
-- FOREIGN KEY bestelling(cursistId) REFERENCES cursist(cursistId);

-- CREATE USER 'broodjeszaak'@'localhost' IDENTIFIED BY '%7JLEIOYhjKO4g^PxK%8uX8f';

-- CREATE USER 'broodjeszaak'@'127.0.0.1' IDENTIFIED BY '41ryOuJaT4THRfBwx8X5nudH';

--  SELECT * FROM `user` WHERE 1
-- CREATE USER 'broodjeszaak'@'localhost' IDENTIFIED BY '41ryOuJaT4THRfBwx8X5nudH';
