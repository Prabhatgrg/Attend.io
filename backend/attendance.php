<?php

require_once ('../database/config.php');

if($_SERVER['REQUEST_METHOD']==="POST"){

    global $conn;
    $studentName = $_POST['studentName'];
    $semester = $_POST['semester'];
    $status = $_POST['status'];
    $getDate = date('Y-m-d');
    $currentDate = date('Y-m-d H:i:s');
    // $currentDate = CURRENT_DATE();
    // $query = "INSERT INTO attendance(student_id, status, currentDate)VALUES()";
    $query = $conn->prepare("INSERT INTO attendance(student_name, semester, status, currentDate)VALUES(?,?,?, ?)");
    $query->bind_param("sisi", $studentName, $semester, $status, $currentDate);

    if($query->execute()){
        $_SESSION['success'] = "Data Inserted Successfully";
        header('Location: ../dashboard.php');
    }else{
        echo 'Error Inserting Data';
    }
}

?>