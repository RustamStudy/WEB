<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
require 'Controller.php';
if (isset($_POST['method'])) {
    $controller  = new Controller();
    $response = json_decode('');
    $request = json_encode($_POST, true);

    switch ($_POST['method']) {
        case 'film':
            $response = $controller->film($_POST);
            break;
        case 'post':
            $response = $controller->post($_POST);
            break;
    }
    echo json_encode($response);
    sleep(2);
    return 0;
}
if (isset($_POST['name'])) {
    echo json_encode('123');
}
//print_r($response);
//echo $request;
