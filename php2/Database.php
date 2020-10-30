<?php
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
};
