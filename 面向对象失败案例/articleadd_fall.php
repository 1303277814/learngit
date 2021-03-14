<?php
    include('mysql.php');    
    $title = $_POST['title'];
	$author = $_POST['author'];
	$description = $_POST['description'];
	$content = $_POST['content'];
    $dateline = time();
    var_dump($_POST);
    
class message {
    // 把传递过来的信息入库
	// function post_message($title){
    //     if(!(isset($_POST['title']) && (!empty($_POST['title'])))){
    //         return false;
    //     }else{
    //         return true;
    //     }

    function deal_with($title,$author,$description,$content,$dateline){
        $sql = "insert into article(title,author,description,content,dateline) values ('$title','$author','$description','$content',$dateline)";
        if (mysqli_query($db,$sql)) {
            echo '<script>alert("成功发布文章");window.l    ocation.href="article.php";</script>';
        } else {
            // echo '<script>alert("发布失败");window.location.href="article.php";</script>';
            echo "发布sb";
            //echo mysql_error();
            }        
        }
    }
    
$message = new message();
	
// $is = $message -> post_message($title);
$deal = $message ->deal_with($title,$author,$description,$content,$dateline);
// if($is == false){
//     // echo "<script>alert(\"标题不能为空\");window.location.href=\"article.php\"</script>"; //一个窗口输出
//     echo "sb";
// }
//     echo $deal;

	
?>