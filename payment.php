<?php
require "conf/config.php";
include "chk.php";
?>
<html>
<head>
<title><?php echo $sitename ?> -- �������</title>
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
 echo  "<br><input class=stbtm name='��������' onClick=\"window.location.href='index.php';\" type=button value=��������>";
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
                <td align=left width="80%"><b><font class=p14 color=#cc0000>����εĶ�����</font></b></td>
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
      size=2>��Ʒ����</font></td>
                <td width="15%" align="center" bgcolor="#e4e4e4">���ۼ�</td>
                <td width="15%" align="center" bgcolor="#e4e4e4"><font color=#000000 
      size=2>��Ա��</font></td>
                <td width="15%" align="center" bgcolor="#e4e4e4"><font color=#000000 
      size=2>����</font></td>
                <td width="15%" align="center" bgcolor="#e4e4e4"><font color=#000000 
      size=2>С��</font></td>
              </tr>
              <?php
$price_all=0;
$price_sum=0;
$sendtmp="";
for ($basket_counter=0;$basket_counter<$basket_items;$basket_counter++) 
{
//�ѹ��ﳵ�е���Ʒ��id��ӵ�shopping����
  $db2->query("insert into $shopping_t          values(null,0,$login_id,$basket_id[$basket_counter],$basket_amount[$basket_counter],'$date_tmp')");

			$amount=$basket_amount[$basket_counter];;
			$db->query("select name,price_m,price from $goods_t where id=$basket_id[$basket_counter]");
            $db->next_record();
			$price_all=$price_all+$db->f('price')*$amount;
			$price_sum=$price_sum+$db->f('price')*$amount;
	   $sendtmp.="<tr >
      <td width=\"60%\"><b>".stripslashes($db->f('name'))."</b></td>
      <td width=\"20%\"><font color=\"red\">".$db->f('price')."</font>Ԫ</td>
      <td width=\"20%\">".$basket_amount[$basket_counter]."</td>
    </tr>\n";
?>
              <tr> 
                <td><b> 
                  <?php echo stripslashes($db->f('name')); ?>
                  </b></td>
                <td width="15%" align="center"><font color=#000000 
      size=2><strike>��<?php echo $db->f('price_m'); ?></strike> </font> </td>
                <td width="15%" align="center"><b><font 
      color=#cc0000>��<?php echo $db->f('price'); ?></font></b></td>
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

//�������ͬһ��Ʒ����ָ���ĸ��������Ż��û�������Ż�ֵ$jiti_rebate
if ($price_all >= 1000 and $flag)  $price_all=$price_all*(1-$rebate);
//���Ŷ����ܶ��1000Ԫ���ۿ�

//���û��Ķ������ͻ���Ϣ��ӵ�requests����
$a=split(',',$province);
$province=$a[1];
$db2->query("insert into $requests_t
           values(null,$login_id,'$name',$sex,'$email','$province','$city','$tel',
               '$address','$post','$attrib',$price_all,$pay,0,0,'$date_tmp')");
$key_requests=$db2->insert_id();
//�õ��˴εĶ�����

$db->query("select id from $shopping_t where user_id=$login_id and requests_id=0");
 while($db->next_record())
  { 
    $id_shopping=$db->f('id');
    $db2->query("update $shopping_t set requests_id=$key_requests where id=$id_shopping");
  }
//�����ɵĶ����ţ�����shopping���е�ÿ����¼

$basket_items=0;
array_splice($basket_amount,0);  //ɾ�����ﳵ�����������Ԫ��
array_splice($basket_id,0);
unset($basket_amount);
unset($basket_id);
//�����ɶ����󣬰ѹ��ﳵ���������
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
                  <?php echo "�ϼƣ�<b><font color=red>��$price_all_format</font></b>";?>
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
                <td align="left" width="80%"><b><font color="#CC0000" class="p14">��ϲ�����Ķ����Ѿ���ɣ�</font></b></td>
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
          <td>�����������ջ���Ϣ��������Ϣ, ���������д����Ϣ��Ч, ���ǽ��޷��������Ķ���!</td>
        </tr>
        <tr> 
          <td> 
            <table cellspacing="0" cellpadding="2" width="100%" border="1" style="font-size:9pt" bordercolorlight="#D2D2D2" bordercolordark="#FFFFFF">
              <tr> 
                <td width="116" bgcolor="f5f5f5">��Ա��Ա</td>
                <td width="500" bgcolor="f5f5f5"> 
                  <?php echo $login_name; ?>
                </td>
              </tr>

              <tr bgcolor="f5f5f5"> 
                <td width="116">�ջ�������</td>
                <td width="500"> 
                  <?php echo  $name; if ($sex==1) echo "����"; else echo "Ůʿ"; ?>
                </td>
              </tr>
              <tr> 
                <td width="116">�ջ���ʡ��</td>
                <td width="500"> 
                  <?php echo  $province; ?>
                </td>
              </tr>
              <tr bgcolor="f5f5f5"> 
                <td width="116">�ջ��˳���</td>
                <td width="500"> 
                  <?php echo  $city; ?>
                </td>
              </tr>
              <tr> 
                <td width="116">�ջ���Email</td>
                <td width="500"> 
                  <?php echo  $email; ?>
                </td>
              </tr>
              <tr> 
                <td width="116" bgcolor="f5f5f5">�ջ��˵�ַ</td>
                <td width="500" bgcolor="f5f5f5"> 
                  <?php echo  $address; ?>
                </td>
              </tr>
              <tr> 
                <td width="116">��������</td>
                <td width="500"> 
                  <?php echo  $post; ?>
                </td>
              </tr>
              <tr> 
                <td width="116" bgcolor="f5f5f5">��ϵ�绰</td>
                <td width="500" bgcolor="f5f5f5"> 
                  <?php echo  $tel; ?>
                </td>
              </tr>
              <tr> 
                <td width="116" >�������</td>
                <td width="500" ><b><font  size="4" color="red"> 
                  <?php echo  $key_requests+$init_num; ?>
                  </font></b> (���ס���Ķ����ţ��Ա��Ժ��ѯ) </td>
              </tr>
              <tr> 
                <td width="116" bgcolor="f5f5f5" >�µ�ʱ��</td>
                <td width="500" bgcolor="f5f5f5" > 
                  <?php echo  $date_tmp; ?>
                </td>
              </tr>
              <tr> 
                <td width="116" >��������</td>
                <td width="500" > 
                  <?php echo  $attrib; ?>
                  &nbsp;</td>
              </tr>
              <tr> 
                <td width="116" bgcolor="f5f5f5" >Ӧ���ܶ�</td>
                <td width="500" bgcolor="f5f5f5" >Ӧ���<font color="red" size="4"> 
                  <?php echo  $price_all+$send_money; ?>
                  Ԫ</font>��=�����ܶ<font color="red" size="4"> 
                  <?php echo  $price_all; ?>
                  </font>)Ԫ+���ͷѣ�<font color="red" size="4"> 
                  <?php echo  $send_money; ?>
                  </font>Ԫ�� (˵��: ��λ-�����Ԫ. 
                  <?php
if ($price_sum >= 1000 and $flag) echo "�۸񳬹� 1000 Ԫ���ۿ�10%"; 
if (!$flag) echo "����ͬһ����Ʒ����10�����ۿ�20%";
?>
                  ) </td>
              </tr>
              <tr> 
                <td width="116" >�ͻ���ʽ</td>
                <td width="500" >EMS �ؿ�ר�� (˵��: �ڱ���˾�����κβ�Ʒ������EMS��ʽ����) </td>
              </tr>
              <tr> 
                <td width="116" >&nbsp;</td>
                <td width="500" >&nbsp;</td>
              </tr>
              <tr> 
                <td width="116" bgcolor="f5f5f5" valign="top" >���ʽ</td>
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
                <td width="500" bgcolor="f5f5f5" ><b>���Ķ�����Ϣ: </b></td>
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
                <td colspan="2" bgcolor="f5f5f5" align="center" ><b><font color="#cc0000">�뾡��֧�����Ļ���, 
                  �Ա����ǽ�ʱ��ʱ�������Ķ���!</font></b></td>
              </tr>
            </table>
          </td>
        </tr>
        <tr align="center"> 
          <td> 
<?php
# ����ֽ��� 
$boundary = uniqid("");
# ��������û��ָ���ļ���MIME���ͣ�
$mimeType =  "text/html";  
# �����ʼ�ͷ 
$headers =  "From: $siteemail
Content-type: $mimeType; boundary=\"$boundary\"";
# �������ǿ��Խ����ʼ�������

$sendbody="<html>
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=gb2312\">
<title>$sitename��������Ϣ</title>
</head>
<body>

<table align=\"center\" border=\"0\" cellPadding=\"0\" cellSpacing=\"0\" width=\"550\">
  <tbody>
    <tr vAlign=\"top\">
      <td><br>
      <a href=\"$siteurl\"><img border=\"0\" src=\"$siteurl/images/logo.gif\" width=\"144\" height=\"46\"></a><br>
        <br><font size=\"3\"><b>�𾴵Ŀͻ�$name</b>��</font><br><br>
        <span class=\"p12\">&nbsp;&nbsp;&nbsp;&nbsp;���ã���л������ $sitename ��Ʒ��<b>���ǻᾡ��Ϊ������</b><br>
        <br>
      &nbsp;&nbsp;&nbsp;&nbsp;�������ʲô�����Ҫ��ȡ���������뷢<a href=\"mailto:$siteemail\"><strong><font color=\"red\">�ʼ�</font></strong></a>����ע�������š�<br>
      &nbsp;&nbsp;&nbsp;&nbsp;���ڶ����Ĵ������������ʱ������$sitename<a href=\"$siteurl/dingdang.php\"><strong><font color=\"red\">������ѯ</font></strong></a>���鵽,�ָ�������Ϣ����:
 
      <br>
        <table cellspacing=0 cellpadding=2 width=590 border=1 style='font-size:9pt' bordercolorlight=#D2D2D2 bordercolordark=#FFFFFF >
          <tbody>
            <tr>
              <td bgcolor=\"#f5f5f5\" width=\"20%\">�ջ�������</td>
              <td bgcolor=\"#f5f5f5\" width=\"80%\"><b>$name</b></td>
            </tr>
            <tr>
              <td width=\"20%\">��ϵ�绰</td>
              <td width=\"80%\"><b>$tel</b></td>
            </tr>
            <tr>
              <td bgcolor=\"#f5f5f5\" width=\"20%\">�ʱ�</td>
              <td bgcolor=\"#f5f5f5\" width=\"80%\"><b>$post</b></td>
            </tr>
            <tr>
              <td width=\"20%\">�ͻ���ַ</td>
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
      <td colSpan=\"3\">������: ".($key_requests+$init_num)."</td>
    </tr>
    <tr>
      <td width=\"60%\">��Ʒ����</td>
      <td width=\"20%\">��Ʒ�۸�</td>
      <td width=\"20%\">��Ʒ����</td>
    </tr>
    
    
$sendtmp
    
    <tr align=\"right\" bgColor=\"#f5f5f5\">
      
    <td colSpan=\"3\"> �ܻ���:<font color=\"red\">��$price_all</font>Ԫ&nbsp;&nbsp;&nbsp;&nbsp;���ͷ�:<font color=\"red\">��$send_money</font>Ԫ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ӧ����:<font color=\"red\">��".($price_all+$send_money)."</font>Ԫ(�����)</td>
    </tr>
  </tbody>
</table>
<br>
 

<div align=\"center\"> <span class=\"p12\"> <br>
  ��ӭ���ٴε�<a href=\"$siteurl\"><font color=\"blue\">$sitename</font></a>�Ϲ���<br>
  <a href=\"$siteurl/service.php\"><b><font color=\"red\">������˵��</font><b></b></b></a><b><b><br>
  <b>�绰��$sitetel</b><br>      
  <b>E-mail:<a href=\"mailto:$siteemail\">$siteemail</a></b><br>      
  <a href=\"$siteurl\">$siteurl</a><br>      
  </b></b></span>      
</div>      

</body>
      
</html>      
";
@mail($email, $sitename."�ͻ���������--".($key_requests+$init_num)."_������Ϣ", $sendbody,$headers);  
?>
            <p>&nbsp;
			</p>
            <p> 
              <input class=stbtm name=�������� onClick="window.location.href='index.php';" type=button value=��������>
              ���� 
              <input class=stbtm name=��ӡ��ҳ onClick="window.print();" type=button value=��ӡ��ҳ>
              ���� 
              <input class=stbtm name=�رմ��� onClick="window.close();" type=button value=�رմ���>
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
