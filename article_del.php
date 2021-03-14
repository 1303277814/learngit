<?php
    include("mysql.php");
    $is = $_GET["id"];
    $sql = "delete from article where id = $is";
    if($db->query($sql)){
        header("location:article_manage.php");
    }else{
        echo "error";
}
    
    
    
    