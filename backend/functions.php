<?php

require_once './database/config.php';
function retrieveDate()
{
    global $conn;
    $stmt = $conn->prepare("SELECT currentDate FROM attendance");
    if($stmt->execute()){
        $data = $stmt->get_result();
        $unformat = $data->fetch_all(MYSQLI_ASSOC);
    }
$today_date = date('Y-m-d');
}
function getDataByDate($data_result){

}
?>