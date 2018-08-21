<?php
    class Car{
        var $color;
        function __construct($color="green"){
            $this->color = $color;
        }
        
        function what_color(){
            return $this->color;
        }
    }

    function print_car($obj){
        foreach(get_object_vars($obj) as $prop => $val){
            echo "\t$prop = $val\n";
        }
    }

    //Test

    $BMW = new Car("white");
    
    print_car($BMW);


    echo "<hr>";

    //php设置常量,使用define函数,常量是全局的
    /**
     * name：必选参数,常量名称,即标志符
     * value：必选参数,常量的值
     * case_insensitive：可选参数,如果设置为TRUE，该常量则大小写不敏感，默认是大小写敏感的
     */
    //bool define(String $name, mixed $value [, bool $case_insensitive = false])

    //区分大小写
    define("GREETING", "Welcome use constant");
    echo GREETING;
    echo "<br>";
    //echo greeting;      //未定义

    echo "<hr>";

    //不区分大小写
    define("IGNORE_CASE", "welcome to use false case insensitive", true);
    echo IGNORE_CASE;
    echo "<br>";
    echo ignore_case;

    echo "<hr>";
    
    //在php中只有一个字符串运算符,即并置运算符(.)用于把两个字符串值连接起来
    $txt1 = "Test Concat:";
    $txt2 = "Hello World!";

    echo $txt1 . " " . $txt2;
    
    echo "<br>";
    
    //返回字符串的长度
    echo "'" . $txt2 . "'character length : " . strlen($txt1);
    
    echo "<br>";
    
    //strpos函数用于在字符串内查找一个字符或一段指定的文本
    echo "World position in '" . $txt2 . "' : " . strpos($txt2, 'World');

    echo "<hr>";

    //php比较运算符
    // x == y, 5==8 -> false
    //x === y(x等于y且类型相同，则返回true), 5 === "5" -> false
    //x !== y (x不等于y,或类型不相同，返回true)

    echo "5 === '5'" . var_dump(5 === "5");     //false
    echo "<br>";
    echo "5 === 5" . var_dump(5 === 5);         //true
    echo "<br>";
    echo "5 !== '5'" . var_dump(5 !== "5");     //true
    echo "<br>";
    echo "5 !== 8 " . var_dump(5 !== 8);        //true

    echo "<hr>";

    //PHP_EOL 是一个换行符，兼容更大平台
    $val = "is setted";
    //三元运算符，前面一个值可以省略，为true返回$val，false返回nobody
    $username = isset($val) ? : "nobody";
    echo $username, PHP_EOL;
?>