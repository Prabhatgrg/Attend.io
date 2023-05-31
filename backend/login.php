<?php

require_once('../database/config.php');

//Check form submission
if($_SERVER['REQUEST_METHOD']==='POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];

    //Check if credential match with database
    $query = "SELECT * FROM admin WHERE username=$username";
    $result = mysqli_query($con, $query);
    
    if(mysqli_num_rows($result)){

    }
}

?>