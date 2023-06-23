<?php
require_once '../database/config.php';


if(!isset($_GET['attendance_id'])){
    header('Location: ../dashboard.php');
}

$attendance_id = $_GET['attendance_id'];
echo $attendance_id;

$stmt=$conn->prepare("SELECT status FROM attendance WHERE attendance_id=?");
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $status = $_POST['status'];
    $stmt = $conn->prepare("UPDATE attendance SET status=? WHERE attendance_id=?");
    $stmt->bind_param("si", $status, $attendance_id);
    if($stmt->execute()){
        header('Location: ../dashboard.php');
    }
}

$stmt->bind_param("i", $attendance_id);
$stmt->execute();

$result = $stmt->get_result();
$row = $result->fetch_array(MYSQLI_ASSOC)['status'];
?>

<form method="post">
    <select name="status" id="">
        <option value="present" <?php if ($row == 'present') echo 'selected'; ?>>present</option>
        <option value="absent" <?php if ($row == 'absent') echo 'selected'; ?>>absent</option>
        <option value="on-leave" <?php if ($row == 'on-leave') echo 'selected'; ?>>on-leave</option>
    </select>
    <button type="submit">Submit</button>
</form>