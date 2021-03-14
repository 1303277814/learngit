<?php
//预先定义数据库链接参数
    $host = '127.0.0.1';
    $user = 'root';
    $password = '';
    $dbname = 'php_test';

//链接到数据库
    $db =new mysqli ($host , $user, $password , $dbname);//连接到数据库

    if($db -> connect_errno <> 0 ){
        echo "连接失败";
        echo $db -> connect_errno;
    }
    $db -> query("SET NAMES UTF8");