<?php

require_once('../database/config.php');

global $conn;

connect_db();

// Check form submission
if($_SERVER['REQUEST_METHOD']==='POST'){
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password= $_POST['password'];

    //Insert Data Into Database
    $query = 'INSERT INTO `admin`(email, username, password)
    VALUES($email, $username, $password)';
    $execute = mysqli_query($conn, $query);
    
    if($execute){
        echo '<script>alert("Recorded Successfully")</script>';
    }
}

?>