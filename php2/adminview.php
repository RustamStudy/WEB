<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ киношки</title>
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../fonts/Roboto/stylesheet.css">
</head>
<body>
    <div class="popup hidden">
        <div class="order-form">
        <div id="closeOrderFrom" class="close"></div>
        <div>
            <div class='filmTicetInfo'>
                <label>Заявка</label>
                <label id = 'adminOrder'></label>
            </div>
            <div class='filmTicetInfo'>
                <label>Имя</label>
                <label id = 'adminName'></label>
            </div>
            <div class='filmTicetInfo'>
                <label>Телефон</label>
                <label id = 'adminPhone'></label>
            </div>
            <div class='filmTicetInfo'>
                <label>Почта</label>
                <label id = 'adminMail'></label>
            </div>
            <div class='filmTicetInfo'>
                <label>Наименование фильма</label>
                <label id = 'adminFilm'></label>
            </div>
            <div class='filmTicetInfo'>
                <label>Время сеанса</label>
                <label id = 'adminTime'></label>
            </div>
        <div id = 'placeArr'></div>
        <div class='filmTicetInfo'>

        </div>
    </div>
    </div>
    </div>

    <h1 class = "head">Последние заявки</h1>
<table class = "table" >
    <thead>
    <tr>
        <th>№</th>        
        <th>Дата / время заявки</th>
        <th>Имя</th>
        <th>Телефон</th>
        <th>Почта</th>
        <th>Наименование фильма</th>
        <th>Наименование зала</th>
        <th>Время сеанса</th>
        <th>Забронированные места</th>
    </tr>
    <thead>
    <tbody>
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    //$idUser = $_GET['iduser'];

    include('../php2/Database.php');

    // $pdo = new Database;
    // $pdo->connect();
    // $rows = $pdo->showRecords();
    $rows = Database::orderShow();
    $html = '';
    $id = 0;
    foreach ($rows as $row) {
        if($id !=  $row['id'])
        {
            $html .= "<tr idord = '".$row['id']."' class = 'table-tr__order'>";
            $html .= "<td>" . $row['id'] . "</td>";        
            $html .= "<td>" . date('d.m.Y H:i:s', strtotime($row['date'])) . "</td>";
            $html .= "<td>" . $row['name'] . "</td>";
            $html .= "<td>" . $row['phone'] . "</td>";
            $html .= "<td>" . $row['mail'] . "</td>";
            $html .= "<td>" . $row['filmName'] . "</td>";
            $html .= "<td>" . $row['filmZal'] . "</td>";
            $html .= "<td>" . $row['filmTime'] . "</td>";
            $html .= "<td></td>";
            $html .= "</tr>";
        }
        $html .= "<tr idord = '".$row['id']."' class = 'table-tr__place'>";
        $html .= "<td colspan = 8></td>";
        $html .= "<td idPlac = '".$row['idPlaces']."'>" . $row['place_num'] . "</td>";
        $html .= "</tr>";
        $id=$row['id'];
        
    }
    echo $html;

    ?>
    
</tbody>
</table>
    <script src="../js/admin.js"></script>
    <script src="../js/jq.js"></script>
</body>
</html>

