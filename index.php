<?php

define('BASEDIR', '/' . basename(__DIR__));

require_once './database/config.php';
require_once './main_functions.php';
require_once './backend/index.php';

session_start();

require_once 'routes.php';

$conn->close();

?>