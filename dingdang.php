<?php
require "conf/config.php";
include "chk.php";
if ($action=="del")
{
  $id=$id-$init_num;
  //ɾ���û�������Ķ���
  $db->query("delete from $requests_t 
      where id=$id and user_id=$login_id and UNIX_TIMESTAMP(NOW())-UNIX_TIMESTAMP(date_created)<$del_delay");
  //ɾ���û�shopping�����Ʒid
  $db->query("delete from $shopping_t 
      where requests_id=$id and user_id=$login_id and UNIX_TIMESTAMP(NOW())-UNIX_TIMESTAMP(date_created)<$del_delay");
}
?>
<html>
<head>
<title><?php echo $sitename ?> -- ������ѯ</title>
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
   $title.="����";
   else if ($db->f('age')<30)
   $title.="С��";
   else
   $title.="Ůʿ";

  if (!$page) $page=1;
  $db->query("select null from $requests_t where user_id=$login_id"); //�Ӷ������в���û��Ķ���
  $total_num=$db->num_rows();//�õ��ܼ�¼��
  $totalpage=ceil($total_num/$num_to_show);//�õ���ҳ��
  $init_record=($page-1)*$num_to_show;
  $db->query("select *,UNIX_TIMESTAMP(NOW())-UNIX_TIMESTAMP(date_created) as mytime from $requests_t where user_id=$login_id
     order by id DESC limit $init_record, $num_to_show");        
 ?>
      <br>
      <table width="96%" border="0" cellspacing="0" bgcolor="#ffffff">
        <tr> 
          <td height="17"><b><font color="#cc0000">
            <?php echo $title; ?>
            �Ķ���</font>&nbsp;&nbsp;
            <?php if (!$total_num) echo "����ʱû�ж���!";?>
            </b></td>
        </tr>
      </table>
      <br>
      <table width="99%" border="0" cellspacing="0" align="center" >
        <tr> 
          <td> 
            <div width="20"><b>���������б�</b> </div>
          </td>
        </tr>
      </table>
      <table width="96%" border="0" cellspacing="1" cellpadding="1">
        <form action="<?php echo $PHP_SELF."?key=$key" ?> " method="post" name="form8" onSubmit="return check_page('form8.page')">
          <tr> 
            <td align="right"> �ܼ�: 
              <?php echo $total_num." �Ŷ��� ";
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
              <input type="text" name="page" size="2" class="think">
              <input type="submit" name="Submit22" value="GO" class="think">
            </td>
          </tr>
        </form>
      </table>
      <table width="98%" border="1" cellspacing="0" align=center>
        <tr> 
          <td align=center><font color="#cc0000">�������</font></td>
          <td align=center><font color="#cc0000">���ʽ</font></td>
          <td align=center><font color="#cc0000">�µ�ʱ��</font></td>
          <td align=center><font color="#cc0000">�Ƿ��ѷ���</font></td>
          <td align=center><font color="#cc0000">�Ƿ񼺸���</font></td>
          <td align=center><font color="#cc0000">�������</font></td>
          <td align=center><font color="#cc0000">���ӷ�</font></td>
          <td align=center><font color="#cc0000">Ӧ����</font></td>
          <td align=center><font color="#cc0000">��ϸ��Ϣ</font></td>
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
            <?php if ($db->f('send_out')) echo "������"; else echo "<font color=\"#cc0000\">δ����</font>"; ?>
          </td>
          <td align=center>
            <?php if ($db->f('payment')) echo "������"; else echo "<font color=\"#cc0000\">δ����</font>"; ?>
          </td>
          <td align=center>
            <?php echo $db->f('fee'); ?>Ԫ</td>
          <td align=center>
            <?php echo  $send_money; ?>Ԫ</td>
          <td align=center>
            <?php echo $db->f('fee')+$send_money; ?>Ԫ</td>
          <td align=center> 
            <input type="button" name="Button" value="�鿴" class="think" <?php echo "onclick=\"javaScript:window.open('dingdang_disp.php?id=".($db->f('id')+$init_num)."','orderform')\"" ?>>
            <input type="button" name="Button2" value="ɾ��" class="think" <?php echo "onclick=\"javaScript:if (confirm('ȷ��Ҫɾ����?')) window.location.href='$PHP_SELF?action=del&id=".($db->f('id')+$init_num)."'\""; if ($db->f('mytime')>$del_delay) echo "disabled"; ?>>
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
