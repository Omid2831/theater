DROP DATABASE IF EXISTS Aurora;

CREATE DATABASE Aurora;

USE Aurora;

CREATE TABLE
    Gebruiker (
        Id INT PRIMARY KEY,
        Voornaam VARCHAR(50) NOT NULL,
        Tussenvoegsel VARCHAR(10),
        Achternaam VARCHAR(50) NOT NULL,
        Gebruikersnaam VARCHAR(100) NOT NULL,
        Wachtwoord VARCHAR(255) NOT NULL,
        IsIngelogd BIT NOT NULL,
        Ingelogd DATETIME,
        Uitgelogd DATETIME,
        Isactief BIT NOT NULL,
        Opmerking VARCHAR(250),
        Datumaangemaakt DATETIME(6) NOT NULL,
        Datumgewijzigd DATETIME(6) NOT NULL
    );


CREATE TABLE
    Rol (
        Id INT PRIMARY KEY,
        GebruikerId INT NOT NULL,
        Naam VARCHAR(100) NOT NULL,
        Isactief BIT NOT NULL,
        Opmerking VARCHAR(250),
        Datumaangemaakt DATETIME(6) NOT NULL,
        Datumgewijzigd DATETIME(6) NOT NULL,
        FOREIGN KEY (GebruikerId) REFERENCES Gebruiker (Id)
    );

CREATE TABLE
    Contact (
        Id INT PRIMARY KEY,
        GebruikerId INT NOT NULL,
        Email VARCHAR(100) NOT NULL,
        Mobiel VARCHAR(20) NOT NULL,
        Isactief BIT NOT NULL,
        Opmerking VARCHAR(250),
        Datumaangemaakt DATETIME(6) NOT NULL,
        Datumgewijzigd DATETIME(6) NOT NULL,
        FOREIGN KEY (GebruikerId) REFERENCES Gebruiker (Id)
    );

CREATE TABLE
    Medewerker (
        Id INT PRIMARY KEY,
        GebruikerId INT NOT NULL,
        Nummer MEDIUMINT NOT NULL,
        Medewerkersoort VARCHAR(20) NOT NULL,
        Isactief BIT NOT NULL,
        Opmerking VARCHAR(250),
        Datumaangemaakt DATETIME(6) NOT NULL,
        Datumgewijzigd DATETIME(6) NOT NULL,
        FOREIGN KEY (GebruikerId) REFERENCES Gebruiker (Id)
    );

CREATE TABLE
    Bezoeker (
        Id INT PRIMARY KEY,
        GebruikerId INT NOT NULL,
        Relatienummer MEDIUMINT NOT NULL,
        Isactief BIT NOT NULL,
        Opmerking VARCHAR(250),
        Datumaangemaakt DATETIME(6) NOT NULL,
        Datumgewijzigd DATETIME(6) NOT NULL,
        FOREIGN KEY (GebruikerId) REFERENCES Gebruiker (Id)
    );

CREATE TABLE
    Prijs (
        Id INT PRIMARY KEY,
        Tarief DECIMAL(5, 2) NOT NULL,
        Isactief BIT NOT NULL,
        Opmerking VARCHAR(250),
        Datumaangemaakt DATETIME(6) NOT NULL,
        Datumgewijzigd DATETIME(6) NOT NULL
    );

CREATE TABLE
    Voorstelling (
        Id INT PRIMARY KEY,
        MedewerkerId INT NOT NULL,
        Naam VARCHAR(100) NOT NULL,
        Beschrijving TEXT,
        Datum DATE NOT NULL,
        Tijd TIME NOT NULL,
        MaxAantalTickets INT NOT NULL,
        Beschikbaarheid VARCHAR(50) NOT NULL,
        Isactief BIT NOT NULL,
        Opmerking VARCHAR(250),
        Datumaangemaakt DATETIME(6) NOT NULL,
        Datumgewijzigd DATETIME(6) NOT NULL,
        FOREIGN KEY (MedewerkerId) REFERENCES Medewerker (Id)
    );

CREATE TABLE
    Ticket (
        Id INT PRIMARY KEY,
        BezoekerId INT NOT NULL,
        VoorstellingId INT NOT NULL,
        PrijsId INT NOT NULL,
        Nummer MEDIUMINT NOT NULL,
        Barcode VARCHAR(20) NOT NULL,
        Datum DATE NOT NULL,
        Tijd TIME NOT NULL,
        Status VARCHAR(20) NOT NULL,
        Isactief BIT NOT NULL,
        Opmerking VARCHAR(250),
        Datumaangemaakt DATETIME(6) NOT NULL,
        Datumgewijzigd DATETIME(6) NOT NULL,
        FOREIGN KEY (BezoekerId) REFERENCES Bezoeker (Id),
        FOREIGN KEY (VoorstellingId) REFERENCES Voorstelling (Id),
        FOREIGN KEY (PrijsId) REFERENCES Prijs (Id)
    );

CREATE TABLE
    Melding (
        Id INT PRIMARY KEY,
        BezoekerId INT,
        MedewerkerId INT,
        Nummer MEDIUMINT NOT NULL,
        Type VARCHAR(20) NOT NULL,
        Bericht VARCHAR(250) NOT NULL,
        Isactief BIT NOT NULL,
        Opmerking VARCHAR(250),
        Datumaangemaakt DATETIME(6) NOT NULL,
        Datumgewijzigd DATETIME(6) NOT NULL,
        FOREIGN KEY (BezoekerId) REFERENCES Bezoeker (Id),
        FOREIGN KEY (MedewerkerId) REFERENCES Medewerker (Id)
    );
-- gebruikers
INSERT INTO Gebruiker (Id, Voornaam, Tussenvoegsel, Achternaam, Gebruikersnaam, Wachtwoord, IsIngelogd, Ingelogd, Uitgelogd, Isactief, Opmerking, Datumaangemaakt, Datumgewijzigd)
VALUES 
(1, 'Jan', NULL, 'Jansen', 'jan.j', 'Matar1234@', 0, NULL, NULL, 1, NULL, SYSDATE(6), SYSDATE(6)),
(2, 'Lisa', 'van', 'Dijk', 'lisa.d', 'hashed_pw2', 0, NULL, NULL, 1, NULL, SYSDATE(6), SYSDATE(6)),
(3, 'Mark', NULL, 'Bos', 'mark.b', 'hashed_pw3', 0, NULL, NULL, 1, NULL, SYSDATE(6), SYSDATE(6)),
(4, 'Eva', 'de', 'Vries', 'eva.v', 'hashed_pw4', 0, NULL, NULL, 1, NULL, SYSDATE(6), SYSDATE(6)),
(5, 'Tom', NULL, 'Smit', 'tom.s', 'hashed_pw5', 0, NULL, NULL, 1, NULL, SYSDATE(6), SYSDATE(6));


-- rollen
INSERT INTO Rol (Id, GebruikerId, Naam, Isactief, Opmerking, Datumaangemaakt, Datumgewijzigd)
VALUES 
(1, 1, 'Administrator', 1, NULL, SYSDATE(6), SYSDATE(6)),
(2, 2, 'Medewerker', 1, NULL, SYSDATE(6), SYSDATE(6)),
(3, 3, 'Bezoeker', 1, NULL, SYSDATE(6), SYSDATE(6)),
(4, 4, 'Bezoeker', 1, NULL, SYSDATE(6), SYSDATE(6)),
(5, 5, 'Medewerker', 1, NULL, SYSDATE(6), SYSDATE(6));
-- contact 
INSERT INTO Contact (Id, GebruikerId, Email, Mobiel, Isactief, Opmerking, Datumaangemaakt, Datumgewijzigd)
VALUES 
(1, 1, 'jan@example.com', '0612345678', 1, NULL, SYSDATE(6), SYSDATE(6)),
(2, 2, 'lisa@example.com', '0612345679', 1, NULL, SYSDATE(6), SYSDATE(6)),
(3, 3, 'mark@example.com', '0612345680', 1, NULL, SYSDATE(6), SYSDATE(6)),
(4, 4, 'eva@example.com', '0612345681', 1, NULL, SYSDATE(6), SYSDATE(6)),
(5, 5, 'tom@example.com', '0612345682', 1, NULL, SYSDATE(6), SYSDATE(6));

-- medewerkers
INSERT INTO Medewerker (Id, GebruikerId, Nummer, Medewerkersoort, Isactief, Opmerking, Datumaangemaakt, Datumgewijzigd)
VALUES 
(1, 1, 101, 'Techniek', 1, NULL, SYSDATE(6), SYSDATE(6)),
(2, 2, 102, 'Kassa', 1, NULL, SYSDATE(6), SYSDATE(6)),
(3, 5, 103, 'Regie', 1, NULL, SYSDATE(6), SYSDATE(6)),
(4, 4, 104, 'Licht', 1, NULL, SYSDATE(6), SYSDATE(6)),
(5, 3, 105, 'Geluid', 1, NULL, SYSDATE(6), SYSDATE(6));

-- bezoekers
INSERT INTO Bezoeker (Id, GebruikerId, Relatienummer, Isactief, Opmerking, Datumaangemaakt, Datumgewijzigd)
VALUES 
(1, 3, 2001, 1, NULL, SYSDATE(6), SYSDATE(6)),
(2, 4, 2002, 1, NULL, SYSDATE(6), SYSDATE(6)),
(3, 2, 2003, 1, NULL, SYSDATE(6), SYSDATE(6)),
(4, 5, 2004, 1, NULL, SYSDATE(6), SYSDATE(6)),
(5, 1, 2005, 1, NULL, SYSDATE(6), SYSDATE(6));
-- prijzen
INSERT INTO Prijs (Id, Tarief, Isactief, Opmerking, Datumaangemaakt, Datumgewijzigd)
VALUES 
(1, 10.00, 1, NULL, SYSDATE(6), SYSDATE(6)),
(2, 15.00, 1, NULL, SYSDATE(6), SYSDATE(6)),
(3, 12.50, 1, NULL, SYSDATE(6), SYSDATE(6)),
(4, 20.00, 1, NULL, SYSDATE(6), SYSDATE(6)),
(5, 18.75, 1, NULL, SYSDATE(6), SYSDATE(6));

-- tickets
INSERT INTO Ticket (Id, BezoekerId, VoorstellingId, PrijsId, Nummer, Barcode, Datum, Tijd, Status, Isactief, Opmerking, Datumaangemaakt, Datumgewijzigd)
VALUES 
(1, 1, 1, 1, 301, 'OLD001', '2025-05-20', '14:00', 'Geboekt', 1, 'Ticket vóór 22 mei', SYSDATE(6), SYSDATE(6)),
(2, 2, 1, 2, 302, 'FUT001', '2025-06-20', '16:00', 'Geboekt', 1, 'Toekomstige ticket', SYSDATE(6), SYSDATE(6)),
(3, 3, 3, 3, 303, 'TOD001', CURDATE(), CURTIME(), 'Geboekt', 1, 'Ticket van vandaag', SYSDATE(6), SYSDATE(6)),
(4, 4, 2, 4, 304, 'FUT002', '2025-06-10', '13:00', 'Geboekt', 1, 'Nog een toekomstige ticket', SYSDATE(6), SYSDATE(6)),
(5, 5, 1, 5, 305, 'OLD002', '2025-05-20', '14:00', 'Geboekt', 1, 'Nog een ticket vóór 22 mei', SYSDATE(6), SYSDATE(6));



-- voorstelling
INSERT INTO
    Voorstelling (
        Id,
        MedewerkerId,
        Naam,
        Beschrijving,
        Datum,
        Tijd,
        MaxAantalTickets,
        Beschikbaarheid,
        IsActief,
        Opmerking,
        DatumAangemaakt,
        DatumGewijzigd
    )
VALUES
    (
        1,
        1,
        'Soldaat van oranje',
        'Een theaterstuk over de Tweede Wereldoorlog.',
        "2025-06-20",
        '16:00',
        50,
        40,
        1,
        NULL,
        SYSDATE(6),
        SYSDATE(6)
    ),
    (
        2,
        2,
        'Frozen',
        'Een musical over twee zussen',
        "2025-06-10",
        '13:00',
        100,
        30,
        1,
        NULL,
        SYSDATE(6),
        SYSDATE(6)
    ),
    (
        3,
        3,
        'Elizabeth',
        'Een Musical over de problemen van het hofsleven',
        "2025-05-29",
        '19:00',
        200,
        130,
        1,
        NULL,
        SYSDATE(6),
        SYSDATE(6)
    );

-- meldingen
INSERT INTO Melding (Id, BezoekerId, MedewerkerId, Nummer, Type, Bericht, Isactief, Opmerking, Datumaangemaakt, Datumgewijzigd)
VALUES 
(1, 1, 1, 401, 'Klacht', 'Geluid was te hard.', 1, NULL, SYSDATE(6), SYSDATE(6)),
(2, 2, 2, 402, 'Vraag', 'Waar is de uitgang?', 1, NULL, SYSDATE(6), SYSDATE(6)),
(3, 3, 3, 403, 'Feedback', 'Goede show!', 1, NULL, SYSDATE(6), SYSDATE(6)),
(4, 4, 4, 404, 'Klacht', 'Lange wachtrij.', 1, NULL, SYSDATE(6), SYSDATE(6)),
(5, 5, 5, 405, 'Vraag', 'Hoe laat begint het?', 1, NULL, SYSDATE(6), SYSDATE(6));
