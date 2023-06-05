CREATE TABLE IF NOT EXISTS admin(
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS students(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL, 
    semester VARCHAR(10) NOT NULL
);

CREATE TABLE IF NOT EXISTS attendance(
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT NOT NULL,
    status ENUM('present', 'absent', 'on_leave'),
    currentDate date NOT NULL DEFAULT CURRENT_DATE(),
    FOREIGN KEY (student_id) REFERENCES students(id)
);