<?php

$routes = [
    get_root_directory() . '/' => 'login.php',
    get_root_directory() . '/register' => 'register.php',
    get_root_directory() . '/dashboard' => 'dashboard.php'
];

$path = parse_url($_SERVER['REQUEST_URI'])['path'];

if(array_key_exists($path, $routes)){
    require $routes[$path];
}else{
    require '404.php';
}

?>