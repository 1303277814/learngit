<?php 
 include ('mysql.php');
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
<body>
    <!-- 2021年1月30日 20:34:21，正式开始我的博客编程之路 -->
<div class="bg_login">
    <div class="main">
        <div id="top">
            <header id="menu">
                <div class="menu_one">
                    <a href="./index.php" class="a_one">主页</a>
                    <a href="./login.php" class="a_one">登录</a>
                    <a href="./messages.php" class="a_one">给我留言</a>
                </div>
            </header>
            </div>

            <div id="bg"></div>
        </div>
        <div id = "register">
                        <?php
                            if(isset($_POST["submit"])){    
                                $username = $_POST['username'];
                                $password = $_POST['password'];
                                $password_one = $_POST['password_one'];
                                if(
                                    isset($username) && isset($password) && isset($password_one)
                                    && $password == $password_one){
                                        $sql = "insert into register_one(username,password,money,photo) values ('$username','$password','','')";
                                        if(!mysqli_query($db,$sql)){
                                            die('sql语句有误');
                                        }else{
                                            echo "注册成功，恭喜您已经成为会员啦啦，去登录吧<a href = './index.php'>返回个人中心</a>";
                                            setcookie('name',$username,time() + 3600*24);
                                        }
                                    }else{
                                        echo '注册信息有误';
                                    }
                             }else{
                                echo "欢迎注册";
                                    
                             }  ?>
</div>
        <p class="middle_ones">登录到Krato's blog</p>
        <div class="new_user">
            
        <div id = "middle">
            <form action="register" method = 'post' class = "form">
        <div class="user" method = "post">
          用户名：<input type="text" name="username" style="width: 492px; height: 36px; border-radius: 12px;font-size: 35px;"><br>
        </div>
          密码：<input type="password" name="password"style=" width: 492px; height: 36px; border-radius: 12px;font-size: 35px; " >
          确认密码 <input type="password" name = "password_one"  style=" width: 492px; height: 36px; border-radius: 12px;font-size: 35px;" >
          <div class = "button"><input type="submit" value = "注册" class = "button_login" name = "submit"></div></form>
          
        </div>
    </div>

    </div>
</div>
    

</body>
</html>




