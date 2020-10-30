<table border=1>
    <tr>
        <th>№</th>
        <th>Имя</th>
        <th>Телефон</th>
        <th>Почта</th>
        <th>Наименование фильма</th>
        <th>Наименование зала</th>
        <th>Время сеанса</th>
        <th>Забронированные места</th>
        <th>Дата записи</th>
    </tr>

    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    $idUser = $_GET['iduser'];

    include('../php2/Database.php');

    // $pdo = new Database;
    // $pdo->connect();
    // $rows = $pdo->showRecords();
    $rows = Database::userInfo($idUser);
    $html = '';
    foreach ($rows as $row) {
        $html .= "<tr>";
        $html .= "<td>" . $row['id'] . "</td>";
        $html .= "<td>" . $row['name'] . "</td>";
        $html .= "<td>" . $row['phone'] . "</td>";
        $html .= "<td>" . $row['mail'] . "</td>";
        $html .= "<td>" . $row['filmName'] . "</td>";
        $html .= "<td>" . $row['filmZal'] . "</td>";
        $html .= "<td>" . $row['filmTime'] . "</td>";
        $html .= "<td>" . $row['place_num'] . "</td>";
        $html .= "<td>" . date('d.m.Y H:i:s', strtotime($row['date'])) . "</td>";
        $html .= "</tr>";
    }
    echo $html;

    ?>
</table>