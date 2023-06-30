<?php

if ($_SERVER['REQUEST_METHOD'] === "POST") {

  global $conn;
  $studentId = $_POST['student_id'];
  $subject = $_POST['subject'];
  $status = $_POST['status'];
  $currentDate = date('Y-m-d');

  $query = $conn->prepare("INSERT INTO attendance(student_id, subject, status, currentDate)VALUES(?,?,?,?)");
  $query->bind_param("isss", $studentId, $subject, $status, $currentDate);

  if ($query->execute()) {
    $_SESSION['success'] = "Data Inserted Successfully";
    header('Location: ' . get_root_directory() . '/dashboard');
  } else {
    echo 'Error Inserting Data';
  }
}

check_if_login();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="./assets/css/style.css">

</head>

<body>
  <!-- <h1>Welcome Admin</h1> -->
  <header class="d-flex align-items-center justify-content-between flex-wrap py-3 px-5 mb-4 text-bg-dark border-bottom">
    <a href="<?php echo get_root_directory(); ?>/" class="d-flex align-items-center link-body-emphasis text-decoration-none">
      <span class="fs-4 text-white">Attend.io</span>
    </a>
    <h3 class="text-center">Admin Dashboard</h3>

    <ul class="nav nav-pills">
      <li class="nav-item"><a href="<?php echo get_root_directory(); ?>/logout" class="nav-link active" aria-current="page">Logout</a></li>
    </ul>
  </header>
  <?php
  if (isset($_SESSION['status'])) {
    echo "<h3>" . $_SESSION['status'] . "<br>";
    unset($_SESSION['status']);
  }
  ?>
  <div class="form-control">
    <form method="post" class="d-flex gap-4 justify-content-center align-items-center">
      <div class="faculty">
        <label for="BCA"><strong>BCA 4th Semester:</strong></label>
        <label for="subject">Subject</label>
        <select name="subject" id="subject">
          <option value="Software Engineering">Software Engineering</option>
          <option value="Operating System">Operating System</option>
          <option value="DBMS">DBMS</option>
          <option value="Numerical Method">Numerical Method</option>
          <option value="Scripting Language">Scripting Language</option>
        </select>
      </div>
      <div class="info">
        <?php
        $query = $conn->prepare("SELECT * FROM students");
        $query->execute();
        $result = $query->get_result();

        $rows = $result->fetch_all(MYSQLI_ASSOC);

        // echo'<pre>';
        // var_dump($rows);
        // echo'</pre>';

        if ($rows) :

        ?>
          <select name="student_id" id="">
            <?php foreach ($rows as $row) : ?>
              <option value="<?php echo $row['student_id'] ?>"><?php echo $row['name']; ?></option>
            <?php endforeach; ?>
          </select>
        <?php endif; ?>
        <!-- <input type="text" placeholder="Student Name" name="studentName"> -->
      </div>

      <input type="radio" class="btn-check" name="status" id="present" value="present" autocomplete="off" checked>
      <label class="btn btn-outline-success" for="present">present</label>

      <input type="radio" class="btn-check" name="status" id="absent" value="absent" autocomplete="off">
      <label class="btn btn-outline-danger" for="absent">absent</label>

      <input type="radio" class="btn-check" name="status" id="on-leave" value="on-leave" autocomplete="off">
      <label class="btn btn-outline-warning" for="on-leave">on-leave</label>

      <button type="submit" class="btn btn-dark" name="add">Add</button>
    </form>
  </div>

  <form action="<?php echo get_root_directory(); ?>/result" method="post" class="d-flex gap-2 my-2 justify-content-center align-items-center">
    <label for="date">Pick a date:</label>
    <input type="date" id="date" name="date">
    <input type="submit" class="btn btn-dark">
  </form>

  <?php
  $row = $result->fetch_all(MYSQLI_ASSOC);
  $query = "SELECT DISTINCT currentDate FROM attendance";
  $result = mysqli_query($conn, $query);
  $currentDate = array();

  while ($row = mysqli_fetch_assoc($result)) {
    $currentDates[] = $row['currentDate'];
  }

  $query = $conn->prepare("SELECT * FROM attendance WHERE currentDate = ?");

  foreach ($currentDates as $currentDate) :
    $query->bind_param("s", $currentDate);
    $query->execute();
    $result = $query->get_result();

  ?>
    <h3 class="text-center"><?php echo $currentDate; ?></h3>
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
        <?php while ($row = $result->fetch_assoc()) { ?>
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
        <?php } ?>
      </tbody>
    </table>
  <?php endforeach; ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>