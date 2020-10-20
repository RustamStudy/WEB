<?php
    class userData {
        public $name;
        public $telOrder;
        public static function checkData($arr) {
            $_SESSION['user'] = NULL;
            if (isset($arr['nameOrder']) && isset($arr['telOrder'])) {
                return self::saveData($arr['nameOrder'], $arr['telOrder']);
            }
            else {
                return self::returnError($arr);
            }
        }
        public static function saveData($name, $telOrder) {
            $user = new userData();
            $user->name = $name;
            $user->telOrder = $telOrder;
            $_SESSION['user'] = json_encode($user);
            setcookie('user', json_encode($user), time() + 86400);
            return self::returnSuccess($user);
        }
        public static function checkSession($name, $telOrder) {
            if (isset($_SESSION['user'])) {
                $user = json_decode($_SESSION['user']);
                if ($user->telOrder == $telOrder) {
                    $user->name = $name;
                    $_SESSION['user'] = json_encode($user);
                    return $user;
                }
            }

            $user = new userData();
            $user->name = $name;
            $user->telOrder = $telOrder;
            $_SESSION['user'] = json_encode($user);
            return $user;
        }

        public static function checkCookie($name, $telOrder) {
            if (isset($_COOKIE['user'])) {
                $user = json_decode($_COOKIE['user']);
                if ($user->telOrder == $telOrder) {
                    $user->name = $name;
                    setcookie('user', json_encode($user), time() + 86400);
                    return $user;
                }
            }

            $user = new userData();
            $user->name = $name;
            $user->telOrder = $telOrder;
            setcookie('user', json_encode($user), time() + 86400);
            return $user;
        }
        
        static function returnError($fields) {
            return [
                'status'=> 'ERROR',
                'fields'=> $fields
            ];
        }
        static function returnSuccess($user) {
            return [
                'status'=> 'OK',
                'user'=> $user
            ];
        }
        
        public static function GetUser() {
            if (isset($_COOKIE['user'])) {
                return json_decode($_COOKIE['user']);
            }
            if (isset($_SESSION['user'])) {
                return json_decode($_SESSION['user']);
            }
            return new userData();
        }
    }
?>