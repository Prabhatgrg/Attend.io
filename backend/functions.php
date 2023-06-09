<?php
// User Functions
function is_login(){
    if(isset($_SESSION['user_id'])){
        return true;
    }else{
        return false;
    }
}

function check_if_login(){
    if(!is_login()){
        header('Location: ' . get_root_directory() . '/');
    }
}

// Validation
function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Authentication
function auth($username, $password){
    global $conn;

    $message = [];

    $stmt=$conn->prepare("SELECT * FROM admin WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();

    $result = $stmt->get_result();

    // var_dump($result);
    if($result->num_rows==0){
        $message['username'] = 'Username does not exist' ;
    }else{
        $user=$result->fetch_array(MYSQLI_ASSOC);
        // var_dump($user);
        // if($user['username']==$username && password_verify($password,$user['password'])){
        //     $_SESSION['user_id']=$user['id'];
        //     var_dump($_SESSION['user_id']);
        //     header('Location: ' . get_root_directory() . '/dashboard');

        // }else{
        //     $message['error'] = 'Incorrect username or password';
        // }
        // var_dump($result);
        if($user['username'] == $username && $user['password'] == $password){
            $_SESSION['user_id'] = $user['id'];
            // var_dump($_SESSION['user_id']);
            header('Location: ' . get_root_directory() . '/dashboard');
        }else{
            $message['error'] = "Incorrect username or password";
        }
    }
    return $message;
}

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

// function get_student_id($id){
//     global $conn;
    
//     $stmt=$conn->prepare("SELECT * FROM attendance WHERE student_id=?");
//     $stmt->bind_param("i", $id);
//     $stmt->execute();
//     $result = $stmt->get_result();
    
//     return $result;
// }

function get_studentnamebyid($student_id){
    global $conn;

    $stmt = $conn->prepare("SELECT name FROM students WHERE student_id=?");
    $stmt->bind_param("s", $student_id);
    $stmt->execute();

    $result = $stmt->get_result();
    return $result->fetch_array(MYSQLI_ASSOC)['name'];
    // var_dump($result->fetch_array(MYSQLI_ASSOC));
}