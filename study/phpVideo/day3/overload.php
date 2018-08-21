<?php

    //魔术函数实现方法重载
    require_once "beans/User.class.php";

    $user1 = new User();
    $user1->setName("user without value");
    echo $user1->getName();

    echo "<br/>";

    $user2 = new User("Michale", 25);

    echo $user2->getName();

?>
