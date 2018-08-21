<?php

    class Dog {

        private $name;
        private $age;



        public function printMsg(){
            echo $this->name . " : " . $this->age;
        }

        //getter、setter方法

        /*//方式一
        public function __get($field_name){
            if(isset($this->field_name)){
                return $this->field_name;
            }
            return null;
        }


        public function __set($field_name, $val){
            $this->field_name = $val;
        }
        */

        //方式二
        public function getName(){
            return $this->name;
        }

        public function setName($name){
            $this->name = $name;
        }

        public function getAge(){
            return $this->age;
        }

        public function setAge($age){
            $this->age = $age;
        }


        //构造方法
        //public function __construct(){

        //}

        public function __construct($name, $age){
            $this->name = $name;
            $this->age = $age;
        }

        public function __isset($val){
            return isset($this->$val);
        }

        public function __unset($val){

            unset($this->$val);
        }

    }

?>
