<?php

// session_start();
require_once '../database/config.php';
require_once '../backend/functions.php';

//Check form submission
if($_SERVER['REQUEST_METHOD']==='POST'){

    $username = validate($_POST['username']);
    $password = validate($_POST['password']);

    $message = auth($username, $password);

}
?>