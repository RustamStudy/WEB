<?php

return;
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $places = $_POST['places'];
    define('USER_LIST', __DIR__.'/users.txt');
    define('UPLOAD_DIR', dirname(__DIR__, 1).'/uploads');
    $data = file_get_contents(USER_LIST);
    $data .= "\r\nName: $name, Phone: $phone";
    file_put_contents(__DIR__.'/users.txt', $data);

    define('USER_LIST1', __DIR__.'/users.csv');
    $data = file_get_contents(USER_LIST1);

    $file = fopen(USER_LIST1, "r");
    $n = -1;
    while ($line = fgets($file)){
        $n++;
    }
    if($_FILES){
        foreach($_FILES as $single_file) {
            $file_name = UPLOAD_DIR.'/'.time().$single_file['name']; 
            move_uploaded_file($single_file['tmp_name'],$file_name);
        }
        //echo 1;
    }
    if(!$data){
        $data .= "#;Name;Phone;\"date craete\";Place;Link";
    }
    $data .= "\r\n".$n.";".$name.";".$phone.";\"".date('d.m.Y H:i:s')."\";\"".$places."\";".$single_file['tmp_name'].$file_name;
    file_put_contents(__DIR__.'/users.csv', $data);
    
