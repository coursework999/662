<?php
require "conf/config.php";
include "admin_check.php";
if ($action=="del")
{
  //ɾ���û�������Ķ���
  $db->query("delete from $requests_t where id=($id-$init_num)");
  //ɾ���û�shopping�����Ʒid
  $db->query("delete from $shopping_t where requests_id=($id-$init_num)");
  }
if ($do=="update")
{
  $db->query("update $requests_t set $action=$value where id=($id-$init_num)");
//���û����ʼ�֪ͨ�û�
  if ($action=="send_out" && $value==1)
  {
  //�Ӷ�����$requests_t��ȡ���û���һЩ��Ϣ
$db->query("select name,email,tel,post,address,fee  from $requests_t where id=($id-$init_num)");
$db->next_record();
$email=$db->f('email');
$name=$db->f('name');
$tel=$db->f('tel');
$post=$db->f('post');
$address=$db->f('address');
$price_all=$db->f('fee');

//�Ӷ�����ϸ����ȡ����������ϸ��Ϣ
$sendtmp="";
$db->query("select goods_id,goods_num from $shopping_t where requests_id=($id-$init_num)");
while($db->next_record())
{
//�Ӳ�Ʒ����ȡ����Ʒ����Ӧ�����ƺͼ۸�
$db2->query("select name,price from $goods_t where id=".$db->f('goods_id'));
$db2->next_record();

$sendtmp.="<tr >
      <td width=\"60%\"><b>".stripslashes($db2->f('name'))."</b></td>
      <td width=\"20%\"><font color=\"red\">".$db2->f('price')."</font>Ԫ</td>
      <td width=\"20%\">".$db->f('goods_num')."</td>
    </tr>\n";
}

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
        <span class=\"p12\">&nbsp;&nbsp;&nbsp;&nbsp;���ã���л������ $sitename ��Ʒ��<b>������Ĳ�Ʒ�Ѿ���������ע����գ�</b><br>
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
      <td colSpan=\"3\">������: ".$id."</td>
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
@mail($email, $sitename."�ͻ���������--����:".$id."_�Ѿ�����", $sendbody,$headers);  

  }
}
?>
<html>
<head>
<title><?php echo $sitename ?> -- ��������</title>
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
        ��������</p>
      <table width="96%" border="0" cellspacing="0" bgcolor="#ffffff">
        <form name="form1" method="post" action="<?php echo $PHP_SELF ?>" >
          <tr> 
            <td> �������š�������ѯ: 
              <input type="text" name="key" size="15" class="think" >
              <input type="hidden" name="search" value="1">
              <input type="submit" name="submit1" value=":�� ѯ:" class="stbtm2">
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

  $db->query("select null from $requests_t $tmp"); //�Ӷ������в���û��Ķ���
  $total_num=$db->num_rows();//�õ��ܼ�¼��
  $totalpage=ceil($total_num/$num_to_show);//�õ���ҳ��
  $init_record=($page-1)*$num_to_show;
  $db->query("select * from $requests_t $tmp
     order by id DESC limit $init_record, $num_to_show");        
 ?>
      <table width="99%" border="0" cellspacing="0" align="center" >
        <tr> 
          <td width="69%"> <b>���������б�</b> (ָ�Ѿ��������Ѿ��������ֻ��һ�������ɹ���ʱ���� <font color="#FF0000"> 
            <?php echo $dingdang_days ?>
            </font> ����)</td>
          <td width="31%" align="right"><a href="admin_dingdang.php"><font color="blue">������Ķ���</font></a> 
            <a href="fail_admin_dingdang.php?action=all" onClick="return confirm('ȷ��Ҫɾ�����е���Ч������?')"><font color="blue"></font></a><a href="admin_succeed_dingdang.php"><font color="blue">�ɹ��Ķ���</font></a> 
            <a href="admin_fail_dingdang.php"><font color="blue">��Ч�Ķ���</font></a></td>
        </tr>
        <tr> 
          <td colspan="2" align="center" height="25"><font color="#CC0000">������&quot;</font><font color="#cc0000">��������</font><font color="#CC0000">&quot;�е�&quot;������&quot;ʱ����������û���һ���ʼ���˵���û��Ļ����Ѿ�������</font></td>
        </tr>
      </table>
      <table width="96%" border="0" cellspacing="1" cellpadding="1">
        <form action="<?php echo $PHP_SELF."?key=$key" ?> " method="post" name="form8" onSubmit="return check_page('form8.page')">
          <tr> 
            <td align="right"> �ܼ�: 
              <?php echo $total_num." ";
  $page1=$page-1;
  $page2=$page+1;
  if ($page1 < 1) echo "<FONT color=#999999>��  ҳ&nbsp;��һҳ</FONT>&nbsp;"; 
  else echo "<a href='$PHP_SELF?page=1&key=$key'>��  ҳ</a>&nbsp;<a href='$PHP_SELF?page=$page1&key=$key'>��һҳ</a>&nbsp;"; 
  if ($page2 > $totalpage) echo "<FONT color=#999999>��һҳ&nbsp;β  ҳ</FONT>&nbsp;"; 
  else echo "<a href='$PHP_SELF?page=$page2&key=$key'>��һҳ</a>&nbsp;<a href='$PHP_SELF?page=$totalpage&key=$key'>β  ҳ</a>&nbsp;"; 
?>
              ��ǰҳ:<b> 
              <?php echo $page."/".$totalpage ?>
              </b>&nbsp; 
              <script language="JavaScript">
function check_page(name)
{
 eval("page="+name+".value");
 if (isNaN(page) || page <=0 || page > <?php echo $totalpage ?>)
  {
    alert ("����ȷ����ҳ�������ֵΪ <?php echo $totalpage ?> ��");
    eval(name+".select()");
	return false;
  }
}
</script>
              ת���� 
              <input type="text" name="page" size="2">
              <input type="submit" name="Submit22" value="GO">
            </td>
          </tr>
        </form>
      </table>
      <table width="98%" border="1" cellspacing="0" align=center>
        <tr> 
          <td align=center><font color="#cc0000">�������</font></td>
          <td align=center><font color="#cc0000">������Ա</font></td>
          <td align=center><font color="#cc0000">���ʽ</font></td>
          <td align=center><font color="#cc0000">�µ�ʱ��</font></td>
          <td align=center><font color="#cc0000">�Ƿ񷢻�</font></td>
          <td align=center><font color="#cc0000">�Ƿ񸶿�</font></td>
          <td align=center><font color="#cc0000">Ӧ����</font></td>
          <td align=center><font color="#cc0000">��������</font></td>
          <td align=center><font color="#cc0000">�������</font></td>
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
            <?php if ($db->f('send_out')) echo "������"; else echo "<font color=\"#cc0000\">δ����</font>"; ?>
            </td>
          <td align=center> 
            <?php if ($db->f('payment')) echo "������"; else echo "<font color=\"#cc0000\">δ����</font>"; ?>
          </td>
          <td align=center> 
            <?php echo $db->f('fee')+$send_money; ?>
            Ԫ</td>
          <td align=center> 
            <?php
			if ($db->f('send_out'))
			 echo "<a href='$PHP_SELF?do=update&action=send_out&value=0&id=".($db->f('id')+$init_num)."' onClick=\"return confirm('ȷ����������δ������?')\" class='clink03'>"."δ����</a>";
            else
			 echo "<a href='$PHP_SELF?do=update&action=send_out&value=1&id=".($db->f('id')+$init_num)."' onClick=\"return confirm('ȷ�����������ѷ�����?')\" class='clink03'>"."������</a>";
			 ?>
          </td>
          <td align=center> 
            <?php
			if ($db->f('payment'))
              echo "<a href='$PHP_SELF?do=update&action=payment&value=0&id=".($db->f('id')+$init_num)."' onClick=\"return confirm('ȷ����������δ������?')\" class='clink03'>"."δ����</a>";
		   else
			  echo "<a href='$PHP_SELF?do=update&action=payment&value=1&id=".($db->f('id')+$init_num)."' onClick=\"return confirm('ȷ�����������Ѹ�����?')\" class='clink03'>"."������</a>";
			?>
          </td>
          <td align=center> 
            <input type="button" name="Button2" value="ɾ��" class="think" <?php echo "onclick=\"javaScript:if (confirm('ȷ��Ҫɾ����?')) window.location.href='$PHP_SELF?action=del&id=".($db->f('id')+$init_num)."'\""; ?>>
          </td>
        </tr>
        <?php } ?>
      </table>
      <table width="96%" border="0" cellspacing="1" cellpadding="1">
        <form action="<?php echo $PHP_SELF."?key=$key" ?> " method="post" name="form88" onSubmit="return check_page('form88.page')">
          <tr> 
            <td align="right"> �ܼ�: 
              <?php echo $total_num." ";
  $page1=$page-1;
  $page2=$page+1;
  if ($page1 < 1) echo "<FONT color=#999999>��  ҳ&nbsp;��һҳ</FONT>&nbsp;"; 
  else echo "<a href='$PHP_SELF?page=1&key=$key'>��  ҳ</a>&nbsp;<a href='$PHP_SELF?page=$page1&key=$key'>��һҳ</a>&nbsp;"; 
  if ($page2 > $totalpage) echo "<FONT color=#999999>��һҳ&nbsp;β  ҳ</FONT>&nbsp;"; 
  else echo "<a href='$PHP_SELF?page=$page2&key=$key'>��һҳ</a>&nbsp;<a href='$PHP_SELF?page=$totalpage&key=$key'>β  ҳ</a>&nbsp;"; 
?>
              ��ǰҳ:<b> 
              <?php echo $page."/".$totalpage ?>
              </b>&nbsp; ת���� 
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
