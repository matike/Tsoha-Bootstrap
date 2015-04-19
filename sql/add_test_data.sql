-- Doctor-taulun testidataa
INSERT INTO Laakari (nimi, email, salasana) VALUES ('Jukka Virtanen',  'jukka@medihome.fi', 'abc123');
INSERT INTO Laakari (nimi, email, salasana) VALUES ('Heikki Heikkilä', 'heikki@medihome.fi', '12345');

-- Patient-taulun testidataa
INSERT INTO Potilas (nimi, osoite, email, salasana) VALUES ('Jussi Jääskeläinen', 'Jussinkatu 12, Jussila', 'jussi@jussila.com', 'abc123');
INSERT INTO Potilas (nimi, osoite, email, salasana) VALUES ('Heikki Virtanen', 'Virtastie 12, Jussila', 'heikki@jussila.com', 'abc123');

-- History-taulun testidataa
INSERT INTO Historia (historia) VALUES ('Jussilla on ollut jalka kipeänä.');

INSERT INTO Ohje (potilas_id, ohje, paivamaara) VALUES ('1', 'Laita rasvaa kahdesti päivässä', '21.1.2014');

