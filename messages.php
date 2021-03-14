<?php
include("mysql.php");
$sql = "select * from msg order by id desc";
$mysqli_result = $db -> query($sql);
if($mysqli_result == false){
    echo "SQL错误";
    exit;
}
$rows = [];
while($row = $mysqli_result ->fetch_array(MYSQLI_ASSOC)){
    $rows[] = $row;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>留言本呐~~</title>
    <link rel="stylesheet" href="./css/messages.css">
    <link rel = "icon" href = "./img/title.ico">
</head>
<body class = "body">
<div id="top">
            <header id="menu">
                <div class="menu_one">
                    <a href="./index.php" class="a_one">主页</a>
                    <a href="./login.php" class="a_one">登录</a>
                    <a href="./messages.php" class="a_one">给我留言</a>
                </div>
            </header>
            </div>
<div class = "text">
<p class = "text_one">在这里可以对小世界留言哦~~~~</p>
</div>
<div class = "main">
<form class= "form" action="messageadd.php" method = "POST">
        <textarea  class="content" cols = "100" row = "10" name="content"  placeholder="输入你想写下的内容哦~~~~~~~~"></textarea>
        <br/>
        <input class="user" type="text" name="user"  placeholder="这里是你的用户名呐~"/>
        <input class="btn" type="submit"   value="发表留言"/>
</form>
</div>
<?php
    // 利用foreach循环html代码
    foreach($rows as $row){ 

    ?>
<div class = "flex">
<div class = "content_one">
    <div class = "middle">
        <span> <?php echo $row['user'];?></span>
        <span><?php  date_default_timezone_set('PRC');
        echo date("Y-m-d H:i:s",$row['intime'])?></span>
    </div>
    <div class= "middle_one">
        <?php echo $row['content'];?>
    </div>
    
</div>
</div>
<?php
    }
    ?>

</body>
</html>