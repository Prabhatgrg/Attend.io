<?php

session_start();

require_once '../database/config.php';
require_once '../backend/functions.php';

//Check form submission
if($_SERVER['REQUEST_METHOD']==='POST'){

    $username = validate($_POST['username']);
    $password = validate($_POST['password']);

    $message = auth($username, $password);

    //Check if credential match with database
    // $query = $conn->prepare("SELECT * FROM admin WHERE username=? AND password=?");
    // $query->bind_param("ss", $username, $password);
    // $query->execute();
    // $result = $query->get_result();
    // $result = mysqli_query($conn, $query);

    // if(mysqli_num_rows($result) != 0){
    //     $row = mysqli_fetch_assoc($result);
    //     // print_r($row);
    //     if($row['username']==$username && $row['password']==$password){
    //         $_SESSION['user_id'] = $row['id'];
    //         $_SESSION['username'] = $row['username'];
    //         header("Location: ../dashboard.php");
    //     }
    // }else{
    //     // echo 'Info does not match';
    //     $message['error']="Incorrect username or password";
    //     // header('Location: ../login.php');
    // }
}
?>