<?php
if (defined('TEST')) {
    echo TEST;
    exit;
} else {
    define("TEST", 1);
    include 'test.php';
}

 ?>
