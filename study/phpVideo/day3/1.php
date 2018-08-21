<?php


    require_once "beans/Dog.class.php";
    require_once "beans/Person.class.php";

/*    $dog = new Dog;
    $dog->name = "Momo";
    $dog->age = 1;

    $dog->printMsg();
*/
    echo "<hr>";

    $p=new Person();
    $p->name="Michael";
    $p->age=25;

    $p->printMsg();

    echo "<hr>";

    //对象的传递就是地址传递将,p2指向的地址就是p指向的地址
    $p2 = $p;
    $p2->name = "Jacky";
    echo 'p对象: ';
    $p->printMsg();
    echo "<br>";
    echo " p2对象: ";$p2->printMsg();

    echo "<br>";
    //基本数据类型传递为值传递
    $num1 = 25;
    $num2 = $num1;
    $num2 += 8;

    echo "num1: " . $num1 . ", num2: " . $num2;

    echo "<hr>";

    //函数传递的是引用(地址)
    function passVal($p){
        $p->name = "Michael";
    }

    //对象
    $p2->printMsg();
    passVal($p2);
    $p2->printMsg();

    //基本数据类型
    $num1 = 20;
    function passNum($val){
        $val = 10;
    }
    echo $num1;
    echo "<br/>";
    passNum($num1);
    echo $num1;

    echo "<hr>";

    $dog2 = new Dog("Test", 2);
    $dog2->printMsg();

?>
