<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
    include_once __DIR__ . "/userData.php";
    userData::checkData($_POST);
    
    sleep(3);
?>