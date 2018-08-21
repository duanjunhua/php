<?php

    #require_once "utils/calc.php";
    require_once("utils/calc.php");
    #include_once "utils/calc.php";
    #include_once("utils/calc.php");

    $oper = "+";
    $number1 = 5;
    $number2 = 8;

    echo $number1.$oper.$number2."=".calculate($number1, $number2, $oper);

    echo "<br/>";

    $str = "Hello,";

    addStr($str);
    echo $str;

    echo "<br/>";

    $val = 123;
    function postVal($num){
    //function postVal(&$num){
        $num = 456;
    }
    postVal($val);
    echo $val;

    echo "<hr>";
    multiTable();
?>
