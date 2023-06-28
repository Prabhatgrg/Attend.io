<?php
  $currentDate = date('Y-m-d');
  $query = $conn->prepare("SELECT * FROM attendance WHERE currentDate=?");
  $query->bind_param("s", $currentDate);
  $query->execute();

  $result = $query->get_result();

  // $result = mysqli_query($conn, $query);
  // $numRows = mysqli_num_rows($result);
  // echo $currentDate;
  // $row = $result->fetch_assoc();
  $rows = $result->fetch_all(MYSQLI_ASSOC);

  if ($rows) : ?>
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
        <?php
        foreach ($rows as $row) :
        ?>

          <tr>
            <th scope="row"><?php echo $row['attendance_id'] ?></th>
            <td><?php echo get_studentnamebyid($row['student_id']) ?></td>
            <td><?php echo $row['subject'] ?></td>
            <td><?php echo $row['status'] ?></td>
            <td class=" w-25">
              <a href="<?php echo get_root_directory(); ?>/edit?attendance_id=<?php echo $row['attendance_id'] ?>" class="btn bg-success">Edit</a>
              <a href="<?php echo get_root_directory(); ?>/delete?attendance_id=<?php echo $row['attendance_id'] ?>" class="btn bg-danger">Delete</a>
              <!-- <button class="btn bg-success">Edit</button>
              <button class="btn bg-danger">Delete</button> -->
            </td>
          </tr>

        <?php
        endforeach;
        ?>
      </tbody>
    <?php
  else :
    $query = $conn->prepare("SELECT * FROM attendance ORDER BY currentDate DESC");
    $query->execute();
    // $currentDate = date('Y-m-d');
    $result = $query->get_result();
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    // var_dump($rows);
    // print_r($rows);

    foreach($rows as $row):
      $recentDate = $row['currentDate'];
    ?>
      <h3 class="text-center"><?php echo $recentDate; ?></h3>
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
          <?php
          foreach ($rows as $row) :
          ?>

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

          <?php
          endforeach;
          ?>
        </tbody>
      </table>
    <?php
    endforeach;
  endif;
    ?>