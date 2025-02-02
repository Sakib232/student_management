<?php
$host = 'localhost';
$dbname = 'student_management';
$username = 'root';
$password = '';

try {
    $pdo = new PDO(dsn: "mysql:host=$host;dbname=$dbname", username: $username, password: $password);
    $pdo->setAttribute(attribute: PDO::ATTR_ERRMODE, value: PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Database creation queries
$createTableQueries = [
    "CREATE TABLE IF NOT EXISTS students (
        id INT AUTO_INCREMENT PRIMARY KEY,
        student_id VARCHAR(20) UNIQUE NOT NULL,
        first_name VARCHAR(50) NOT NULL,
        last_name VARCHAR(50) NOT NULL,
        email VARCHAR(100) UNIQUE NOT NULL,
        phone VARCHAR(20),
        department VARCHAR(50),
        semester INT,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )",
    
    "CREATE TABLE IF NOT EXISTS courses (
        id INT AUTO_INCREMENT PRIMARY KEY,
        course_code VARCHAR(20) UNIQUE NOT NULL,
        course_name VARCHAR(100) NOT NULL,
        credits INT NOT NULL,
        department VARCHAR(50)
    )",
    
    "CREATE TABLE IF NOT EXISTS enrollments (
        id INT AUTO_INCREMENT PRIMARY KEY,
        student_id INT,
        course_id INT,
        enrollment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (student_id) REFERENCES students(id),
        FOREIGN KEY (course_id) REFERENCES courses(id)
    )"
];

foreach ($createTableQueries as $query) {
    try {
        $pdo->exec(statement: $query);
    } catch(PDOException $e) {
        echo "Error creating table: " . $e->getMessage();
    }
}
?>



 
