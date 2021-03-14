<?php

if(setcookie('name',$_COOKIE['name'],time()-3600)){
    echo "注销成功~~~欢迎下次再来哦~~~<a href='login.php'>返回</a>";
}else{
    die("嘤嘤嘤~~~~好像出问题了呢~~~~"); 
}
?>