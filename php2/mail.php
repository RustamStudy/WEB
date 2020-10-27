<?php
    $headers = "MIME-Version:1/0\r\n".
        "Content-type:text/html; charset=utf-8\r\n".
        "From: КИНОШКА <imfo@{$_SERVER['SERVER_NAME']}>";

    if(mail('safiullin_85@mail.ru','Test','Message', $headers)){
        echo 'success';
    }