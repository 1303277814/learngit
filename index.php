<?php  
        include("mysql.php");
        include("paging.php");
        //取出列表页3条数据，存于数组$data中
            if($info && mysqli_num_rows($info)){
                while($row=mysqli_fetch_assoc($info)){
                    $data[]=$row;
                }
            }else{
                $data=array();
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
    <!-- 2021年1月30日 20:34:21，正式开始我的博客编程之路 -->
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
                                    $sql = "select * from register_one where username = '$username'";
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
            
        </div>

    </div>
        <div class = "middle">
                <div class = "middle_margin">
                        <div>
                            <div style = "min-width: 1000px; display:flex;" >
                            <p class = "notice">公告：新的一年快到嘞，自己也在不断提高技术中</br>这次比较额外的收获是用WordPress建立了一个博客并且上线了
                                </br>花了几天时间呢去了解WordPress的各项功能，所以呢当时这个原生PHP写的博客还停滞了几天，如果可以的话，还请去参观参观哦
                                </br>url：www.xiaoyublog.space</br>
                                2021年2月14日 15:22:26 面向对象的思想还是用得太少</br>等以后能力再变强些再改版吧，就像我看我两三个月写得代码一样（什么垃圾QAQ？没脸看） </p>
         
                                <div class = "search_one">
                                    <form action="article_search" method = "POST" class = "fform">
                                        <input type="text" id = "search" placeholder = "请输入文章内容..." name = "content">
                                        <input  type="submit" name="submit_one" id="submit_one" value = "搜索">
                                    </form>
                                </div>
                               
                                
                                </div>
                               
   
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
                                <?php 
                                    //将$data中的数据通过foreach循环出来，显示在相应div里面
                                    if(!empty($data)){
                                        foreach($data as $value){
                                ?><div class = "notice">
                                <div class="notice_a"><?php echo $value['title']?></div>
                                <div class=""style = "height: 130px;font-size: 21px;color: black;"><?php echo $value['description']?></div>
                                <div class="con_det"><a href="index_show.php?id=<?php echo $value["id"];?>">查看详细</a></div>
                                    </div>

                                <?php
                                    }
                                }
                                //初始化首页、上一页、下一页、末页的值，通过<a>标签进行跳转到当前页面，传入$page的值
                                    $first=1;
                                    $prev=$page-1;
                                    $next=$page+1;
                                    $last=$pagenum;
                                ?>
                                <div class="paging">
                                <a href="index.php?page=<?php echo $first ?>">首页</a>
                                <a href="index.php?page=<?php echo $prev ?>">上一页</a>
                                <a href="index.php?page=<?php echo $next ?>">下一页</a>
                                <a href="index.php?page=<?php echo $last ?>">末页</a>
                                </div>

                                </div>
                        </div>
                </div>
        </div>
    
    <script src="./js/js.js"></script>
</body>
</html>

