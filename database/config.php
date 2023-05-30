<?php

define('SERVERNAME', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
define('DB_NAME', 'attend.io');

//Create Connection
$conn = new mysqli(SERVERNAME, USER, PASSWORD, DB_NAME);
if (!$conn) {
    die("Failed to Connect to Database: " . mysqli_connect_error());
} else {
    echo '<script>alert("Successfully Connected")</script>';
}
// function connect_db()
// {
// }
?>