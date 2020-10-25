<?php

    $name = $_POST['nameOrder'];
    $phone = $_POST['telOrder'];
    define('USER_LIST', __DIR__.'/users.txt');
    $data = file_get_contents(USER_LIST);
    //$data = file_get_contents('/users.txt');
    $data .= "\r\nName: $name, Phone: $phone";
    file_put_contents(__DIR__.'/users.txt', $data);

    define('USER_LIST', __DIR__.'/users.csv');
    $data = file_get_contents(USER_LIST);
    //$data = file_get_contents('/users.txt');
    $data .= "\r\nName: $name, Phone: $phone";
    file_put_contents(__DIR__.'/users.csv', $data);