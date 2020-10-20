<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
    include_once "userData.php";
    echo json_encode(\userData::checkData($_POST));

    sleep(2);
?>