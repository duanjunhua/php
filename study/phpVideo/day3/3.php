<?php

    require_once "beans/Dog.class.php";

     $dog = new Dog("dog", 1);

    $dog->setName("dog2");
    $dog->setAge(2);

    $dog->printMsg();

?>
