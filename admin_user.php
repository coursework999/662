<?php
require "conf/config.php";
include "admin_check.php";
  
if ($Submit)
{
   $aryid=@implode(",",$delete);
   $db2->query("delete from $user_t where id in($aryid)");
   $result="ɾ���û��ɹ���";
}
if ($action=="active")
  $db->query("update $user_t set action='$f' where id=$id");
?>
<html>
<head>
<title><?php echo $sitename ?> -- ��Ա����</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<?php echo $http_head; ?>
<link rel="stylesheet" href="conf/style.css" type="text/css">
</head>
<body bgcolor="#FFFFFF" text="#000000">
<?php include "conf/admin.php"; ?>
<table width="750" border="0" align="center">
  <tr bgcolor="#EFEFEF"> 
    <td class="p13" align="center" height="26">��Ա����
      <script language="JavaScript">
function open_win(htmlurl) {
  var newwin=window.open(htmlurl,"<?php echo $sitename ?>","toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=400,height=450");
  return false;
}
</script>
    </td>
  </tr>
  <form name="form1" method="post">
    <tr bgcolor="#EFEFEF"> 
      <td align="center" bgcolor="#EFEFEF"> ���û��˺Ż���ʵ������ѯ: 
        <input type="text" name="key" size="15" class="think" >
        <input type="submit" name="submit1" value=":�� ѯ:" class="stbtm2">
      </td>
    </tr>
  </form>
  <tr bgcolor="#EFEFEF"> 
    <form name="form2" method="post">
      <td height="16" align="center"> ��ע��ʱ��β�ѯ: 
        <input type="text" name="date1" maxlength="10" size="12" class="think" value="<?php echo ($date1) ? $date1 : date('Y-m-d') ?>">
        - 
        <input type="text" name="date2" maxlength="10" size="12" class="think" value="<?php echo ($date2) ? $date2 : date('Y-m-d') ?>">
        <input type="submit" name="submit2" value=":�� ѯ:" class="stbtm2">
      </td>
    </form>
  </tr>
  <tr bgcolor="#EFEFEF">
    <td height="16" align="center"> 
      <?php echo $result;
 if ($key)
     $tmp="where u_name like '%$key%' or name like '%$key%'";
  if ($date1 && $date2) 
     $tmp="where reg_date between '$date1' and '$date2'";
  if (!$page) $page=1;
  $db->query("select null from $user_t $tmp");
  $total_num=$db->num_rows();//�õ��ܼ�¼��
  $totalpage=ceil($total_num/$num_to_show);//�õ���ҳ��
  $init_record=($page-1)*$num_to_show;
  $db->query("select *
   from $user_t $tmp
   order by id DESC limit $init_record, $num_to_show");        
?>
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
              <input type="submit" name="Submit223" value="GO">
            </td>
          </tr>
        </form>
      </table>
      <form name="form_sele" method="post" action="">      
        <table width="100%" border="0" cellspacing="1" cellpadding="1" bgcolor="#3196B3" align="CENTER">
          <tr bgcolor="#D3E3FE"> 
            <td colspan="13" align="center"> 
              <input type="checkbox" name="deleteall" value="on" onClick="CheckAll(this.form,this.checked)"   >
              <font color="#CC3366">ȫѡ </font> �� 
              <input type="submit" name="Submit" value="ɾ��" onClick="if(!confirm('ȷ��Ҫɾ����Щ��')) return false;" class="stbtm2">
            </td>
          </tr>
          <tr> 
            <td bgcolor="#FFFFFF" align="center" width="8%"><font color="#cc0000"> 
              �û�</font></td>
            <td bgcolor="#FFFFFF" align="center" width="4%"><font color="#cc0000">����</font></td>
            <td bgcolor="#FFFFFF" align="center" width="6%"><font color="#cc0000">����</font></td>
            <td bgcolor="#FFFFFF" align="center" width="14%"><font color="#cc0000"> 
              ����</font></td>
            <td bgcolor="#FFFFFF" align="center" width="6%"><font color="#cc0000">��ʵ����</font></td>
            <td bgcolor="#FFFFFF" align="center" width="3%"><font color="#cc0000">�Ա�</font></td>
            <td bgcolor="#FFFFFF" align="center" width="5%"><font color="#cc0000">����</font></td>
            <td bgcolor="#FFFFFF" align="center" width="8%"><font color="#cc0000">ע��ʱ��</font></td>
            <td bgcolor="#FFFFFF" align="center" width="8%"><font color="#cc0000">����¼</font></td>
            <td bgcolor="#FFFFFF" align="center" width="6%"><font color="#cc0000">��¼����</font></td>
            <td bgcolor="#FFFFFF" align="center" width="10%"><font color="#cc0000">�������</font></td>
            <td width="4%" align="center" bgcolor="#FFFFFF" bordercolor="#FFFFFF" class="black">�޸�</td>
            <td width="5%" align="center" bgcolor="#FFFFFF" bordercolor="#FFFFFF" class="black">ɾ��</td>
          </tr>
          <?php
 while($db->next_record())
  {
?>
          <tr> 
            <td bgcolor="#FFFFFF" width="8%"> <a href="admin_user_list.php?id=<?php echo $db->f('id') ?>" class='clink03' target="_blank"> 
              <?php echo $db->f('u_name') ?>
              </a> </td>
            <td bgcolor="#FFFFFF" align="center" width="4%"> 
              <?php echo "<a href=\"admin_user_dingdang.php?user_id=".$db->f('id')."\" class='clink03' target=\"_blank\">����"."</a>"; ?>
            </td>
            <td bgcolor="#FFFFFF" width="6%"> 
              <?php echo $db->f('u_pass'); ?>
            </td>
            <td bgcolor="#FFFFFF" width="14%"> 
              <?php echo "<a href='mailto:".$db->f('email')."' class='clink03'>".$db->f('email')."</a>"; ?>
            </td>
            <td bgcolor="#FFFFFF" width="6%"> 
              <?php echo $db->f('name'); ?>
            </td>
            <td bgcolor="#FFFFFF" align="center" width="3%"> 
              <?php if ($db->f('sex')==1) echo "��"; else echo "Ů"; ?>
            </td>
            <td bgcolor="#FFFFFF" align="center" width="5%"> 
              <?php echo $db->f('city'); ?>
            </td>
            <td bgcolor="#FFFFFF" width="8%" align="center"> 
              <?php echo $db->f('reg_date'); ?>
            </td>
            <td bgcolor="#FFFFFF" width="8%" align="center"> 
              <?php echo substr($db->f('last_date'),0,10); ?>
            </td>
            <td bgcolor="#FFFFFF" width="6%" align="center"> 
              <?php echo $db->f('times');?>
            </td>
            <td bgcolor="#FFFFFF" align="center" width="10%"> 
              <?php
if ($db->f('action')=='y')
  echo "<font color=\"blue\">������</font>/<a href='admin_user.php?action=active&id=".$db->f('id')."&f=n' onclick='return open_win(\"admin_user_zt.php?id=".$db->f('id')."&f=n\");' class='clink03'>ʧЧ</a>";
else
  echo "<font color=\"red\">��ʧЧ</font>/<a href='admin_user.php?action=active&id=".$db->f('id')."&f=y' onclick='return open_win(\"admin_user_zt.php?id=".$db->f('id')."&f=y\");' class='clink03'>����</a>";
?>
            </td>
            <td bgcolor="#FFFFFF" align="center" width="4%"> 
              <?php 
    $link_order = "action=update&id=".$db->f('id');
    echo "<a href=\"admin_user_work.php?$link_order\">";
    echo '<img src="images/xg.gif" alt="�� ��" border="0"></a>';
    ?>
            </td>
            <td bgcolor="#FFFFFF" align="center" width="5%"> 
              <input type="checkbox" name="delete[]" value="<?php echo $db->f('id') ?>">
            </td>
          </tr>
		  <?php } ?>
          <tr bgcolor="#D3E3FE" align="center"> 
            <td colspan="13"> 
              <input type="checkbox" name="deleteall" value="on" onClick="CheckAll(this.form,this.checked)"   >
              <font color="#CC3366">ȫѡ </font> �� 
              <input type="submit" name="Submit" value="ɾ��" onClick="if(!confirm('ȷ��Ҫɾ����Щ��')) return false;" class="stbtm2">
            </td>
          </tr>          
        </table>
	  </form>
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
              <input type="submit" name="Submit2222" value="GO">
            </td>
          </tr>
        </form>
      </table>
    </td>
  </tr>
</table>
<br>
<div align="center"></div>
<div align="center"></div>
<p>
  <?php include "conf/footer.php"; ?>
</p>
</body>
</html>
