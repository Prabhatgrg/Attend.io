<?php

require_once './database/config.php';

if($_SERVER['REQUEST_METHOD']==="POST"){
    $semester = $_POST['semester'];
    $studentName = $_POST['studentName'];
    // $query = "INSERT INTO attendance(student_id, status, currentDate)VALUES()";
    $query = $conn->prepare("INSERT INTO attendance(student_name, semester, status, currentDate)VALUES(?,?,?)");
    $query->bind_param("is", $semester, $studentName);
    $query->execute();
    $result = $query->get_result();
}

?>