CREATE TABLE IF NOT EXISTS admin(
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS students(
    student_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS attendance(
    attendance_id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT,
    subject VARCHAR(100) NOT NULL,
    status VARCHAR(255) NOT NULL,
    currentDate date NOT NULL,
    FOREIGN KEY (student_id) REFERENCES students(student_id)
);