<?php

require_once('../database/config.php');

// global $conn;
// connect_db();

// Check form submission
if($_SERVER['REQUEST_METHOD']==='POST'){
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password= $_POST['password'];

    //Insert Data Into Database
    $query = "INSERT INTO admin(email, username, password)VALUES('$email', '$username', '$password')";
    $result = mysqli_query($conn, $query);

    if($result){
        echo 'Data Inserted Successfully';
    }else{
        echo "Error: " . mysqli_error($conn);
    }
}
?>