<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
require 'Controller.php';

$controller  = new Controller();
$response = json_decode('');
$request = json_encode($_POST, true);
switch ($_POST['method']){
    case 'film':
        $response = $controller->film($_POST);
        break;
    case 'post':
        $response = $controller->post($_POST);
        break;
}

//rint_r($response);
echo $request;


sleep(2);  
return 0;
