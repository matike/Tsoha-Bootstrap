CREATE TABLE Doctor(
id SERIAL PRIMARY KEY,
doctor_name varchar(100) NOT NULL,
phone varchar(15) NOT NULL,
email varchar(100) NOT NULL,
password varchar(50) NOT NULL
);

CREATE TABLE Patient(
id SERIAL PRIMARY KEY,
patient_name varchar(100) NOT NULL,
address varchar(100) NOT NULL,
email varchar(100) NOT NULL,
password varchar(50) NOT NULL
);

CREATE TABLE History(
id SERIAL PRIMARY KEY,
patient_id INTEGER REFERENCES Patient(id),
history text
);

CREATE TABLE Visit(
id SERIAL PRIMARY KEY,
patient_id INTEGER REFERENCES Patient(id),
doctor_id INTEGER REFERENCES Doctor(id),
visit_date date
);

CREATE TABLE Report(
id SERIAL PRIMARY KEY,
visit_id INTEGER REFERENCES Visit(id),
doctor_id INTEGER REFERENCES Doctor(id),
patient_id INTEGER REFERENCES Patient(id),
description text NOT NULL
);

CREATE TABLE Regimen(
id SERIAL PRIMARY KEY,
patient_id INTEGER REFERENCES Patient(id),
regimen text NOT NULL,
regimen_date date
);
