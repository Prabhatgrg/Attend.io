<?php

//Check form submission
if($_SERVER['REQUEST_METHOD']==='POST'){

    $username = validate($_POST['username']);
    $password = validate($_POST['password']);

    $message = auth($username, $password);

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attend.io</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <!-- Login Section -->
    <main class="form-signin d-flex flex-column align-items-center justify-content-center vh-100">
        <form class="w-50 d-flex flex-column gap-3" method="post">
            <h1 class="h3 mb-3 fw-normal text-center">Attend.io</h1>
            <?php if (isset($message['error'])) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $message['error']; ?>
                </div>
            <?php endif; ?>
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" placeholder="username" name="username" required>
                <label for="floatingInput">Username</label>
                <?php if (isset($message['username'])) : ?>
                    <span class="text-danger">
                        <?php echo $message['username']; ?>
                    </span>
                <?php endif; ?>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" required>
                <label for="floatingPassword">Password</label>
            </div>
            <button class="w-100 btn btn-lg btn-dark br-15" type="submit">Login</button>
        </form>
        <div class="mt-3 register-container d-flex">
            <p class="me-2">Don't have a account?</p>
            <a href="<?php echo get_root_directory(); ?>/register">Click here</a>
            <!-- <a href='./frontend/register.php'>Click here</a> -->
        </div>
        <p class="mb-3 text-center">© Copyright 2023. All Rights Reserved.</p>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>