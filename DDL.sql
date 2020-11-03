DROP DATABASE IF EXISTS peer1;

CREATE DATABASE peer1;
USE peer1;


CREATE TABLE users(
    id              INTEGER UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_name       VARCHAR('191') NOT NULL UNIQUE,
    email           VARCHAR('191') NOT NULL UNIQUE,
    full_name       VARCHAR('191') NOT NULL

);

CREATE TABLE trainors(
    id              INTEGER UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id         INTEGER UNSIGNED NOT NULL,
    specialty       VARCHAR('191') NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE courses(
    id              INTEGER UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    trainor_id      INTEGER UNSIGNED NOT NULL,
    title           VARCHAR('191') NOT NULL,
    description   VARCHAR('191') NOT NULL,
    FOREIGN KEY (trainor_id) REFERENCES trainors(id)
);

CREATE TABLE trainees(
    id              INTEGER UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id         INTEGER UNSIGNED NOT NULL,
    course_id       INTEGER UNSIGNED NOT NULL,
    status          VARCHAR('191') NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (course_id) REFERENCES courses(id) 
);

INSERT INTO users (user_name, email, full_name)
    VALUES     
    ('Mia','mialars.18@gmail.com','Lara Mia Dell R. Lara'),
    ('Let2','lettermaymulles@gmail.com','Lettermay Mulles');

INSERT INTO trainors (user_id, specialty)
    VALUES 
    ('1','Boxing'),
    ('2','Fencing');

INSERT INTO courses (trainor_id, title, description)
    VALUES 
    ('1','Kickboxing','All about kickboxing'),
    ('2','Basic Fencing','All basic in fencing');

INSERT INTO trainees (user_id, course_id, status)
    VALUES 
    ('1','2','Begginer'),
    ('2','1','Begginer');