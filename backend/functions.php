<?php

require_once './database/config.php';

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

// User Functions
