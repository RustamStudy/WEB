<?php
    if(!isset($_GET['name']))
        header('location: /')
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Спасибо за покупку, <?php echo $_GET['name'] ?? '';?>!</p>
</body>
</html>