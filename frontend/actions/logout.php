<?php

session_unset();
session_destroy();

header('Location: ' . get_root_directory() . '/');

?>