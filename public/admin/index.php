<table border = 1>
    <tr>
        <th>№</th>
        <th>Имя</th>
        <th>Телефон</th>
        <th>Дата</th>
    </tr>


<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    include('../php2/Database.php');

   // $pdo = new Database;
   // $pdo->connect();
   // $rows = $pdo->showRecords();
    $rows = Database::showRecords();
    $html = '';
    foreach ($rows as $row){
        $html .= "<tr>";
        $html .= "<td>".$row['id']."</td>";
        $html .= "<td>".$row['name']."</td>";
        $html .= "<td>".$row['phone']."</td>";
        $html .= "<td>".date('d.m.Y H:i:s', strtotime($row['date']))."</td>";
        $html .= "</td>";

    }
    echo $html;

    ?>
</table>