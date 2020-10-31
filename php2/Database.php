<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
class Database
{

    const DATABASE = 'cu66715_db';
    const TABLE = 'orders';
    const USER = "cu66715_db";
    const PASSWORD = 'Hecnfv2014';
    static $pdo = [];
    public static function connect()
    {
        self::$pdo = new PDO(
            'mysql:host=localhost;dbname=' . self::DATABASE,
            self::USER,
            self::PASSWORD
        );
        return self::$pdo;
    }

    public static function createTable()
    {
        self::$pdo->query("CREATE TABLE IF NOT EXISTS " . self::TABLE . " (
                id integer primary key auto_increment,
                name text,
                phone text,
                date text
            )");
    }


    public static function createRecord(&$user)
    {
        self::connect();
        $date = date('Y-m-d H:i:s');
        $sql = 'insert into ' . self::TABLE .
            "(name,phone,date,mail)
            values('" . $user->name . "', '" . $user->phone . "','" . $date . "', '" . $user->mail . "')";

        $request = self::$pdo->prepare($sql);

        if ($request)
            $request->execute();
        return
            $user->id = self::$pdo->lastInsertId();
    }

    public static function createLinkFile(&$user, &$file)
    {
        self::connect();
        $date = date('Y-m-d H:i:s');
        $sql = "insert into form_data (
                        user_id,
                        file_link,
                        date
                    )
                    values (
                        " . $user->id . ",
                        '" . $file->filePath . "',
                        '" . $date . "'
                    )";

        $request = self::$pdo->prepare($sql);

        if ($request)
            $request->execute();
    }

    public static function createPlaces(&$user)
    {
        if (strlen($user->places) > 0) {
            self::connect();
            $date = date('Y-m-d H:i:s');
            $sql = "insert into placesHead
                                (
                                    user_id,
                                    filmName,
                                    filmZal,
                                    filmTime,
                                    date
                                )
                        values(  " . $user->id . ", 
                                '" . $user->fname . "',
                                '" . $user->fzal . "',
                                '" . $user->ftime . "',
                                '" . $date . "')";

            $request = self::$pdo->prepare($sql);

            if ($request)
                $request->execute();

            $lastID = self::$pdo->lastInsertId();

            $val = '';
            $places = explode(',', $user->places);
            for ($i = 0; $i < count($places); $i++) {
                $val .= "(" . $lastID . ", " . $places[$i] . ", '" . $date . "'),";
            }
            if ($val{
                strlen($val) - 1} == ',') {
                $val = substr($val, 0, -1);
            }
            $sql = "insert into placesBody
                                (
                                    id_PH,
                                    place_num,
                                    date
                                )
                        values" . $val;
            $request = self::$pdo->prepare($sql);

            if ($request)
                $request->execute();
        }
    }

    public static function showRecords()
    {
        self::connect();
        $sql = "select * from " . self::TABLE . " order by id desc";
        $request = self::$pdo->prepare($sql);
        $request->execute();
        return $request;
    }

    public static function userInfo($idUser)
    {
        self::connect();
        $sql = "SELECT  orders.id, name, phone, mail, filmName, filmZal, filmTime, place_num, orders.date
                FROM orders
                    LEFT JOIN 	form_data on orders.id = form_data.user_id
                    left JOIN	placesHead on orders.id = placesHead.user_id
                    inner join placesBody on placesHead.id = placesBody.id_PH
                WHERE orders.id = " . $idUser;
        $request = self::$pdo->prepare($sql);
        $request->execute();
        return $request;
    }
    public static function orderShow()
    {
        self::connect();
        $sql = "SELECT orders.id, name, phone, mail, filmName, filmZal, filmTime, place_num, orders.date, placesBody.id as idPlaces
                FROM 
                            placesHead inner join 
                            placesBody on placesHead.id = placesBody.id_PH inner JOIN
                            orders on orders.id = placesHead.user_id
                order by    placesHead.id desc, placesBody.place_num";
        $request = self::$pdo->prepare($sql);
        $request->execute();
        return $request;
    }
    public static function getPlase($name)
    {
        self::connect();
        $sql = "SELECT      placesBody.place_num
                FROM        placesHead 
                                inner join placesBody on placesBody.id_PH = placesHead.id
                WHERE       placesHead.filmName = '".$name."'
                group by    place_num";
        $request = self::$pdo->prepare($sql);
        $request->execute();

        $arr = [];
        foreach($request as $row) {
            array_push($arr, $row['place_num']);
        }
//print_r($arr);
        return $arr;
    }
    public static function editPlaces($id1, $id2)
    {
        self::connect();
        $sql = "update placesBody
                set place_num = '".$id1."' ".
                "where id = ".$id2;
        $request = self::$pdo->prepare($sql);
        $request->execute();
    }
    public static function deletePlaces($id1)
    {
        self::connect();
        $sql = "delete from placesBody".
                " where id = ".$id1;
        $request = self::$pdo->prepare($sql);
        $request->execute();
    }
};
