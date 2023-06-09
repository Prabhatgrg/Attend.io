<?php

require_once './database/config.php';
function retrieveDate()
{
    global $conn;
    // $date = "SELECT DATE(currentDate) FROM attendance";
    // $result = $date->execute();
    // return $result;
    $query = "SELECT currentDate FROM attendance";
    $execute = mysqli_query($conn, $query);
    $result = DateTime::createFromFormat('Y-m-d', $execute);
    return $result;
}
?>