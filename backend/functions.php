<?php

require_once './database/config.php';
// function retrieveDate()
// {
//     global $conn;
//     $stmt = $conn->prepare("SELECT currentDate FROM attendance");
//     if($stmt->execute()){
//         $data = $stmt->get_result();
//         $unformat = $data->fetch_all(MYSQLI_ASSOC);
//     }
// $today_date = date('Y-m-d');
// }
// function getDataByDate($data_result){
//     global $conn;
//     $stmt = $conn->prepare("SELECT * FROM attendance WHERE date = ?");
//     $stmt->bind_param("s", $data_result);
//     if($stmt->execute()){
//         $result = $stmt->get_result();
//         $data = $result->fetch_all(MYSQLI_ASSOC);
//         $today_date = new DateTime('Y-m-d');
//         return var_dump($today_date);
//         // return $today_date;
//     }
// }

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
