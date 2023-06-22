<?php
require_once './database/config.php';
require_once './backend/attendance.php';
require_once './backend/functions.php';

session_start() ?>

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
    <a href="/" class="d-flex align-items-center link-body-emphasis text-decoration-none">
      <span class="fs-4 text-white">Attend.io</span>
    </a>
    <h3 class="text-center">Admin Dashboard</h3>

    <ul class="nav nav-pills">
      <li class="nav-item"><a href="./backend/logout.php" class="nav-link active" aria-current="page">Logout</a></li>
    </ul>
  </header>
  <?php
  if (isset($_SESSION['status'])) {
    echo "<h3>" . $_SESSION['status'] . "<br>";
    unset($_SESSION['status']);
  }
  ?>
  <div class="form-control">
    <form action="./backend/attendance.php" method="post" class="d-flex gap-4 justify-content-center align-items-center">
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
        <input type="text" placeholder="Student Name" name="studentName">
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

  <?php
  $query = "SELECT * FROM attendance ORDER BY currentDate";
  $result = mysqli_query($conn, $query);
  // $numRows = mysqli_num_rows($result);
  $currentDate = date('Y-m-d');
  // echo $currentDate;
  // $row = $result->fetch_assoc();

  while ($row = $result->fetch_assoc()) {
    if ($currentDate == retrieveDate()) {

  ?>
      <h3 class="text-center"><?php echo retrieveDate() ?></h3>
      <table class="table table-dark table-hover text-center">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Subject</th>
            <th scope="col">Status</th>
            <th scope="col">Update</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row"><?php echo $row['student_id'] ?></th>
            <td><?php echo $row['student_name'] ?></td>
            <td><?php echo $row['subject'] ?></td>
            <td><?php echo $row['status'] ?></td>
            <td class=" w-25">
              <a href="#" class="btn bg-success">Edit</a>
              <a href="#" class="btn bg-danger">Delete</a>
              <!-- <button class="btn bg-success">Edit</button>
              <button class="btn bg-danger">Delete</button> -->
            </td>
          </tr>
        </tbody>
      </table>
    <?php
    } else {
    ?>
      <table class="table table-dark table-hover text-center">
        <tbody>
          <tr>
            <th scope="row"><?php echo $row['student_id'] ?></th>
            <td><?php echo $row['student_name'] ?></td>
            <td><?php echo $row['subject'] ?></td>
            <td><?php echo $row['status'] ?></td>
            <td class=" w-25">
              <a href="#" class="btn bg-success">Edit</a>
              <a href="#" class="btn bg-danger">Delete</a>
            </td>
          </tr>
        </tbody>
      </table>
  <?php
    }
  }
  ?>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>