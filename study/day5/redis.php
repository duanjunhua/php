<?php

    //连接本地的Redis服务
    $redis = new Redis();

    $redis->connect("127.0.0.1", 6379);

    echo "Connection to server successfully" . "<br>";

    echo "Server is running: " . $redis->ping() . "<br>";

    //设置redis 字符串数据
    $redis->set("phpStr", "Redis of PHP") . "<br>";

    //获取存储的数据并输出
    echo "Store string in redis: " . $redis->get("phpStr") . "<br>";

    //Redis List,存储数据到列表
    $redis->lpush("phpList", "php1", "php2", "php3");

    //获取存储的数据并输出
    $redisList = $redis->lrange("phpList", 0, 10);
    echo "Stored string in redis: ";
    print_r($redisList);

    echo "<br>";

    //Redis Keys实例
    $keys = $redis->keys("*");
    echo "Stored keys in Redis: ";
    print_r($keys);

 ?>
