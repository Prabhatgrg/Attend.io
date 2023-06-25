<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attend.IO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <!-- Login Section -->
    <main class="form-signin d-flex flex-column align-items-center justify-content-center vh-100">
        <form class="w-50 d-flex flex-column gap-3" action="./backend/register.php" method="post">
            <h1 class="h3 mb-3 fw-normal text-center">Attend.io</h1>
            <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email" required>
                <label for="email">Email address</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" placeholder="admin123" name="username" required>
                <label for="username">Username</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" required>
                <label for="password">Password</label>
            </div>

            <button class="w-100 btn btn-lg btn-dark br-10" type="submit" name="submit">Register</button>
        </form>
        <div class="mt-3 register-container d-flex">
            <p class="me-2">Already have a account?</p>
            <a href="<?php echo get_root_directory();?>/">Click here</a>
        </div>
        <p class="mb-3 text-center">© Copyright 2023. All Rights Reserved.</p>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>