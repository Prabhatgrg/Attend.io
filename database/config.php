<?php

define('SERVERNAME', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
define('DB_NAME', 'attend.io');

//Create Connection
function connect_db()
{
    $conn = new mysqli(SERVERNAME, USER, PASSWORD, DB_NAME);
    if (!$conn) {
        die("Failed to Connect to Database: " . mysqli_error($conn));
    } else {
        echo '<script>alert("Successfully Connected")</script>';
    }
    return $conn;
}
?>