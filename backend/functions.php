<?php

require_once './database/config.php';

// User Functions
function is_login(){
    if(isset($_SESSION['id'])){
        return true;
    }else{
        return false;
    }
}

function check_if_login(){
    if(!is_login()){
        header('Location: ' . './index.php');
    }
}

// Authentication
function auth($username, $password){
    global $conn;

    $stmt=$conn->prepare("SELECT * FROM admin WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();

    $result = $stmt->get_result();

    if($result->num_rows==0){
        echo 'Username does not exist' ;
    }else{
        $user=$result->fetch_array(MYSQLI_ASSOC);
        if($user['username']==$username && password_verify($password,$user['password'])){
            $_SESSION['id']=$user['id'];
            $_SESSION['username']=$user['username'];
            header('Location: ./dashboard.php');
        }else{
            echo 'Incorrect username or password';
        }
    }
}

// Query to retrieve the current date from the database
function retrieveDate(){
    global $conn;
    $sql = "SELECT currentDate FROM attendance";
    $result = mysqli_query($conn, $sql);
    
    if ($result->num_rows > 0) {
        // Fetch the result row
        $row = $result->fetch_assoc();
        // Get the value of currentDate column
        $currentDate = $row["currentDate"];
        return $currentDate;
    
    } else {
        echo "No data found!";
    }
}
