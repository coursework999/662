<?php
require "conf/config.php";
include "admin_check.php";
if ($action=="del")
{
  //删除用户订单表的订单
  $db->query("delete from $requests_t where id=($id-$init_num)");
  //删除用户shopping表的商品id
  $db->query("delete from $shopping_t where requests_id=($id-$init_num)");
  }
if ($do=="update")
{
  $db->query("update $requests_t set $action=$value where id=($id-$init_num)");
//给用户发邮件通知用户
  if ($action=="send_out" && $value==1)
  {
  //从订单库$requests_t中取出用户的一些信息
$db->query("select name,email,tel,post,address,fee  from $requests_t where id=($id-$init_num)");
$db->next_record();
$email=$db->f('email');
$name=$db->f('name');
$tel=$db->f('tel');
$post=$db->f('post');
$address=$db->f('address');
$price_all=$db->f('fee');

//从订单详细库中取出订单的详细信息
$sendtmp="";
$db->query("select goods_id,goods_num from $shopping_t where requests_id=($id-$init_num)");
while($db->next_record())
{
//从产品库中取出产品所对应的名称和价格
$db2->query("select name,price from $goods_t where id=".$db->f('goods_id'));
$db2->next_record();

$sendtmp.="<tr >
      <td width=\"60%\"><b>".stripslashes($db2->f('name'))."</b></td>
      <td width=\"20%\"><font color=\"red\">".$db2->f('price')."</font>元</td>
      <td width=\"20%\">".$db->f('goods_num')."</td>
    </tr>\n";
}

# 定义分界线 
$boundary = uniqid("");
# 如果浏览器没有指定文件的MIME类型，
$mimeType =  "text/html";  
# 生成邮件头 
$headers =  "From: $siteemail
Content-type: $mimeType; boundary=\"$boundary\"";
# 现在我们可以建立邮件的主体

$sendbody="<html>
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=gb2312\">
<title>$sitename—订购信息</title>
</head>
<body>

<table align=\"center\" border=\"0\" cellPadding=\"0\" cellSpacing=\"0\" width=\"550\">
  <tbody>
    <tr vAlign=\"top\">
      <td><br>
      <a href=\"$siteurl\"><img border=\"0\" src=\"$siteurl/images/logo.gif\" width=\"144\" height=\"46\"></a><br>
        <br><font size=\"3\"><b>尊敬的客户$name</b>：</font><br><br>
        <span class=\"p12\">&nbsp;&nbsp;&nbsp;&nbsp;您好！感谢您订购 $sitename 产品。<b>您购买的产品已经发货，请注意查收！</b><br>
        <br>
      &nbsp;&nbsp;&nbsp;&nbsp;如果您有什么问题或要求取消订单，请发<a href=\"mailto:$siteemail\"><strong><font color=\"red\">邮件</font></strong></a>并请注明订单号。<br>
      &nbsp;&nbsp;&nbsp;&nbsp;关于订单的处理情况，您随时可以在$sitename<a href=\"$siteurl/dingdang.php\"><strong><font color=\"red\">订单查询</font></strong></a>处查到,现附订单信息如下:
 
      <br>
        <table cellspacing=0 cellpadding=2 width=590 border=1 style='font-size:9pt' bordercolorlight=#D2D2D2 bordercolordark=#FFFFFF >
          <tbody>
            <tr>
              <td bgcolor=\"#f5f5f5\" width=\"20%\">收货人姓名</td>
              <td bgcolor=\"#f5f5f5\" width=\"80%\"><b>$name</b></td>
            </tr>
            <tr>
              <td width=\"20%\">联系电话</td>
              <td width=\"80%\"><b>$tel</b></td>
            </tr>
            <tr>
              <td bgcolor=\"#f5f5f5\" width=\"20%\">邮编</td>
              <td bgcolor=\"#f5f5f5\" width=\"80%\"><b>$post</b></td>
            </tr>
            <tr>
              <td width=\"20%\">送货地址</td>
              <td width=\"80%\"><b>$address</b></td>
            </tr>
          </tbody>
        </table>
        
        <br>
        <br>
        </span>
    </tr>
  </tbody>
</table>

<table cellspacing=0 cellpadding=2 width=590 border=1 style='font-size:9pt' bordercolorlight=#D2D2D2 bordercolordark=#FFFFFF align=\"center\">
  <tbody>
    <tr bgColor=\"#e6e6e6\">
      <td colSpan=\"3\">订单号: ".$id."</td>
    </tr>
    <tr>
      <td width=\"60%\">商品名称</td>
      <td width=\"20%\">商品价格</td>
      <td width=\"20%\">商品数量</td>
    </tr>
    
    
$sendtmp
    
    <tr align=\"right\" bgColor=\"#f5f5f5\">
      
    <td colSpan=\"3\"> 总货款:<font color=\"red\">￥$price_all</font>元&nbsp;&nbsp;&nbsp;&nbsp;配送费:<font color=\"red\">￥$send_money</font>元&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;应付款:<font color=\"red\">￥".($price_all+$send_money)."</font>元(人民币)</td>
    </tr>
  </tbody>
</table>
<br>
 

<div align=\"center\"> <span class=\"p12\"> <br>
  欢迎您再次到<a href=\"$siteurl\"><font color=\"blue\">$sitename</font></a>上购物<br>
  <a href=\"$siteurl/service.php\"><b><font color=\"red\">付款及相关说明</font><b></b></b></a><b><b><br>
  <b>电话：$sitetel</b><br>      
  <b>E-mail:<a href=\"mailto:$siteemail\">$siteemail</a></b><br>      
  <a href=\"$siteurl\">$siteurl</a><br>      
  </b></b></span>      
</div>      

</body>
      
</html>      
";
@mail($email, $sitename."客户服务中心--订单:".$id."_已经发货", $sendbody,$headers);  

  }
}
?>
<html>
<head>
<title><?php echo $sitename ?> -- 订单管理</title>
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
        订单管理</p>
      <table width="96%" border="0" cellspacing="0" bgcolor="#ffffff">
        <form name="form1" method="post" action="<?php echo $PHP_SELF ?>" >
          <tr> 
            <td> 按订单号、姓名查询: 
              <input type="text" name="key" size="15" class="think" >
              <input type="hidden" name="search" value="1">
              <input type="submit" name="submit1" value=":查 询:" class="stbtm2">
            </td>
          </tr>
        </form>
      </table>     
        
      <?php 
  if (!$page) $page=1;
  $tmp="where (payment=0 or send_out=0) and (TO_DAYS(now())-TO_DAYS(date_created)) < $dingdang_days"; 
  if ($key)
     if (($key-$init_num)>0)
	  $tmp.=" and id=".($key-$init_num);
     else
        $tmp.=" and name like '%$key%' ";  

  $db->query("select null from $requests_t $tmp"); //从订单表中查出用户的订单
  $total_num=$db->num_rows();//得到总记录数
  $totalpage=ceil($total_num/$num_to_show);//得到总页数
  $init_record=($page-1)*$num_to_show;
  $db->query("select * from $requests_t $tmp
     order by id DESC limit $init_record, $num_to_show");        
 ?>
      <table width="99%" border="0" cellspacing="0" align="center" >
        <tr> 
          <td width="69%"> <b>待处理订单列表：</b> (指已经发货或已经付款，两个只有一个操作成功，时间在 <font color="#FF0000"> 
            <?php echo $dingdang_days ?>
            </font> 天内)</td>
          <td width="31%" align="right"><a href="admin_dingdang.php"><font color="blue">待处理的订单</font></a> 
            <a href="fail_admin_dingdang.php?action=all" onClick="return confirm('确定要删除所有的无效订单吗?')"><font color="blue"></font></a><a href="admin_succeed_dingdang.php"><font color="blue">成功的订单</font></a> 
            <a href="admin_fail_dingdang.php"><font color="blue">无效的订单</font></a></td>
        </tr>
        <tr> 
          <td colspan="2" align="center" height="25"><font color="#CC0000">当进行&quot;</font><font color="#cc0000">发货操作</font><font color="#CC0000">&quot;中的&quot;己发货&quot;时，将会给此用户发一封邮件，说明用户的货物已经发出。</font></td>
        </tr>
      </table>
      <table width="96%" border="0" cellspacing="1" cellpadding="1">
        <form action="<?php echo $PHP_SELF."?key=$key" ?> " method="post" name="form8" onSubmit="return check_page('form8.page')">
          <tr> 
            <td align="right"> 总计: 
              <?php echo $total_num." ";
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
              <input type="text" name="page" size="2">
              <input type="submit" name="Submit22" value="GO">
            </td>
          </tr>
        </form>
      </table>
      <table width="98%" border="1" cellspacing="0" align=center>
        <tr> 
          <td align=center><font color="#cc0000">订单序号</font></td>
          <td align=center><font color="#cc0000">订单会员</font></td>
          <td align=center><font color="#cc0000">付款方式</font></td>
          <td align=center><font color="#cc0000">下单时间</font></td>
          <td align=center><font color="#cc0000">是否发货</font></td>
          <td align=center><font color="#cc0000">是否付款</font></td>
          <td align=center><font color="#cc0000">应付款</font></td>
          <td align=center><font color="#cc0000">发货操作</font></td>
          <td align=center><font color="#cc0000">付款操作</font></td>
          <td align=center>&nbsp;</td>
        </tr>
        <?php
while($db->next_record())
  { 
?>
        <tr> 
          <td align=center> <a href='admin_dingdang_disp.php?id=<?php echo $db->f('id')+$init_num ?>' class='clink03' target="_blank"> 
            <?php echo $db->f('id')+$init_num; ?>
            </a> </td>
          <td align=center>
            <?php
$db2->query("select id,u_name from $user_t where id=".$db->f('user_id'));
$db2->next_record();
echo '<a href="user_list.php?id='.$db2->f('id').'" class="clink03" target="_blank">'.$db2->f('u_name').'</a>';
?>
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
            <?php echo $db->f('fee')+$send_money; ?>
            元</td>
          <td align=center> 
            <?php
			if ($db->f('send_out'))
			 echo "<a href='$PHP_SELF?do=update&action=send_out&value=0&id=".($db->f('id')+$init_num)."' onClick=\"return confirm('确定该条订单未发货吗?')\" class='clink03'>"."未发货</a>";
            else
			 echo "<a href='$PHP_SELF?do=update&action=send_out&value=1&id=".($db->f('id')+$init_num)."' onClick=\"return confirm('确定该条订单已发货吗?')\" class='clink03'>"."己发货</a>";
			 ?>
          </td>
          <td align=center> 
            <?php
			if ($db->f('payment'))
              echo "<a href='$PHP_SELF?do=update&action=payment&value=0&id=".($db->f('id')+$init_num)."' onClick=\"return confirm('确定该条订单未付款吗?')\" class='clink03'>"."未付款</a>";
		   else
			  echo "<a href='$PHP_SELF?do=update&action=payment&value=1&id=".($db->f('id')+$init_num)."' onClick=\"return confirm('确定该条订单已付款吗?')\" class='clink03'>"."己付款</a>";
			?>
          </td>
          <td align=center> 
            <input type="button" name="Button2" value="删除" class="think" <?php echo "onclick=\"javaScript:if (confirm('确定要删除吗?')) window.location.href='$PHP_SELF?action=del&id=".($db->f('id')+$init_num)."'\""; ?>>
          </td>
        </tr>
        <?php } ?>
      </table>
      <table width="96%" border="0" cellspacing="1" cellpadding="1">
        <form action="<?php echo $PHP_SELF."?key=$key" ?> " method="post" name="form88" onSubmit="return check_page('form88.page')">
          <tr> 
            <td align="right"> 总计: 
              <?php echo $total_num." ";
  $page1=$page-1;
  $page2=$page+1;
  if ($page1 < 1) echo "<FONT color=#999999>首  页&nbsp;上一页</FONT>&nbsp;"; 
  else echo "<a href='$PHP_SELF?page=1&key=$key'>首  页</a>&nbsp;<a href='$PHP_SELF?page=$page1&key=$key'>上一页</a>&nbsp;"; 
  if ($page2 > $totalpage) echo "<FONT color=#999999>下一页&nbsp;尾  页</FONT>&nbsp;"; 
  else echo "<a href='$PHP_SELF?page=$page2&key=$key'>下一页</a>&nbsp;<a href='$PHP_SELF?page=$totalpage&key=$key'>尾  页</a>&nbsp;"; 
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
