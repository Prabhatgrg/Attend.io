<?php

require_once '../database/config.php';

if(!isset($_GET['attendance_id'])){
    header('Location: ../dashboard.php');
}

$attendance_id = $_GET['attendance_id'];
echo $attendance_id;

$stmt = $conn->prepare("DELETE FROM attendance WHERE attendance_id=?");
$stmt->bind_param("i", $attendance_id);
if($stmt->execute()){
    header('Location: ../dashboard.php');
}

?>