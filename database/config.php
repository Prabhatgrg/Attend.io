<?php

define('DB_NAME', 'attend.io');
define('SERVERNAME','localhost');
define('USER', 'root');
define('PASSWORD', '');

//Create Connection
function connect_db(){
    $conn = new mysqli(DB_NAME, SERVERNAME, USER, PASSWORD);
    if(!$conn){
        die("Failed to Connect to Database: " . mysqli_error($conn));
    }
    else{
        echo '<script>alert("Connection Successfull"</script>';
    }
}

?>