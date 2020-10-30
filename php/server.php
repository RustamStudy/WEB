<?php
$name = $_GET['nameOrder'] ?? '';
$phone = $_GET['telOrder'] ?? '';

header('location: /php/thanks.php?name=' . $name);
