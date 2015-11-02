<?php
require "conf/config.php";
include "chk.php";
if ($action=="del")
{
  $id=$id-$init_num;
  //删除用户订单表的订单
  $db->query("delete from $requests_t 
      where id=$id and user_id=$login_id and UNIX_TIMESTAMP(NOW())-UNIX_TIMESTAMP(date_created)<$del_delay");
  //删除用户shopping表的商品id
  $db->query("delete from $shopping_t 
      where requests_id=$id and user_id=$login_id and UNIX_TIMESTAMP(NOW())-UNIX_TIMESTAMP(date_created)<$del_delay");
}
?>
<html>
<head>
<title><?php echo $sitename ?> -- 订单查询</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<?php echo $http_head; ?>
<link rel="stylesheet" href="conf/style.css" type="text/css">
</head>
<body bgcolor="#FFFFFF" text="#000000">
<?php include "conf/header.php" ?>
<table width="750" border="0" align="center" cellspacing="0" cellpadding="0">
  <tr align="center" bgcolor="#efefef"> 
    <td> 
      <?php
$db->query("select sex from $user_t where id=$login_id");
$db->next_record();
$title=$login_name;
if ($db->f('sex')==1)
   $title.="先生";
   else if ($db->f('age')<30)
   $title.="小姐";
   else
   $title.="女士";

  if (!$page) $page=1;
  $db->query("select null from $requests_t where user_id=$login_id"); //从订单表中查出用户的订单
  $total_num=$db->num_rows();//得到总记录数
  $totalpage=ceil($total_num/$num_to_show);//得到总页数
  $init_record=($page-1)*$num_to_show;
  $db->query("select *,UNIX_TIMESTAMP(NOW())-UNIX_TIMESTAMP(date_created) as mytime from $requests_t where user_id=$login_id
     order by id DESC limit $init_record, $num_to_show");        
 ?>
      <br>
      <table width="96%" border="0" cellspacing="0" bgcolor="#ffffff">
        <tr> 
          <td height="17"><b><font color="#cc0000">
            <?php echo $title; ?>
            的订单</font>&nbsp;&nbsp;
            <?php if (!$total_num) echo "您暂时没有订单!";?>
            </b></td>
        </tr>
      </table>
      <br>
      <table width="99%" border="0" cellspacing="0" align="center" >
        <tr> 
          <td> 
            <div width="20"><b>订单处理列表：</b> </div>
          </td>
        </tr>
      </table>
      <table width="96%" border="0" cellspacing="1" cellpadding="1">
        <form action="<?php echo $PHP_SELF."?key=$key" ?> " method="post" name="form8" onSubmit="return check_page('form8.page')">
          <tr> 
            <td align="right"> 总计: 
              <?php echo $total_num." 张订单 ";
  $page1=$page-1;
  $page2=$page+1;
  if ($page1 < 1) echo "<FONT color=#999999>首  页&nbsp;上一页</FONT>&nbsp;"; 
  else echo "<a href='$PHP_SELF?page=1&key=$key'>首  页</a>&nbsp;<a href='$PHP_SELF?page=$page1&key=$key'>上一页</a>&nbsp;"; 
  if ($page2 > $totalpage) echo "<FONT color=#999999>下一页&nbsp;尾  页</FONT>&nbsp;"; 
  else echo "<a href='$PHP_SELF?page=$page2&key=$key'>下一页</a>&nbsp;<a href='$PHP_SELF?page=$totalpage&key=$key'>尾  页</a>&nbsp;"; 
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
              <input type="text" name="page" size="2" class="think">
              <input type="submit" name="Submit22" value="GO" class="think">
            </td>
          </tr>
        </form>
      </table>
      <table width="98%" border="1" cellspacing="0" align=center>
        <tr> 
          <td align=center><font color="#cc0000">订单序号</font></td>
          <td align=center><font color="#cc0000">付款方式</font></td>
          <td align=center><font color="#cc0000">下单时间</font></td>
          <td align=center><font color="#cc0000">是否已发货</font></td>
          <td align=center><font color="#cc0000">是否己付款</font></td>
          <td align=center><font color="#cc0000">订单金额</font></td>
          <td align=center><font color="#cc0000">附加费</font></td>
          <td align=center><font color="#cc0000">应付款</font></td>
          <td align=center><font color="#cc0000">详细信息</font></td>
        </tr>
        <?php
while($db->next_record())
  { 
?>
        <tr> 
          <td align=center>
            <?php echo $db->f('id')+$init_num; ?>
          </td>
          <td align=center>
            <?php
echo substr($pay_str[$db->f('pay')],0,8);
?>
          </td>
          <td align=center>
            <?php echo $db->f('date_created'); ?>
          </td>
          <td align=center> 
            <?php if ($db->f('send_out')) echo "己发货"; else echo "<font color=\"#cc0000\">未发货</font>"; ?>
          </td>
          <td align=center>
            <?php if ($db->f('payment')) echo "己付款"; else echo "<font color=\"#cc0000\">未付款</font>"; ?>
          </td>
          <td align=center>
            <?php echo $db->f('fee'); ?>元</td>
          <td align=center>
            <?php echo  $send_money; ?>元</td>
          <td align=center>
            <?php echo $db->f('fee')+$send_money; ?>元</td>
          <td align=center> 
            <input type="button" name="Button" value="查看" class="think" <?php echo "onclick=\"javaScript:window.open('dingdang_disp.php?id=".($db->f('id')+$init_num)."','orderform')\"" ?>>
            <input type="button" name="Button2" value="删除" class="think" <?php echo "onclick=\"javaScript:if (confirm('确定要删除吗?')) window.location.href='$PHP_SELF?action=del&id=".($db->f('id')+$init_num)."'\""; if ($db->f('mytime')>$del_delay) echo "disabled"; ?>>
          </td>
        </tr>
        <?php } ?>
      </table>
    </td>
  </tr>
</table>
<br>
<?php include "conf/footer.php"; ?>
</body>
</html>
