<?php

    class Person {

        public $name;
        public $age;

        function printMsg(){
            echo $this->name . " : " . $this->age . "<br/>";
        }

        function play(){
            self::$static_num++;
            //echo Person::$static_num . "play game <br/>";
        }

        public static $static_num=0;

        static function showInfo(){
            echo self::$static_num . " showInfo";
        }
    }
?>
