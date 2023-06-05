<?php

session_start();

require_once('../database/config.php');

//Check form submission
if($_SERVER['REQUEST_METHOD']==='POST'){
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $username = validate($_POST['username']);
    $password = validate($_POST['password']);

    //Check if credential match with database
    $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) != 0){
        $row = mysqli_fetch_assoc($result);
        print_r($row);
        if($row['username']==$username && $row['password']==$password){
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            header("Location: ../dashboard.php");
        }else{
            header("Location: ../index.php");
        }
    }
}
?>