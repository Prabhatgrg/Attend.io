<?php

check_if_login();

if(!isset($_GET['attendance_id'])){
    header('Location: ' . get_root_directory() . '/dashboard');
}

$attendance_id = $_GET['attendance_id'];
echo $attendance_id;

$stmt = $conn->prepare("DELETE FROM attendance WHERE attendance_id=?");
$stmt->bind_param("i", $attendance_id);
if($stmt->execute()){
    header('Location: ' . get_root_directory() . '/dashboard');
}

?>