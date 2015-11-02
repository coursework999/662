<?php
require "conf/config.php";
include "admin_check.php";
$up_id=intval($up_id);
if ($Submit)
{
 for($i=0;$i<count($delete);$i++)
 {
   $arytmp=split("\|",$delete[$i]); //取得这个要删除的信息的id和image字段的值
   $tmpid[]=$arytmp[0];
   $image=$arytmp[1];
   @unlink($image);   
 }
 $aryid=@implode(",",$tmpid);
 $db2->query("delete from $goods_t where id in($aryid)");
 $result="删除产品成功。";
}
?>
<html>
<head>
<title><?php echo $sitename ?> -- 商品管理</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<?php echo $http_head; ?>
<link rel="stylesheet" href="conf/style.css" type="text/css">
</head>
<body bgcolor="#FFFFFF" text="#000000">
<?php include "conf/admin.php"; ?>
<table width="750" align="center">
  <tr align="center"> 
    <td bgcolor="#EFEFEF"> 
      <p class="p13"><br>
        商品管理 </p>
      <form name="form1" method="post" action="">
        关键字查询： 
        <input type="text" name="key" class="think">
        　
        <input type="submit" name="Submit1" value="查 询" class="stbtm2">
      </form>
      　 
      <div align="left">　　分类浏览：<span class="white">
        <?php
  $db->query("select * from $class_t where up_id=$up_id");
  while($db->next_record())
  {
   if ($up_id)
    {
   	$db2->query("select count(*) as total from $goods_t where class_id=".$db->f('id'));
	$db2->next_record();	
    echo "<a href='$PHP_SELF?up_id=$up_id&sf=".$db->f('id')."' class='clink03'>".$db->f('name')."</a>(".$db2->f('total').") 　";
    }
   else
   {
   	$db2->query("select count(*) as total from $class_t where up_id=".$db->f('id'));
	$db2->next_record();	
    echo "<a href='$PHP_SELF?up_id=".$db->f('id')."' class='clink03'>".$db->f('name')."</a>(".$db2->f('total').") 　";
   }
  }
?>
        </span><br>
        <br>
      </div>
      <?php
 echo $result; 
 if ($key)
     $tmp="where name like '%$key%' or descript like '%$key%'";
 if ($up_id)
    $tmp="where up_id=$up_id";
 if ($sf)
     $tmp="where class_id=$sf";
  if (!$page) $page=1;
  $db->query("select null from $goods_t $tmp");
  $total_num=$db->num_rows();//得到总记录数
  $totalpage=ceil($total_num/$num_to_show);//得到总页数
  $init_record=($page-1)*$num_to_show;
  $db->query("select id,name,image,price_m,price,state
   from $goods_t $tmp
   order by id DESC limit $init_record, $num_to_show");        
?>
      <table width="96%" border="0" cellspacing="1" cellpadding="1">
        <form action="<?php echo $PHP_SELF."?up_id=$up_id&sf=$sf&key=$key" ?> " method="post" name="form8" onSubmit="return check_page('form8.page')">
          <tr> 
            <td align="right"> <a href="admin_goods_work.php?action=insert<?php echo "&up_id=$up_id&class_id=$sf" ?>" class="clink03">添加新商品</a>　总计: 
              <?php echo $total_num." ";
  $page1=$page-1;
  $page2=$page+1;
  if ($page1 < 1) echo "<FONT color=#999999>首  页&nbsp;上一页</FONT>&nbsp;"; 
  else echo "<a href='$PHP_SELF?page=1&up_id=$up_id&sf=$sf&key=$key'>首  页</a>&nbsp;<a href='$PHP_SELF?page=$page1&up_id=$up_id&sf=$sf&key=$key'>上一页</a>&nbsp;"; 
  if ($page2 > $totalpage) echo "<FONT color=#999999>下一页&nbsp;尾  页</FONT>&nbsp;"; 
  else echo "<a href='$PHP_SELF?page=$page2&up_id=$up_id&sf=$sf&key=$key'>下一页</a>&nbsp;<a href='$PHP_SELF?page=$totalpage&up_id=$up_id&sf=$sf&key=$key'>尾  页</a>&nbsp;"; 
?>
              当前页:<b> 
              <?php echo $page."/".$totalpage ?>
              </b>&nbsp; 
              <script language="JavaScript">
function check_page(name)
{
 eval("page="+name+".value");
 if (isNaN(page) || page <=0 || page > <?php echo $totalpage ?>)
  {
    alert ("请正确输入页数，最大值为 <?php echo $totalpage ?> ！");
    eval(name+".select()");
	return false;
  }
}
</script>
              转到第 
              <input type="text" name="page" size="2">
              <input type="submit" name="Submit22" value="GO">
            </td>
          </tr>
        </form>
      </table>
      <form name="form_sele" method="post" action="">
        <table width="98%" border="1" class="black" cellspacing="1" cellpadding="3" bordercolor="#FFFFFF" bgcolor="#D3E3FE">
          <tr> 
            <td colspan="7" align="center"> 
              <input type="checkbox" name="deleteall" value="on" onClick="CheckAll(this.form,this.checked)"   >
              <font color="#CC3366">全选 </font> 　 
              <input type="submit" name="Submit" value="删除" onClick="if(!confirm('确定要删除这些吗？')) return false;" class="stbtm2">
            </td>
          </tr>
          <tr> 
            <td width="8%" align="center">编号</td>
            <td width="56%" align="center">商品名称</td>
            <td width="10%" align="center">市场价</td>
            <td width="10%" align="center">会员价</td>
            <td width="6%" align="center">状态</td>
            <td width="5%" align="center">修改</td>
            <td width="5%" align="center">删除</td>
          </tr>
          <?php
		   while($db->next_record())
			   {
			   $i++;
			   ?>
          <tr> 
            <td width="8%" align="center" bgcolor="<?php if ($i % 2 ==0) echo "#ffffff";else echo "#F1F5FE"; ?>"> 
              <?php echo $db->f('id') ?>
            </td>
            <td width="56%" bgcolor="<?php if ($i % 2 ==0) echo "#ffffff";else echo "#F1F5FE"; ?>"> 
              <a href="goods_list.php?id=<?php echo $db->f('id') ?>" class='clink03' target="_blank"> 
              <?php echo stripslashes($db->f('name')) ?>
              </a></td>
            <td width="10%" align="center" bgcolor="<?php if ($i % 2 ==0) echo "#ffffff";else echo "#F1F5FE"; ?>"> 
              <?php echo $db->f('price_m') ?>
            </td>
            <td width="10%" align="center" bgcolor="<?php if ($i % 2 ==0) echo "#ffffff";else echo "#F1F5FE"; ?>"> 
              <?php echo $db->f('price') ?>
            </td>
            <td width="6%" align="center" bgcolor="<?php if ($i % 2 ==0) echo "#ffffff";else echo "#F1F5FE"; ?>"> 
              <?php
			if ($db->f('state')==0) echo "有货";
			if ($db->f('state')==1) echo "缺货";
			 ?>
            </td>
            <td width="5%" align="center" bgcolor="<?php if ($i % 2 ==0) echo "#ffffff";else echo "#F1F5FE"; ?>"> 
              <?php 
    $link_order = "action=update&id=".$db->f('id');
    echo "<a href=\"admin_goods_work.php?$link_order\">";
    echo '<img src="images/xg.gif" alt="修 改" border="0"></a>';
    ?>
            </td>
            <td width="5%" align="center" bgcolor="<?php if ($i % 2 ==0) echo "#ffffff";else echo "#F1F5FE"; ?>"> 
              <input type="checkbox" name="delete[]" value="<?php echo $db->f('id')."|".$db->f('image'); ?>">
            </td>
          </tr>
	   <?php } ?>
          <tr> 
            <td colspan="7" align="center"> 
              <input type="checkbox" name="deleteall" value="on" onClick="CheckAll(this.form,this.checked)"   >
              <font color="#CC3366">全选 </font> 　 
              <input type="submit" name="Submit" value="删除" onClick="if(!confirm('确定要删除这些吗？')) return false;" class="stbtm2">
            </td>
          </tr>    
        </table>
	  </form>
      <table width="96%" border="0" cellspacing="1" cellpadding="1">
        <form action="<?php echo $PHP_SELF."?up_id=$up_id&sf=$sf&key=$key" ?> " method="post" name="form88" onSubmit="return check_page('form88.page')">
          <tr> 
            <td align="right"> <a href="admin_goods_work.php?action=insert<?php echo "&up_id=$up_id&class_id=$class_id" ?>" class="clink03">添加新商品</a>　总计: 
              <?php echo $total_num." ";
  $page1=$page-1;
  $page2=$page+1;
  if ($page1 < 1) echo "<FONT color=#999999>首  页&nbsp;上一页</FONT>&nbsp;"; 
  else echo "<a href='$PHP_SELF?page=1&up_id=$up_id&sf=$sf&key=$key'>首  页</a>&nbsp;<a href='$PHP_SELF?page=$page1&up_id=$up_id&sf=$sf&key=$key'>上一页</a>&nbsp;"; 
  if ($page2 > $totalpage) echo "<FONT color=#999999>下一页&nbsp;尾  页</FONT>&nbsp;"; 
  else echo "<a href='$PHP_SELF?page=$page2&up_id=$up_id&sf=$sf&key=$key'>下一页</a>&nbsp;<a href='$PHP_SELF?page=$totalpage&up_id=$up_id&sf=$sf&key=$key'>尾  页</a>&nbsp;"; 
?>
              当前页:<b> 
              <?php echo $page."/".$totalpage ?>
              </b>&nbsp; 转到第 
              <input type="text" name="page" size="2">
              <input type="submit" name="Submit222" value="GO">
            </td>
          </tr>
        </form>
      </table>
    </td>
  </tr>
</table>
<br>

<?php include "conf/footer.php"; ?>
</body>
</html>
