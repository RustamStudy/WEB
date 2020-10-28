<?php
    class userData{
        public function $checkData($name, $telOrder){
            if(isset($_POST['name']))
                $this->$name = $_POST['name']
            else
                header('location: /')

            if(isset($_POST['telOrder']))
                $this->$telOrder = $_POST['telOrder']
            else
                header('location: /')
        }
        public $saveData;
        public $_COOKIE;
        public $_SESSION;
    }
?>