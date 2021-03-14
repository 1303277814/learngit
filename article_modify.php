<?php
	require_once("mysql.php");
	$id=$_GET['id'];
	$sql="select * from article where id=$id";
	$query = mysqli_query($db,$sql);
	$data = mysqli_fetch_assoc($query);
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>后台首页呐</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/article.css">
        <link rel = "icon" href = "./img/title.ico">
    </head>
    <body class ="body">

        <div class="">
        	<h1 class="index">这是后台首页哦~~~</h1>
    	<hr />
            <div class="">
                <ul class="">
                    <li>
                        <a href = "./article">发布文章</a>
                    </li>
                    <li>
                        <a href="./article_manage">管理文章</a>
                    </li>
                    <li>
                        <a href="index.php">主页</a>
                    </li>
                    

                </ul>
            </div>
            <div class="flex">
                <form action="article_modify_handle.php" class="" method="POST" style = "width: 50%;">
                <input type="hidden" name="id" value="<?php echo $data['id']?>" />
                    <div class="">
                        <label for="title" class="">标题</label>
                        <div class=""><input type="text" class="font" name="title" value="<?php echo $data['title']; ?>"/></div>
                    </div>
                    <div class="form-group">
                        <label for="author" class="">作者</label>
                        <div class=""><input type="text" class="font" name="author" value="<?php echo $data['author']; ?>" /></div>
                    </div>
					<div class="form-group">
						<label for="description" class="">简介</label>
						<div class=""><textarea class="font" name="description" id="" rows="3" ><?php echo $data['description']; ?></textarea></div>
					</div>
					<div class="form-group">
						<label for="content" class="">内容</label>
						<div class=""><textarea class="font" name="content" id="" rows="6" placeholder="内容"><?php echo $data['content']; ?></textarea></div>
					</div>
					<div >
						<button type="submit" id = "button">提交</button>
					</div>
                </form>
            </div>
        </div>
    </body>
</html>