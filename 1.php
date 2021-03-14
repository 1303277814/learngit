<body>
<h1>汽车信息</h1>
<?php
require("DBDA.class1.php");//$type 代表SQL语句的类型，0代表增删改，1代表查询
$db = new DBDA();
 
//如果没有提交数据，显示所有
//如果有提交数据，根据关键字查询显示
$name = "";
$tj1 = " 1=1 ";//第一个条件，对应名称，注意空格
$tj2 = " 1=1 ";//第二个条件，对应系列，注意空格
if(!empty($_POST["name"]))
{
  $name = $_POST["name"];
  $tj1 = " name like '%{$name}%'";
}
if(!empty($_POST["brand"]))
{
  $brand = $_POST["brand"];
  $tj2 = " brand like '%{$brand}%'";
}
//总条件
$tj ="{$tj1} and {$tj2}";
$sql = "select * from car where ".$tj;//注意where后空格
/*echo $sql;*/
?>
<form action="chaxun.php" method="post">
<div>名称：<input type="text" name="name" value="<?php echo $name ?>"/>系列：<input type="text" name="brand"/><input type="submit" value="查询" /></div>
</form>
<br/>
<table width="100%" border="1" cellpadding="0" cellspacing="0">
  <tr>
    <td>代号</td>
    <td>名称</td>
    <td>系列</td>
    <td>上市时间</td>
    <td>价格</td>
  </tr>
<?php
 
//只适用于单条件查询
/*$sql = "select * from car";
$name="";
if(!empty($_POST["name"]))
{
  $name = $_POST["name"];
  $sql = "select * from car where name like '%{$name}%' ";
}*/
 
$arr = $db->query($sql);
foreach($arr as $v)
  {
    $str = str_replace($name,"<span style='color:red'>{$name}</span>",$v[1]);
    echo "<tr>
         <td>{$v[0]}</td>
        <td>{$str}</td>
        <td>{$v[2]}</td>
        <td>{$v[3]}</td>
        <td>{$v[7]}</td>
       </tr>";
  }
?>
</table>
</body>
</html>