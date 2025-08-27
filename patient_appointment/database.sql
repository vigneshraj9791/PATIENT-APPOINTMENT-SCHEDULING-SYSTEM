CREATE DATABASE patient_appointment;
USE patient_appointment;

CREATE TABLE doctors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    specialization VARCHAR(100) NOT NULL
);

CREATE TABLE appointments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    patient_name VARCHAR(100) NOT NULL,
    patient_email VARCHAR(100) NOT NULL,
    doctor_id INT NOT NULL,
    appointment_date DATE NOT NULL,
    appointment_time TIME NOT NULL,
    FOREIGN KEY (doctor_id) REFERENCES doctors(id),
    UNIQUE (doctor_id, appointment_date, appointment_time)
);

INSERT INTO doctors (name, specialization) VALUES
('Dr. Arjun Kumar', 'Cardiology'),
('Dr. Meena Sharma', 'Dermatology'),
('Dr. Rajesh Nair', 'Orthopedics'),
('Dr. Kavita Reddy', 'Neurology');