<?php

global $conn;

if (!isset($_GET['attendance_id'])) {
    header('Location: ' . get_root_directory() . '/dashboard');
}

$attendance_id = $_GET['attendance_id'];
echo $attendance_id;

$stmt = $conn->prepare("SELECT status FROM attendance WHERE attendance_id=?");
$stmt->bind_param("i", $attendance_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_array(MYSQLI_ASSOC);
// var_dump($row);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $status = $_POST['status'];
    $stmt = $conn->prepare("UPDATE attendance SET status=? WHERE attendance_id=?");
    $stmt->bind_param("si", $status, $attendance_id);
    if ($stmt->execute()) {
        header('Location: ' . get_root_directory() . '/dashboard');
    }
}

?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>

    <div class="form-control">
        <a href="<?php get_root_directory();?>/dashboard" type="button" class="btn btn-success">Back</a>
        <form method="post" class="d-flex flex-column gap-4 justify-content-center align-items-center">
            <div class="d-flex align-items-center title">
                <h3>Edit Status for Attendance ID: <?php echo $attendance_id; ?></h3>

            </div>
            <select name="status" id="">
                <option value="present" <?php if ($row == 'present') echo 'selected'; ?>>present</option>
                <option value="absent" <?php if ($row == 'absent') echo 'selected'; ?>>absent</option>
                <option value="on-leave" <?php if ($row == 'on-leave') echo 'selected'; ?>>on-leave</option>
            </select>
            <button type="submit" class="btn btn-dark">Submit</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>