<?php

$routes = [
    get_root_directory() . '/' => 'frontend/login.php',
    get_root_directory() . '/register' => 'frontend/register.php',
    get_root_directory() . '/dashboard' => 'frontend/dashboard.php',
    get_root_directory() . '/404' => 'frontend/404.php',
    get_root_directory() . '/attendance' => 'backend/attendance.php'
];

$path = parse_url($_SERVER['REQUEST_URI'])['path'];

// echo $path;
// echo '<br>';
// echo $routes[$path];

if(array_key_exists($path, $routes)){
    require $routes[$path];
}else{
    require 'frontend/404.php';
}

?>