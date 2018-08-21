<?php

    $arr[0] = "abc";
    $arr[1] = true;
    $arr[2] = 3;

    foreach ($arr as $value) {
        echo $value . "<br/>";
    }

    echo "<hr>";

    $arr2 = array("value1", false, 5);

    foreach ($arr2 as $value) {
        echo $value . "<br/>";
    }

    echo "<hr>";

    $arr3 = array('Michael' => 23, 'Nono' => 28, 'Kay' => 34, 'Jacky' => 'GuangZhou');
    foreach ($arr3 as $key => $value) {
        echo $key . " - " . $value . "<br/>";
    }

    echo "<hr>";

    $multiArray = array(array('Java' => 1, 'PHP' => 2, "Python" => 3),  array('Chinese' => 'A', 'English' => 'B'));

    print_r($multiArray);

?>
