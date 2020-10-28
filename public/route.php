<?php

require __DIR__.'/../vendor/autoload.php';
use App\Controller\Controller;

$method = $_SERVER['REQUEST_METHOD'];

$controller  = new Controller();

$response = [];

if ($method === 'POST'){
    $POST = json_encode($_POST, true);

    switch ($_POST['method']){
        case 'film':
            $response = $controller->film($_POST);
            break;
        case 'post':
            $response = $controller->post($_POST);
            break;
    }

    echo json_encode($response);
    exit();
}
