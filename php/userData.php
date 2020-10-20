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
                return self::returnError();
            }
        }
        public static function saveData($name, $telOrder) {
            $user = new userData();
            $user->name = $name;
            $user->telOrder = $telOrder;
            $_SESSION['user'] = $user;
            echo json_encode($user);
            return $user;
        }
        
        static function returnError() {
            header('location: /form.php');
        }
        static function returnSuccess() {
            header('location: /thanks.php');
        }
    }
?>