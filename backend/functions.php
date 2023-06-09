<?php

require_once './database/config.php';
function getDate()
{
    global $conn;
    $date = "SELECT currentDate FROM attendance";
    $execute = mysqli_query($conn, $date);
    $format = strtotime($execute);
    $result = date('Y-m-d', $format);
    return $result;
}
?>