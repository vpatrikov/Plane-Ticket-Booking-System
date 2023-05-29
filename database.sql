CREATE TABLE trips (
  id MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `from` VARCHAR(255),
  `to` VARCHAR(255),
  take_off_time TIME,
  time_of_arrival TIME,
  plane_type VARCHAR(255),
  ticket_type VARCHAR(255),
  ticket_price DECIMAL(10,2),
  empty_seats INT
);

INSERT INTO trips VALUES (NULL, 'Sofia', 'London', '08:00', '10:30', 'Airbus A320', 'Economy', 280.00, 50);
INSERT INTO trips VALUES (NULL, 'Paris', 'Tokyo', '20:30', '11:00', 'Boeing 777', 'Economy', 980.00, 10);
INSERT INTO trips VALUES (NULL, 'New York', 'Dubai', '15:20', '02:00', 'Airbus A380', 'First Class', 3500.00, 20);
INSERT INTO trips VALUES (NULL, 'Berlin', 'Madrid', '11:45', '15:15', 'Boeing 737-800', 'Business', 670.00, 53);
INSERT INTO trips VALUES (NULL, 'Varna', 'Moscow', '13:15', '15:45', 'Airbus A320', 'Economy', 190.00, 58);
INSERT INTO trips VALUES (NULL, 'Singapore', 'Shanghai', '18:00', '20:30', 'Airbus A330', 'Business', 820.00, 4);
INSERT INTO trips VALUES (NULL, 'Berlin', 'Burgas', '13:15', '16:15', 'Embraer E190', 'Economy', 190.00, 7);
INSERT INTO trips VALUES (NULL, 'Rome', 'Athens', '14:20', '15:45', 'Embraer E190', 'Economy', 120.00, 10);
INSERT INTO trips VALUES (NULL, 'Beijing', 'Sydney', '09:10', '21:00', 'Boeing 747-400', 'Economy', 620.00, 20);
INSERT INTO trips VALUES (NULL, 'Plovdiv', 'Frankfurt', '11:45', '14:30', 'Airbus A319', 'Economy', 280.00, 15);

CREATE TABLE users (
  id MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  first_name VARCHAR(18),
  second_name VARCHAR(20),
  last_name VARCHAR(20),
  personal_id VARCHAR(10),
  phone_number VARCHAR(255),
  nationality VARCHAR(3),
  username VARCHAR(15),
  password VARCHAR(18),
  role VARCHAR(6)
);

INSERT INTO users VALUES (NULL, 'kArina', 'Peteva', 'Yotova', '0468932589', '0842763398', 'BG', 'admin', 'admin', 'Admin');


CREATE TABLE reservations (
  id MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  first_name VARCHAR(18),
  second_name VARCHAR(20),
  last_name VARCHAR(20),
  personal_id VARCHAR(10),
  phone_number VARCHAR(255),
  nationality VARCHAR(3),
  user_id MEDIUMINT,
  trip_id MEDIUMINT,
  FOREIGN KEY (user_id) REFERENCES users (id),
  FOREIGN KEY (trip_id) REFERENCES trips (id)
);