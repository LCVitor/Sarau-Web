CREATE DATABASE IF NOT EXISTS db_SarauWeb;
USE db_SarauWeb;

DROP TABLE IF EXISTS roles;
CREATE TABLE IF NOT EXISTS roles (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    description VARCHAR(100) NOT NULL
);
INSERT INTO roles (name, description) VALUES ("ADMIN", "Administrador do sistema");
INSERT INTO roles (name, description) VALUES ("PARTICIPANT", "Participante comum");

DROP TABLE IF EXISTS users;
CREATE TABLE IF NOT EXISTS users (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    gender ENUM('MALE','FEMALE','OTHER','PREFER_NOT_TO_SAY') NULL,
    number_phone VARCHAR(20) NULL,
    birth_date DATE NULL,
    id_role INT NOT NULL,
    FOREIGN KEY (id_role) REFERENCES roles (id)
);
-- ALTER TABLE users
-- MODIFY COLUMN gender ENUM('MALE','FEMALE','OTHER','PREFER_NOT_TO_SAY') NULL,
-- MODIFY COLUMN number_phone VARCHAR(20) NULL,
-- MODIFY COLUMN birth_date DATE NULL;

INSERT INTO users (name, email, password, gender, number_phone, birth_date, id_role) VALUES ("Participante 1", "participante1@gmail.com", "$2b$12$ksdLUa2jXMng7hdnonp5neudprhbBI7/sS9MET5tCAJZEmp.qGxni", "FEMALE", "51980553292", "2006-05-16", 2);
INSERT INTO users (name, email, password, gender, number_phone, birth_date, id_role) VALUES ("Administrador 1", "admin1@gmail.com", "$2b$12$ksdLUa2jXMng7hdnonp5neudprhbBI7/sS9MET5tCAJZEmp.qGxni", "MALE", "51980553292", "1980-10-10", 1);
-- Senha dos users de teste: "teste";

DROP TABLE IF EXISTS events;
CREATE TABLE IF NOT EXISTS events (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    date DATE NOT NULL
);
INSERT INTO events (name, date) VALUES ("SARAU CULTURAL 2024", "2024-10-10");
INSERT INTO events (name, date) VALUES ("SARAU CULTURAL 2025", "2025-05-26");

DROP TABLE IF EXISTS sector_artistic;
CREATE TABLE IF NOT EXISTS sector_artistic (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL
);
INSERT INTO sector_artistic (name) VALUES 
("Música"),
("Dança"),
("Teatro"),
("Exposição");

DROP TABLE IF EXISTS enrollment;
CREATE TABLE IF NOT EXISTS enrollment (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    observation VARCHAR(255) NOT NULL,
    presentation_time TIME,
    id_event INT NOT NULL,
    id_user INT NOT NULL,
    id_sector_artistic INT NOT NULL,
    FOREIGN KEY (id_user) REFERENCES users (id),
    FOREIGN KEY (id_event) REFERENCES events (id),
    FOREIGN KEY (id_sector_artistic) REFERENCES sector_artistic (id)
);
INSERT INTO enrollment (observation, presentation_time, id_event, id_user, id_sector_artistic)
VALUES 
('Apresentação de violão solo', '00:30:00', 1, 1, 1);

INSERT INTO enrollment (observation, presentation_time, id_event, id_user, id_sector_artistic)
VALUES 
('Apresentação de violão solo', '00:30:00', 2, 1, 1);

DROP TABLE IF EXISTS approveds;
CREATE TABLE IF NOT EXISTS approveds(
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    date_approved DATE NOT NULL,
    id_enrollment INT NOT NULL,
    FOREIGN KEY (id_enrollment) REFERENCES enrollment (id)
);

DROP TABLE IF EXISTS dismisseds;
CREATE TABLE IF NOT EXISTS dismisseds(
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    date_dismissed DATE NOT NULL,
    description VARCHAR(100),
    id_enrollment INT NOT NULL,
    FOREIGN KEY (id_enrollment) REFERENCES enrollment (id)
);