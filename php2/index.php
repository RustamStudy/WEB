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
            echo json_encode($response);
            break;
        case 'post':
            $response = $controller->post($_POST);
            echo json_encode($response);
            break;
        case 'edit':
            Database::editPlaces($_POST['id1'],$_POST['id2']);
            echo json_encode($_POST, true);
            break;
        case 'delete':
            Database::deletePlaces($_POST['id1']);
            echo json_encode($_POST, true);
           // header('location: /php2/adminview.php');
            break;
        case 'places':
            $response1 = Database::getPlase($_POST['id1']);
            echo json_encode($response1);
            //print_r($_POST['id1']);
            break;
    }
    
    sleep(2);
    return 0;
}
if (isset($_POST['name'])) {
    echo json_encode('123');
}
//print_r($response);
//echo $request;
