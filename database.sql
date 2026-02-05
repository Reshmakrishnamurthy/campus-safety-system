CREATE DATABASE campussafe;
USE campussafe;

CREATE TABLE staff (
    staff_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    role ENUM('Responder','Administrator'),
    email VARCHAR(100),
    password VARCHAR(255)
);

INSERT INTO staff (name, role, email, password)
VALUES ('John Admin','Administrator','admin@campus.com', MD5('123456'));

CREATE TABLE complaints (
    complaint_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    description TEXT,
    status ENUM('Pending','Assigned','Resolved') DEFAULT 'Pending',
    assigned_to INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE hazards (
    hazard_id INT AUTO_INCREMENT PRIMARY KEY,
    description TEXT,
    photo VARCHAR(255),
    location VARCHAR(255),
    reported_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE emergency_status (
    status_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    details TEXT,
    location VARCHAR(255),
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO emergency_status (title, details, location)
VALUES ('Fire Drill','Fire drill in progress','Block B');
