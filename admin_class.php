<?php
require "conf/config.php";
include "admin_check.php";

$name1=trim($name1);
$name2=trim($name2);
$up_id=intval($up_id);

if ($name1)
{
  $db->query("insert into $class_t values(null,'$name1',$up_id)");
  $result="类别添加成功。";
}
if ($name2)
{
  $db->query("insert into $class_t values(null,'$name2',$up_id)");
  $result="类别添加成功。";
}
if ($Submit)
{
   $aryid=@implode(",",$delete);
   $db2->query("delete from $class_t where id in($aryid) or up_id in($aryid)");
   $db2->query("delete from $goods_t where class_id in($aryid) or up_id in($aryid)");
   $result="类别删除成功，类别所对应的产品删除成功。";
}
if ($action=="update") //修改产品类别名称
{
 $db->query("update $class_t set name='$mc' where id=$id2");
 header("Location: admin_class.php?up_id=$up_id");
 }
?>
<html>
<head>
<title><?php echo $sitename ?> -- 商品类别管理</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<?php echo $http_head; ?>
<link rel="stylesheet" href="conf/style.css" type="text/css">
</head>
<body bgcolor="#FFFFFF" text="#000000">
<?php include "conf/admin.php"; ?>
<table width="750" align="center">
  <tr align="center"> 
    <td bgcolor="#EFEFEF" class="p13"> 
      <p><br>
        商品类别管理<br>
        <a href="admin_class.php" class="clink03">返回大类 </a></p>
		<?php echo $result; ?>
      <form name="form1" method="post" action="">
        <table width="50%" border="1" class="black" cellspacing="1" cellpadding="3" bordercolor="#FFFFFF" bgcolor="#D3E3FE">
          <tr align="center"> 
            <td colspan="4"> 
              <input type="checkbox" name="deleteall" value="on" onClick="CheckAll(this.form,this.checked)"   >
              <font color="#CC3366">全选 删除类别时，将删除此类的所有产品</font> </td>
          </tr>
          <tr> 
            <td width="15%" align="center">删除</td>
            <td width="24%" align="center">编号</td>
            <td width="43%" align="center">类别名称(子类个数)</td>
            <td width="18%" align="center">修改类别</td>
          </tr>
          <?php
		  $db->query("select * from $class_t where up_id=$up_id");
			   while($db->next_record())
			   {
			   $i++;
			   ?>
          <tr> 
            <td width="15%" bgcolor="<?php if ($i % 2 ==0) echo "#ffffff";else echo "#F1F5FE"; ?>" align="center"> 
              <input type="checkbox" name="delete[]" value="<?php echo $db->f('id'); ?>">
            </td>
            <td width="24%" align="center" bgcolor="<?php if ($i % 2 ==0) echo "#ffffff";else echo "#F1F5FE"; ?>"> 
              <?php echo $db->f('id') ?>
            </td>
            <td width="43%" align="center" bgcolor="<?php if ($i % 2 ==0) echo "#ffffff";else echo "#F1F5FE"; ?>"> 
              <?php
if ($up_id)
{
 echo $db->f('name'); 
}
else
{
?>
              <a href="<?php echo $PHP_SELF; ?>?up_id=<?php echo $db->f('id'); ?>" class="clink03"> 
              <?php echo $db->f('name'); ?>
              </a> 
              <?php			  
  $db2->query("select null from $class_t where up_id=".$db->f('id'));
  echo " (".$db2->num_rows().")";
 }
?>
            </td>
            <td width="18%" align="center" bgcolor="<?php if ($i % 2 ==0) echo "#ffffff";else echo "#F1F5FE"; ?>"><a href="<?php echo $PHP_SELF ?>?up_id=<?php echo $up_id ?>&id=<?php echo $db->f('id') ?>#xg" class="clink03">修改</a></td>
          </tr>
          <?php } ?>
          <tr align="center"> 
            <td colspan="4"> 
              <input type="checkbox" name="deleteall" value="on" onClick="CheckAll(this.form,this.checked)"   >
              <font color="#CC3366">全选 删除类别时，将删除此类的所有产品</font> </td>
          </tr>
          <tr align="center"> 
            <td colspan="4">添加产品类别： 
              <input type="text" name="name1" maxlength="40" size="20" class="think">
            </td>
          </tr>
          <tr align="center"> 
            <td colspan="4">添加产品类别： 
              <input type="text" name="name2" maxlength="40" size="20" class="think">
              <input type="hidden" name="up_id" value="<?php echo $up_id ?>">
            </td>
          </tr>
          <tr align="center"> 
            <td colspan="4"> 
              <input type="submit" name="Submit" value="更 新" class="stbtm2">
            </td>
          </tr>
          <?php
if ($id)
{
$db->query("select name from $class_t where id=$id");
$db->next_record();			   
?>
          <tr align="center" bgcolor="#efefef"> 
            <td colspan="4" height="39"> <span class="p13"><a name="xg"></a>修改产品类别：</span> 
              <input type="text" name="mc" maxlength="40" size="20" class="think" value="<?php echo $db->f('name') ?>">
              <input type="hidden" name="id2" value="<?php echo $id ?>">
              <input type="hidden" name="action" value="update">
              <input type="submit" name="Submit22" value="修 改" class="stbtm2">
            </td>
          </tr>
          <?php } ?>
        </table>
      </form>
      
    </td>
  </tr>
</table>
<br>
<u><span class="p14">帮助信息</span></u><span class="p14">： </span> 
<ul>
  <li><span class="p14">单击&quot;修改&quot;链接，可以修改一个类别的名称</span></li>
  <li><span class="p14">要添加一个子类，先单击大类的链接，再使用添加功能</span></li>
  <li><span class="p14">当删除一个大类时，该大类中的所有子类也将被删除，同时，商品库中该类的所有商品也将都被删除</span></li>
</ul>
<?php include "conf/footer.php"; ?>
</body>
</html>
