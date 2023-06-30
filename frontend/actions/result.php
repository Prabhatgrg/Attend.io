<?php

check_if_login();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    global $conn;

    $date = $_POST['date'];

    $stmt = $conn->prepare("SELECT * FROM attendance WHERE currentDate = ?");
    $stmt->bind_param("s", $date);
    $stmt->execute();
    $result = $stmt->get_result();
    $rows = $result->fetch_all(MYSQLI_ASSOC);

    
    print_r($rows);
    // echo $row['student_id'];
}
?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>

    <div class="form-control">
        <a href="<?php echo get_root_directory(); ?>/dashboard" type="button" class="btn btn-success">Back</a>
    </div>

    <h3 class="text-center"><?php echo $date; ?></h3>
    <table class="table table-dark table-hover text-center">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Subject</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($rows as $row): ?>
                <tr>
                    <th scope="row"><?php echo $row['attendance_id'] ?></th>
                    <td><?php echo get_studentnamebyid($row['student_id']) ?></td>
                    <td><?php echo $row['subject'] ?></td>
                    <td><?php echo $row['status'] ?></td>
                    <td class=" w-25">
                        <a href="<?php echo get_root_directory(); ?>/edit?attendance_id=<?php echo $row['attendance_id'] ?>" class="btn bg-success">Edit</a>
                        <a href="<?php echo get_root_directory(); ?>/delete?attendance_id=<?php echo $row['attendance_id'] ?>" class="btn bg-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>