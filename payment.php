<?php
require "conf/config.php";
include "chk.php";
?>
<html>
<head>
<title><?php echo $sitename ?> -- 购物完成</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<?php echo $http_head; ?>
<link rel="stylesheet" href="conf/style.css" type="text/css">
</head>
<body bgcolor="#FFFFFF" text="#000000">
<?php include "conf/header.php" ?>
<table width="750" border="0" align="center" cellspacing="0" cellpadding="0">
  <tr align="center" bgcolor="#efefef"> 
    <td bgcolor="#FFFFFF"> 
      <?php
if ($basket_items==0)
{
 echo "<br><br><img src='images/emptcart.gif'>";
 echo  "<br><input class=stbtm name='继续购买' onClick=\"window.location.href='index.php';\" type=button value=继续购买>";
 echo "<br>";
}
else
{
?>
      <table width="630" border="0" cellspacing="0" cellpadding="0" align="center">
        <tr> 
          <td>&nbsp;</td>
        </tr>
        <tr> 
          <td> 
            <table cellpadding=0 cellspacing=0 width=630>
              <tbody> 
              <tr> 
                <td align=left width="80%"><b><font class=p14 color=#cc0000>您这次的订单：</font></b></td>
              </tr>
              <tr bgcolor=#cc0000> 
                <td height=2 valign=top></td>
              </tr>
              </tbody> 
            </table>
          </td>
        </tr>
        <tr> 
          <td> 
            <table width="100%" border="0" cellspacing="1" cellpadding="0">
              <tr> 
                <td bgcolor="#e4e4e4"><font color=#000000 
      size=2>商品名称</font></td>
                <td width="15%" align="center" bgcolor="#e4e4e4">零售价</td>
                <td width="15%" align="center" bgcolor="#e4e4e4"><font color=#000000 
      size=2>会员价</font></td>
                <td width="15%" align="center" bgcolor="#e4e4e4"><font color=#000000 
      size=2>数量</font></td>
                <td width="15%" align="center" bgcolor="#e4e4e4"><font color=#000000 
      size=2>小计</font></td>
              </tr>
              <?php
$price_all=0;
$price_sum=0;
$sendtmp="";
for ($basket_counter=0;$basket_counter<$basket_items;$basket_counter++) 
{
//把购物车中的商品的id添加到shopping表中
  $db2->query("insert into $shopping_t          values(null,0,$login_id,$basket_id[$basket_counter],$basket_amount[$basket_counter],'$date_tmp')");

			$amount=$basket_amount[$basket_counter];;
			$db->query("select name,price_m,price from $goods_t where id=$basket_id[$basket_counter]");
            $db->next_record();
			$price_all=$price_all+$db->f('price')*$amount;
			$price_sum=$price_sum+$db->f('price')*$amount;
	   $sendtmp.="<tr >
      <td width=\"60%\"><b>".stripslashes($db->f('name'))."</b></td>
      <td width=\"20%\"><font color=\"red\">".$db->f('price')."</font>元</td>
      <td width=\"20%\">".$basket_amount[$basket_counter]."</td>
    </tr>\n";
?>
              <tr> 
                <td><b> 
                  <?php echo stripslashes($db->f('name')); ?>
                  </b></td>
                <td width="15%" align="center"><font color=#000000 
      size=2><strike>￥<?php echo $db->f('price_m'); ?></strike> </font> </td>
                <td width="15%" align="center"><b><font 
      color=#cc0000>￥<?php echo $db->f('price'); ?></font></b></td>
                <td width="15%" align="center"> 
                  <?php echo $basket_amount[$basket_counter] ?>
                </td>
                <td width="15%" align="center"> 
                  <?php echo $db->f('price')*$amount; ?>
                </td>
              </tr>
              <?php 
}
$price_all_format=sprintf("%01.2f",$price_all); 
$flag=1;
 for ($basket_counter=0;$basket_counter<$basket_items;$basket_counter++) 
    if ($basket_amount[$basket_counter] >= $jiti_num) 
      {
       $price_all=$price_all*(1-$jiti_rebate);
       $flag=0;
      }

//如果购买同一商品超过指定的个数，则优惠用户所设的优惠值$jiti_rebate
if ($price_all >= 1000 and $flag)  $price_all=$price_all*(1-$rebate);
//单张定单总额超过1000元的折扣

//把用户的订单的送货信息添加到requests表中
$a=split(',',$province);
$province=$a[1];
$db2->query("insert into $requests_t
           values(null,$login_id,'$name',$sex,'$email','$province','$city','$tel',
               '$address','$post','$attrib',$price_all,$pay,0,0,'$date_tmp')");
$key_requests=$db2->insert_id();
//得到此次的订单号

$db->query("select id from $shopping_t where user_id=$login_id and requests_id=0");
 while($db->next_record())
  { 
    $id_shopping=$db->f('id');
    $db2->query("update $shopping_t set requests_id=$key_requests where id=$id_shopping");
  }
//用生成的订单号，更新shopping表中的每条记录

$basket_items=0;
array_splice($basket_amount,0);  //删除购物车的数组的所有元素
array_splice($basket_id,0);
unset($basket_amount);
unset($basket_id);
//当生成订单后，把购物车的内容清空
?>
              <tr> 
                <td colspan="5" width="100%" height="1" background="images/speaking_bg.gif"></td>
              </tr>
              <tr> 
                <td colspan="5">&nbsp;</td>
              </tr>
              <tr> 
                <td>&nbsp; </td>
                <td>&nbsp; </td>
                <td>&nbsp;</td>
                <td colspan="2"> 
                  <?php echo "合计：<b><font color=red>￥$price_all_format</font></b>";?>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
      <br>
      <table width="630" border="0" cellspacing="0" cellpadding="0" align="center">
        <tr> 
          <td align="center"><img src="images/new_shouhuo.gif" width="258" height="30"></td>
        </tr>
        <tr> 
          <td> 
            <table cellspacing="0" cellpadding="0" width="630">
              <tr> 
                <td align="left" width="80%"><b><font color="#CC0000" class="p14">恭喜，您的订单已经完成：</font></b></td>
              </tr>
              <tr bgcolor="#CC0000"> 
                <td colspan="4" height="2" valign="top"> </td>
              </tr>
            </table>
          </td>
        </tr>
        <tr align="center"> 
          <td>&nbsp;</td>
        </tr>
        <tr align="center"> 
          <td>以下是您的收货信息及定单信息, 如果您所填写的信息无效, 我们将无法处理您的定单!</td>
        </tr>
        <tr> 
          <td> 
            <table cellspacing="0" cellpadding="2" width="100%" border="1" style="font-size:9pt" bordercolorlight="#D2D2D2" bordercolordark="#FFFFFF">
              <tr> 
                <td width="116" bgcolor="f5f5f5">会员帐员</td>
                <td width="500" bgcolor="f5f5f5"> 
                  <?php echo $login_name; ?>
                </td>
              </tr>

              <tr bgcolor="f5f5f5"> 
                <td width="116">收货人姓名</td>
                <td width="500"> 
                  <?php echo  $name; if ($sex==1) echo "先生"; else echo "女士"; ?>
                </td>
              </tr>
              <tr> 
                <td width="116">收货人省份</td>
                <td width="500"> 
                  <?php echo  $province; ?>
                </td>
              </tr>
              <tr bgcolor="f5f5f5"> 
                <td width="116">收货人城市</td>
                <td width="500"> 
                  <?php echo  $city; ?>
                </td>
              </tr>
              <tr> 
                <td width="116">收货人Email</td>
                <td width="500"> 
                  <?php echo  $email; ?>
                </td>
              </tr>
              <tr> 
                <td width="116" bgcolor="f5f5f5">收货人地址</td>
                <td width="500" bgcolor="f5f5f5"> 
                  <?php echo  $address; ?>
                </td>
              </tr>
              <tr> 
                <td width="116">邮政编码</td>
                <td width="500"> 
                  <?php echo  $post; ?>
                </td>
              </tr>
              <tr> 
                <td width="116" bgcolor="f5f5f5">联系电话</td>
                <td width="500" bgcolor="f5f5f5"> 
                  <?php echo  $tel; ?>
                </td>
              </tr>
              <tr> 
                <td width="116" >定单编号</td>
                <td width="500" ><b><font  size="4" color="red"> 
                  <?php echo  $key_requests+$init_num; ?>
                  </font></b> (请记住您的定单号，以便以后查询) </td>
              </tr>
              <tr> 
                <td width="116" bgcolor="f5f5f5" >下单时间</td>
                <td width="500" bgcolor="f5f5f5" > 
                  <?php echo  $date_tmp; ?>
                </td>
              </tr>
              <tr> 
                <td width="116" >您的留言</td>
                <td width="500" > 
                  <?php echo  $attrib; ?>
                  &nbsp;</td>
              </tr>
              <tr> 
                <td width="116" bgcolor="f5f5f5" >应付总额</td>
                <td width="500" bgcolor="f5f5f5" >应付款（<font color="red" size="4"> 
                  <?php echo  $price_all+$send_money; ?>
                  元</font>）=货款总额（<font color="red" size="4"> 
                  <?php echo  $price_all; ?>
                  </font>)元+配送费（<font color="red" size="4"> 
                  <?php echo  $send_money; ?>
                  </font>元） (说明: 单位-人民币元. 
                  <?php
if ($price_sum >= 1000 and $flag) echo "价格超过 1000 元，折扣10%"; 
if (!$flag) echo "购买同一种商品超过10件，折扣20%";
?>
                  ) </td>
              </tr>
              <tr> 
                <td width="116" >送货方式</td>
                <td width="500" >EMS 特快专递 (说明: 在本公司购买任何产品均采用EMS方式发货) </td>
              </tr>
              <tr> 
                <td width="116" >&nbsp;</td>
                <td width="500" >&nbsp;</td>
              </tr>
              <tr> 
                <td width="116" bgcolor="f5f5f5" valign="top" >付款方式</td>
                <td width="500" bgcolor="f5f5f5" > 
                  <?php echo nl2br($pay_str[$pay]); ?>
                </td>
              </tr>
              <tr> 
                <td width="116" >&nbsp;</td>
                <td width="500" >&nbsp;</td>
              </tr>
              <tr> 
                <td width="116" bgcolor="f5f5f5" >&nbsp;</td>
                <td width="500" bgcolor="f5f5f5" ><b>请阅读此信息: </b></td>
              </tr>
              <tr> 
                <td width="116" >&nbsp;</td>
                <td width="500" >1.<br>
                  2.<br>
                  3.<br>
                  4.<br>
                  5. </td>
              </tr>
              <tr> 
                <td colspan="2" bgcolor="f5f5f5" align="center" ><b><font color="#cc0000">请尽快支付您的货款, 
                  以便我们届时即时处理您的定单!</font></b></td>
              </tr>
            </table>
          </td>
        </tr>
        <tr align="center"> 
          <td> 
<?php
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
        <span class=\"p12\">&nbsp;&nbsp;&nbsp;&nbsp;您好！感谢您订购 $sitename 产品。<b>我们会尽快为您服务！</b><br>
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
      <td colSpan=\"3\">订单号: ".($key_requests+$init_num)."</td>
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
@mail($email, $sitename."客户服务中心--".($key_requests+$init_num)."_订单信息", $sendbody,$headers);  
?>
            <p>&nbsp;
			</p>
            <p> 
              <input class=stbtm name=继续购买 onClick="window.location.href='index.php';" type=button value=继续购买>
              　　 
              <input class=stbtm name=打印该页 onClick="window.print();" type=button value=打印该页>
              　　 
              <input class=stbtm name=关闭窗口 onClick="window.close();" type=button value=关闭窗口>
            </p>
          </td>
        </tr>
      </table>
<?php } ?>
    </td>
  </tr>
</table>
<br>
<?php include "conf/footer.php"; ?>
</body>
</html>
