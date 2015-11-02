<?php
require "conf/config.php";
include "chk.php";
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
<table width="749" border="0" cellspacing="1" align="center">
  <tr bgcolor="#EFEFEF" align="center"> 
    <td> <br>
      <table width="96%" border="0" cellspacing="0" bgcolor="#ffffff">
        <tr> 
          <td height="17"><b>订单号
            <?php echo $id; ?>
            </b></td>
        </tr>
      </table>
<?php
$db->query("select * from $shopping_t where user_id=$login_id and requests_id=($id-$init_num)");
if ($db->num_rows())
{
?>
      <br>
      <table align=center border=0 cellspacing=0 width="96%">
        <tbody> 
        <tr> 
          <td> 此订<span 
      class=p9>单所购商品</span>:</td>
        </tr>
        </tbody> 
      </table>
      <table border=1 cellspacing=0 width="85%">
        <tbody> 
        <tr align=middle> 
          <td width="35%"><font color=#cc0000>商品名称</font></td>
          <td width="15%"><font color=#cc0000>数量</font></td>
          <td width="15%"><font color=#cc0000>零售价</font></td>
          <td width="15%"><font color=#cc0000>会员价</font></td>
          <td width="20%"><font color="#cc0000">购买时间</font></td>
        </tr>
        <?php
while($db->next_record())
{
?>
        <tr> 
          <td width="35%">
            <?php
$db2->query("select name,price_m,price from $goods_t where id=".$db->f('goods_id'));
$db2->next_record();
echo stripslashes($db2->f('name'));
?>
          </td>
          <td align=middle width="15%">
            <?php echo $db->f('goods_num'); ?>
          </td>
          <td align=right width="15%">
            <?php echo $db2->f('price_m'); ?>
            元 </td>
          <td align=right width="15%">
            <?php echo $db2->f('price'); ?>
            元 </td>
          <td align=right width="20%">
            <?php echo $db->f('date_created'); ?>
          </td>
        </tr>
        <?php } ?>
        </tbody> 
      </table>
      <br>
      <table border=0 cellspacing=0 width="89%">
        <tbody> 
        <tr> 
          <td> 此订<span 
      class=p9>单附加</span>信息:</td>
        </tr>
        </tbody> 
      </table>
      <?php
$db->query("select * from $requests_t where id=($id-$init_num)");
$db->next_record();
?>
      <br>
      <table align=center border=0 cellspacing=0 width="86%">
        <tbody> 
        <tr> 
          <td height=25 width="18%"><font color=#cc0000>订单号：</font> </td>
          <td width="31%">
            <?php echo $id; ?>
          </td>
          <td width="16%"><font color=#cc0000>下单时间：</font> </td>
          <td width="35%">
            <?php echo $db->f('date_created'); ?>
          </td>
        </tr>
        <tr> 
          <td height=26 width="18%"><font color=#cc0000>是否已发货：</font></td>
          <td height=26 width="31%">
            <?php if ($db->f('send_out')) echo "己发货"; else echo "未发货"; ?>
          </td>
          <td height=26 width="16%">&nbsp;</td>
          <td height=26 width="35%">&nbsp;</td>
        </tr>
        <tr> 
          <td height=24 width="18%"><font color=#cc0000>是否已付款：</font></td>
          <td height=24 width="31%">
            <?php if ($db->f('payment')) echo "己付款"; else echo "未付款"; ?>
          </td>
          <td height=24 width="16%"><font color=#cc0000>订单金额：</font></td>
          <td height=24 width="35%">
            <?php echo $db->f('fee'); ?>
            元</td>
        </tr>
        <tr> 
          <td height=28 width="18%"><font color=#cc0000>附加费：</font> </td>
          <td height=28 width="31%">
            <?php echo  $send_money; ?>
            元 </td>
          <td height=28 width="16%"><font color=#cc0000>应付款：</font> </td>
          <td height=28 width="35%">
            <?php echo $db->f('fee')+$send_money; ?>
            元 </td>
        </tr>
        <tr> 
          <td height=29 width="18%"><font color=#cc0000>备注：</font></td>
          <td colspan=3 height=29 width="82%">
            <?php echo $db->f('attrib'); ?>
          </td>
        </tr>
        </tbody> 
      </table>
      <table border=0 cellspacing=0 width="89%">
        <tbody> 
        <tr> 
          <td> 此订单收货人信息:</td>
        </tr>
        </tbody> 
      </table>
      <table align=center border=0 cellspacing=0 width="86%">
        <tbody> 
        <tr> 
          <td height=25 width="18%"><font color=#cc0000>用户名：</font> </td>
          <td width="31%">
            <?php echo $login_name; ?>
          </td>
          <td width="16%"><font color=#cc0000>姓名：</font> </td>
          <td width="35%">
            <?php echo $db->f('name'); ?>
          </td>
        </tr>
        <tr> 
          <td height=28 width="18%"><font color=#cc0000>Email：</font> </td>
          <td height=28 width="31%">
            <?php echo "<a href='mailto:".$db->f('email')."'>".$db->f('email')."</a>"; ?>
          </td>
          <td height=28 width="16%"><font color=#cc0000>电话：</font> </td>
          <td height=28 width="35%">
            <?php echo $db->f('tel'); ?>
          </td>
        </tr>
        <tr> 
          <td height=28 width="18%"><font color=#cc0000>省份：</font> </td>
          <td height=28 width="31%">
            <?php echo $db->f('province'); ?>
          </td>
          <td height=28 width="16%"><font color=#cc0000>城市：</font> </td>
          <td height=28 width="35%">
            <?php echo $db->f('city'); ?>
          </td>
        </tr>
        <tr> 
          <td height=28 width="18%"><font color=#cc0000>邮编：</font> </td>
          <td height=28 width="31%">
            <?php echo $db->f('post'); ?>
          </td>
          <td height=28 width="16%"><font color=#cc0000>收货地址：</font> </td>
          <td height=28 width="35%">
            <?php echo $db->f('address'); ?>
          </td>
        </tr>
        </tbody> 
      </table>
<?php
 }
else
 echo "<br><br>对不起，您浏览的订单不存在!<br><br>";
?>
	  <br>
	  
    </td>
  </tr>
</table>
<div align="left">
  <?php include "conf/footer.php"; ?>
</div>
</body>
</html>
