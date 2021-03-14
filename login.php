<?php
include("mysql.php");
if(isset($_COOKIE["name"])){
    echo "<script>alert('您已经登录~~请先注销');window.location.href='index.php';</script>";
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
<body>

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
            <div id="bg">
            </div>
            <div id = "login_one"><?php
            if(isset($_POST["submit"])){
                $username = $_POST["username"];
                $password =$_POST["password"];
                $sql = "select * from  register where  username = '".$username."' and password = '".$password."'";
                if($results = mysqli_query($db,$sql)){
                    if($results = mysqli_num_rows($results)>0){
                        setcookie('name',$username,time() + 3600*24);
                        echo "登录成功!!!可以返回到主页啦~~~~~~" ;  
                    }else{
                        echo "账号或者密码输入错误";
                    }
                }else{
                    die(mysqli_error($db));
                   
                }
            }else{
                echo "欢迎来到私密♂空间~~~";
                }
            ?></div>

        <p class="middle_ones">登录到Krato's blog</p>
        <div class="new_user">
            
        <div id = "middle">
            <form action="" method = 'post' class = "form">
        <div class="user" method = "post">
          账号：<input type="text" name="username" style="width: 492px; height: 36px; border-radius: 12px;font-size: 17px;"><br>
        </div>
          密码：<input type="password" name="password"style=" width: 492px; height: 36px; border-radius: 12px;font-size: 17px;" >
          <div class="button"><input type="submit"class = "button_login" value="登录" name="submit"></div></form>
          <div class = "button"><a href="./register.php" id = "resister">注册</a></div>
          
        </div>
    </div>

    </div>
</div>
    

</body>
</html>