<?php

    function calculate($num1, $num2, $operator){
        $val = 0;
        switch ($operator) {
            case '+':
                $val = $num1 + $num2;
                break;
            case '-':
                $val = $num1 - $num2;
                break;
            case '*':
                $val = $num1 * $num2;
                break;
            case '/':
                $val = $num1 / $num2;
                break;
            default:
                echo "$operator not exist.";
                break;
        }
        return $val;
    }

    function addStr($str){
        $str = $str . "world";
        return $str;
    }

    function multiTable(){
        for ($i = 1; $i <= 9; $i++) {
            for ($j = 1; $j <= $i; $j++) {
                echo "$j" . "*" ."$i" . "=" . $j*$i . "&#9;";
            }
            echo "<br>";
        }
    }
?>
