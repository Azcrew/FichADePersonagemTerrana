<?php
    define("_ROOT_", "/var/www/html");

    session_start();
    session_destroy();
    header("location: /php/login.php");