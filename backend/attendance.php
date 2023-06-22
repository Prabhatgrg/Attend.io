<?php

// require_once '../database/config.php';
require_once 'C:\xampp\htdocs\Attendance-System\database\config.php';
if($_SERVER['REQUEST_METHOD']==="POST"){

    global $conn;
    $studentName = $_POST['studentName'];
    $subject = $_POST['subject'];
    $status = $_POST['status'];
    $currentDate = date('Y-m-d');
    
    $query = $conn->prepare("INSERT INTO attendance(student_name, subject, status, currentDate)VALUES(?,?,?,?)");
    $query->bind_param("ssss", $studentName, $subject, $status, $currentDate);

    if($query->execute()){
        $_SESSION['success'] = "Data Inserted Successfully";
        header('Location: ../dashboard.php');
    }else{
        echo 'Error Inserting Data';
    }
}

?>