<?php

// require_once '../database/config.php';
require_once 'C:\xampp\htdocs\Attendance-System\database\config.php';
if($_SERVER['REQUEST_METHOD']==="POST"){

    global $conn;
    $studentId = $_POST['student_id'];
    $subject = $_POST['subject'];
    $status = $_POST['status'];
    $currentDate = date('Y-m-d');
    
    $query = $conn->prepare("INSERT INTO attendance(student_id, subject, status, currentDate)VALUES(?,?,?,?)");
    $query->bind_param("isss", $studentId, $subject, $status, $currentDate);

    if($query->execute()){
        $_SESSION['success'] = "Data Inserted Successfully";
        header('Location: ' . get_root_directory() . '/dashboard');
    }else{
        echo 'Error Inserting Data';
    }
}

?>