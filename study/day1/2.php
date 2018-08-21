<?php
    $x = 5; //global variable

    function test(){
        global $x;
        $y = $x + 10;    //local varibale
        echo "<p>Test in of Method variable</p>";
        echo "Variable x is : global $x";
        echo "<br>";
        echo "Varibale y is : $y";
    }

    test();

    echo "<p>Test out of Method variable</p>";
    echo "Variable x is : $x";
    echo "<br>";
    echo "Varibale y is : $y<br>";

    function test2($t){
        echo "------------<br>";
        echo $t;
    }

    test2("测试参数传递");

    /**
     * echo 输出可以输出一个或多个字符,速度快,无返回值
     * print 只能输出一个字符,速度慢, 有返回值1
     */

     echo "<br>";
     echo "echo输出多个字符串： ", "Hello", " world", "!", "<br>";
     $a = print "print 输出一个字符串： Hello World!<br>";
     echo "print返回值[a]: $a";

     echo "<br>--------------------<br>";
    
     $cars = array("Volvo", "BMW", "Toyota");
    echo "My Cars is : $cars[1]"; 


    echo "<br>----------EOF----------<br>";

    $name = "Test EOF";

    
    $b = <<<EOF
        "abc"$name
        "123"
EOF;
//结束EOF必须顶头写且必须有分号结尾
echo $b;
?>