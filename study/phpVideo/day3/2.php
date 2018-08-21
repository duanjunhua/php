<?php

    require_once "beans/Person.class.php";

    $p1 = new Person();
    $p1->play();
    $p2 = new Person();
    $p2->play();
    $p3 = new Person();
    $p3->play();

    Person::showInfo();

    //$p3->showInfo();

    //echo Person::$static_num;


?>
