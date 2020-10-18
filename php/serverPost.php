<?php
    $name = $_POST['nameOrder'] ?? '';
    $phone = $_POST['telOrder'] ?? '';

    header('location: /php/thanks.php?name='.$name);