<?php

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

    // if(empty($username)){
    //     header("Location: index.php?error=Username is required");
    //     exit();
    // }
    // if(empty($password)){
    //     header("Location: index.php?error=Password is required");
    //     exit();
    // }

    //Check if credential match with database
    $query = "SELECT * FROM admin WHERE username=$username AND password=$password";
    $result = mysqli_query($conn, $query);
    

    if(mysqli_num_rows($result) != 0){
        $row = mysqli_fetch_assoc($result);
        if($row=['username']===$username && $row=['password']===$password){
            echo 'Logged In';
            // $_SESSION['id'] = $row['id'];
            // $_SESSION['username'] = $row['username'];
            // header("Location: dashboard.php");
            // exit();
        }
    }
}

?>