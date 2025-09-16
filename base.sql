CREATE DATABASE reflexology CHARSET utf8mb4;

USE reflexology;

CREATE TABLE IF NOT EXISTS pages(
	id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(50) NOT NULL UNIQUE,
    content TEXT NOT NULL,
    date_update DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS users(
	id INT PRIMARY KEY AUTO_INCREMENT,
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    `password` VARCHAR(100) NOT NULL,
    telephone VARCHAR(20),
    signup_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    connexion_date DATETIME,
    active BOOLEAN DEFAULT TRUE
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS roles(
	id INT PRIMARY KEY AUTO_INCREMENT,
    role_name VARCHAR(50) NOT NULL UNIQUE
)ENGINE=InnoDB;

ALTER TABLE users ADD COLUMN id_roles INT NOT NULL,
    ADD CONSTRAINT FOREIGN KEY (id_roles) REFERENCES roles(id);
    
CREATE TABLE IF NOT EXISTS services(
	id INT PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(50) NOT NULL,
    `description` TEXT NOT NULL,
    duration_minutes INT NOT NULL,
    price DECIMAL(5,2),
    active BOOLEAN DEFAULT TRUE
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS slots(
	id INT PRIMARY KEY AUTO_INCREMENT,
    `date` DATE NOT NULL,
    start_time TIME NOT NULL,
    end_time TIME NOT NULL,
    available BOOLEAN DEFAULT TRUE
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS reservations(
	id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    services_id INT NOT NULL,
    slot_id INT NOT NULL,
    `status` VARCHAR(50),
    reservation_date DATETIME,
    `comment` TEXT,
    CONSTRAINT fk_reservation_users FOREIGN KEY (user_id) REFERENCES users(id)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS contact(
	id INT PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    `subject` VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    sent_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    user_id INT,
    CONSTRAINT fk_contact FOREIGN KEY (user_id) REFERENCES users(id)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS user_services(
	user_id INT NOT NULL,
    service_id INT NOT NULL,
    PRIMARY KEY (user_id, service_id),
    CONSTRAINT fk_user_services_users FOREIGN KEY (user_id) REFERENCES users(id),
    CONSTRAINT fk_user_services_services FOREIGN KEY (service_id) REFERENCES services(id)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS services_reservations(
	service_id INT NOT NULL,
    reservation_id INT NOT NULL,
    PRIMARY KEY (service_id, reservation_id),
    CONSTRAINT fk_services_reservations_service FOREIGN KEY (service_id) REFERENCES services(id),
    CONSTRAINT fk_services_reservations_reservation FOREIGN KEY (reservation_id) REFERENCES reservations(id)
)ENGINE=InnoDB;