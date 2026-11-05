CREATE DATABASE shop;
USE shop;

CREATE TABLE artikel
(
 ArtikelNr        INT(6)  AUTO_INCREMENT,
 Bezeichnung      VARCHAR(20) NOT NULL UNIQUE DEFAULT 'Elektro',
 Einkaufspreis    DOUBLE(6,2) CHECK (Einkaufspreis >= 0),
 Verkaufspreis    DOUBLE(6,2) CHECK (Verkaufspreis >= 0),
 PRIMARY KEY (ArtikelNr),
 CHECK (Verkaufspreis >= Einkaufspreis)
);

CREATE TABLE kunden
(
 KundenNr        INT(6)  AUTO_INCREMENT,
 Name             VARCHAR(20) NOT NULL UNIQUE,
 GebDatum    Date CHECK(GebDatum < '2005-01-01'),
 Passwort    VARCHAR(20) NOT NULL,
 PRIMARY KEY (KundenNr) 
 );

CREATE TABLE bestellungen
(BestellNr        INT(6) AUTO_INCREMENT,
 KundenNr         INT(6) NOT NULL,
 Bestelldatum     DATE NOT NULL,
 Lieferdatum      DATE,
 Bearbeiter       VARCHAR(10),
 PRIMARY KEY (BestellNr),
 FOREIGN KEY (KundenNr) REFERENCES kunden(KundenNr),
CHECK (Lieferdatum >= Bestelldatum)
);

CREATE TABLE bestellpositionen
(BestellNr       INT(6),
 ArtikelNr        INT(6),
 Anzahl           INT(3) CHECK (Anzahl > 0),
 Einzelpreis      DOUBLE(6,2) CHECK (Einzelpreis >= 0),
 PRIMARY KEY (BestellNr, ArtikelNr),
 FOREIGN KEY (BestellNr) REFERENCES bestellungen(BestellNr),
 FOREIGN KEY (ArtikelNr) REFERENCES artikel(ArtikelNr) 
 );

