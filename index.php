<?php

define('BASEDIR', '/' . basename(__DIR__));

require_once './database/config.php';
require_once './backend/functions.php';
require_once './main_function.php';

session_start();

$conn->close();

?>