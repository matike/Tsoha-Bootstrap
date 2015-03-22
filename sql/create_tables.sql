CREATE TABLE Laakari(
id SERIAL PRIMARY KEY,
nimi varchar(100) NOT NULL,
puhelin varchar(15) NOT NULL,
email varchar(100) NOT NULL,
salasana varchar(50) NOT NULL
);

CREATE TABLE Potilas(
id SERIAL PRIMARY KEY,
nimi varchar(100) NOT NULL,
osoite varchar(100) NOT NULL,
email varchar(100) NOT NULL,
salasana varchar(50) NOT NULL
);

CREATE TABLE Historia(
id SERIAL PRIMARY KEY,
potilas_id INTEGER REFERENCES Potilas(id),
historia text
);

CREATE TABLE Kaynti(
id SERIAL PRIMARY KEY,
potilas_id INTEGER REFERENCES Potilas(id),
laakari_id INTEGER REFERENCES Laakari(id),
paivamaara date
);

CREATE TABLE Raportti(
id SERIAL PRIMARY KEY,
kaynti_id INTEGER REFERENCES Kaynti(id),
laakari_id INTEGER REFERENCES Laakari(id),
potilas_id INTEGER REFERENCES Potilas(id),
kuvaus text NOT NULL
);

CREATE TABLE Ohje(
id SERIAL PRIMARY KEY,
potilas_id INTEGER REFERENCES Potilas(id),
ohje text NOT NULL,
paivamaara date
);
