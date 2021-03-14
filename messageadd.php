<?php
include("mysql.php");
$content = $_POST['content'];
$user = $_POST['user'];


// 对留言的有效性

class input{

        // 定义函数对数据进行检查
    function post($content) {
        if($content == ''){
            return false;
        }
        $n = ["草泥马"];
        // 先循环读取禁止使用的东西，然后用if进行进行一一对比
        foreach($n as $name){
            if($user == $name){
                return false;   
            }
        }
            return true;
    }
}
// 实例化
$input = new input();  

$is = $input -> post($content);
if($is == false){
        die('留言内容的数据不正确');
    }

$is = $input ->post($user);
 if($is == false){
        die("留言人不能为空");
    }


$time = time();
date_default_timezone_set(PRC);
$sql = "INSERT INTO msg (content,user,intime) values ('{$content}','{$user}','{$time}')";
$is = $db -> query($sql);
header("location:messages.php");
    

// 调用函数的方式
// $is = post($content);
// if($is == false){
//     die('留言内容的数据不正确');
// }

// if($user == ''){
//     die("留言人不能为空");
// }
