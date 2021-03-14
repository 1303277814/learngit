<?php
require_once("paging.php");
include("mysql.php");
//根据传递过来的id值，获取详情页内容，存于数组$data中
$id=$_GET['id'];
$sql="select *from article where id=$id";
$info=mysqli_query($db,$sql);
$a=mysqli_num_rows($info);
if($info&&mysqli_num_rows($info)){
while($row=mysqli_fetch_assoc($info)){
		$data[]=$row;
	}
}else{
	$data=array();
}
$sqla = "select * from msg order by id desc";
$mysqli_result = $db -> query($sqla);
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
    <title>一个属于自己的小空间</title>
    <link rel = "icon" href = "./img/title.ico">
    <link rel="stylesheet" href="./css/index.css">
</head>
<body class ="body" >
    <div class="main">
        <div id="top">
            <header id="menu">
                <div class="menu_one">
                    <a href="./index.php" class="a_one">主页</a>
                    <a href="./login.php" class="a_one">登录</a>
                    <a href="./messages.php" class="a_one" >给我留言~</a>
                    <div id = "login"><?php 
                                if(isset($_COOKIE['name'])){
                                    $username = $_COOKIE['name'];
                                    $sql = "select * from register where username = '$username'";
                                    if($result = mysqli_query($db,$sql)){
                                        if(mysqli_num_rows($result) > 0){
                                            $result = mysqli_fetch_assoc($result);
                                            echo "欢迎您，尊敬的vip".$result['username'];
                                            echo "<a href='./article' class = 'my'>点我去发布文章啦~~&nbsp&nbsp&nbsp&nbsp</a>";
                                            echo "<a href='./logout' class = 'logout'>注销点我哦</a>";
                                            
                                            
                                        }
                                    }
                                }else{
                                    echo "请登录";}
                        ?>
                    </div>
                </div>
            </header>
            <div id="color">
                <div id="blog_main"></div>
            </div>  
            <div id="bg"></div>

            <div class = "middle">
                <div class = "middle_margin">
                        <div>
                            <div style = "min-width: 1000px;">
                            <p class = "notice">公告：新的一年快到嘞，自己也在不断提高技术中</br>这次比较额外的收获是用WordPress建立了一个博客并且上线了
                                </br>花了几天时间呢去了解WordPress的各项功能，所以呢当时这个原生PHP写的博客还停滞了几天，如果可以的话，还请去参观参观哦
                                </br>url：www.xiaoyublog.space</br>
                                2021年2月14日 15:22:26 情人节自己还在写代码--哈哈</br>博客也有了几个小伙伴的评论，还不错 </p></div>
   
                                <div style = "min-width: 1000px;">
                                    <div class = "xiaoyu">
                                        <div class = "middle_me">
                                            <div class = "me_flex">
                                                <p class = "me">About_me</p>
                                                <img src="./img/me.jpg" alt="" class = "me_img">
                                            </div>
                                            <p class = "myself">二次元一个，平时会追一些比较热门的动漫，有时候也会去回顾以前看过的经典的动漫
                                                这里的东西大部分都是自己写的，也参考过很多度娘的内容，可以水平进步空间很大，希望自己在技术上
                                                能够越变越强 -----by xiaoyu
                                            </p>
                                        </div>
                                    </div>
            
        </div>
        <div class="notice">
			<?php
			//将$data中的数据通过foreach循环出来，显示在相应div里面
				if(!empty($data)){
					foreach($data as $value){
			?>
			<div class="con_tit"><?php echo $value['title']?></div>
			<div class="con_aut"><?php echo $value['author']?> 发表于<?php echo date("Y-m-d",$value['dateline'])?></div>
			<div class="con_des"><?php echo $value['description']?></div>
			<div class="con_det"><?php echo $value['content']?></div>
			<?php
				}
			}
			?>
		</div>
        

    </div>
    <div class = "text">
</div>
<div class = "mains">
<form class= "form" action="messageadd.php" method = "POST">
        <textarea  class="content" cols = "100" row = "10" name="content"  placeholder="在这里输入评论~~~~~~~~"></textarea>
        <br/>
        <input class="users" type="text" name="user"  placeholder="这里是你的用户名呐~"/>
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
        <span><?php  echo date("Y-m-d H:i:s",$row['intime'])?></span>
    </div>
    <div class= "middle_one">
        <?php echo $row['content'];?>
    </div>
    
</div>
</div>
<?php
    }
    ?>



<script src="./js/js.js"></script>