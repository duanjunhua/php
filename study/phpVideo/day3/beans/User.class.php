<?php

    class User{
        private $name;
        private $age;

        function getName(){
            return $this->name;
        }

        function setName($name){
            $this->name = $name;
        }

        function getAge(){
            return $this->age;
        }

        function setAge($age){
            $this->age = $age;
        }

        //魔术方法实现构造函数重载
        function __construct(){
            $args = func_get_args();
            $num = count($args);
            if (method_exists($this,$f='__construct'.$num)) {
                call_user_func_array(array($this,$f),$args);
            }

        }

        function __construct2($name, $age){
            $this->name = $name;
            $this->age = $age;
        }
    }
?>
