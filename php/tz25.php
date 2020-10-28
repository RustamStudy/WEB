<?php
        echo '<pre style="padding: 25px;">';
        $arr = array();
        for($i=6;$i>=0;$i--){
            array_push($arr,$i);
        }
        var_dump($arr);
        array_splice($arr, 3, 1);
        var_dump($arr);

        var_dump($arr[2]);
        
        $str = 'Строка 1,Строка 6,Строка 2,Строка 4,Строка 5,Строка 3';
        $str2 = explode( ',', $str );
        var_dump( $str2 );

        var_dump (is_array($arr) ? 'Массив' : 'Не массив');

        $arr2 = array();
        $arr2 = $arr;
        var_dump($arr2);

        var_dump('array_combine');
        $array_combine = array();
        $array_combine = array_combine($arr, $str2);
        var_dump($array_combine);

        var_dump('array_merge');
        $array_merge = array();
        $array_merge = array_merge($arr, $str2);
        var_dump($array_merge);

        var_dump('array_multisort');
        $array_multisort = array();
        $array_multisort = array_multisort($arr, $str2);
        var_dump($arr);
        var_dump($str2);

        var_dump('array_pop');
        $array_pop = array();
        $array_pop = array_pop($str2);
        var_dump($str2);
        var_dump($array_pop);

        var_dump('while');
        $i = 1;
        while ($i <= 10):
            var_dump ($i);
            $i++;
        endwhile;

        var_dump('do-while');
        $i = 0;
        do {
            var_dump( $i );
        } while ($i > 0);

        var_dump('foreach ');
        foreach ($str2 as $value) {
            var_dump ($value);
        }

        var_dump(' if, else, elseif ');
        $per = 45;
        var_dump('Значение переменной '.$per);
        if ($per == 30)
            var_dump('Переменная равна 30');
        elseif ($per == 40)
            var_dump('Переменная равна 40');
        else
            var_dump('Переменная не равна 30 и 40');


        var_dump('Функция');
        var_dump('Должен вернуть имя - '.writeName('Rustam'));

        /**
         * Возвращает имя
         */
        function writeName(string $name){
            return $name;
        }


        var_dump('Классы и методы');
        class person{
            public $name;
            public $lastname;
            public $city;
            private $age;
            private $children;
            public function __construct($setName,$setLastname, $setCity, $setAge, $setChildren){
                $this->name = $setName;
                $this->lastname = $setLastname;
                $this->city = $setCity;
                $this->age = $setAge;
                $this->children = $setChildren;
            }
            public function setChildren($setChildren){
                $this->children = $setChildren;
            }
            public function getChildren(){
                return $this->children;
            }
            public function setAge($setAge){
                $this->age = $setAge;
            }
            public function getAge(){
                return $this->age;
            }
            public function setCity($setcity){
                $this->city = $setcity;
            }
            public function getCity(){
                return $this->city;
            }
        }

        $exam = new person ('Иван','Петров','Москва','32', '2');
        $exam->setAge(33);
        $exam->setCity('Санкт-Петербург');
        var_dump($exam);

        echo '</pre>';
    ?>