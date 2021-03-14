<?php
    include('mysql.php');    
}
	//把传递过来的信息入库
	if (!(isset($_POST['title']) && (!empty($_POST['title'])))) {
		echo "<script>alert(\"标题不能为空\");window.location.href=\"article.add.php\"</script>"; //一个窗口输出
	}
	$title = $_POST['title'];
	$author = $_POST['author'];
	$description = $_POST['description'];
	$content = $_POST['content'];
	$dateline = time();
	$sql = "insert into article(title,author,description,content,dateline) values ('$title','$author','$description','$content',$dateline)";


	//print_r($insertsql);

	if (mysqli_query($db,$sql)) {
		echo '<script>alert("成功发布文章");window.location.href="article.manage.php";</script>';
	} else {
		echo '<script>alert("发布失败");window.location.href="article.add.php";</script>';
		//echo mysql_error();
	}
?>