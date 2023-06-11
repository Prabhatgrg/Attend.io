<?php

require_once './database/config.php';

function getDataByDate($data_result){
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM attendance WHERE date = ?");
    $stmt->bind_param("s", $data_result);
    if($stmt->execute()){
        $result = $stmt->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);
        return $data;
    }
}
?>