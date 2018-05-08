<?php

    define('DBHOST', 'localhost');
    define('DBUSER', 'root');
    define('DBPASS', '');
    define('DBNAME', 'bildhuset');

    $db = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME ,DBUSER , DBPASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    date_default_timezone_set('Europe/Stockholm');



 ?>
