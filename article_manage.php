<?php
include("mysql.php");
$sql = "select * from article order by dateline desc";
$query = mysqli_query($db,$sql);
//判断查询语句是否查询到结果，查到则使用mysqli_fetch_assoc()将其逐行取出，放入数组$data中，没查到则直接赋值空数组给$data
if($query&&mysqli_num_rows($query)){
	while($row=mysqli_fetch_assoc($query)){
		$data[]=$row;
	}
}else{
	$data=array();
}
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
    <div class="box">
	<div class="index"><h1>后台管理系统</h1>
    </div>
    <div class="menu">
			<a href="article.php">发布文章</a><br/>
            <a href="article_manage.php">管理文章</a>
            <a href="index.php">主页</a>
		</div>
	<div class="middle">
			<div class="art">文章管理列表</div>
			


			<div class="content">
				<?php 
				//在$data不为空的情况下，通过foreach()将$data循环输出数来
				if(!empty($data)){
					foreach($data as $value){
                ?>
                <div class = "margin">
				<div class=""><div class="num">编号</div><?php echo $value['id']; ?></div>
				<div class="tit">   <div class="tit">标题</div><?php echo $value['title']; ?></div>
				<div class="act">
				<!--修改和删除直接使用<a>标签链接，通过get方式传递当前文章的id -->
                    <div class="act">操作</div>	
					<a href="article_modify.php?id=<?php echo $value['id']; ?>">修改</a>
                    <a href="article_del.php?id=<?php echo $value['id']; ?>">删除</a>
                </div>
				</div>
				<?php
					}
				}
			?>
			</div>
	</div>
</div>
</body>
</html>