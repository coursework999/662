<?php
require "conf/config.php";
session_start();
?>
<html>
<head>
<title><?php echo $sitename ?> -- ȡ������</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<?php echo $http_head; ?>
<link rel="stylesheet" href="conf/style.css" type="text/css">
</head>
<body bgcolor="#FFFFFF" text="#000000">
<?php include "conf/header.php" ?>
<table width="750" border="0" align="center" cellspacing="0" cellpadding="0">
  <tr align="center" bgcolor="#efefef"> 
    <td> 
      <p>&nbsp; </p>
      <p> 
        <?php
if ($u_name)
{
$db->query("select u_pass,email from $user_t where u_name='$u_name'");
$db->next_record();
if ($db->num_rows())
{
$password=$db->f('u_pass');
$to=$db->f('email');
$date=date('Y��m��d�� H:i:s');

$body="�װ��� $u_name �����ã�

  ����������  $sitename($siteurl) ��վ��ע���û���������:
     
  �û�����$u_name

  ��  ��: $password

  ���������¼�޸��������롣
                    
                               $date
"; 
mail($to,"$sitename--�����û�����",$body,"From:$siteemail"); 
echo "<img src=\"images/lpassword.gif\">";
}
else
echo "<img src=\"images/lsorry.gif\">";
echo "<br><br>";
echo "<input type=\"button\" value=\"������ҳ\" onClick=\"JavaScript:window.location.href='index.php'\" class=\"stbtm\"  name=\"button3\">";
}
else
{
?>
        <script language=javascript>
function chk()
{
if(document.form10.u_name.value=="")
{
   window.alert("����д�����û���!");
   document.form10.u_name.focus();
   return false; 
}
}   
</script>
      </p>
      <form name="form10" method="post" onSubmit="return chk();">
        <p><img src="images/lsent.gif" width="459" height="30"></p>
        <p> 
          <input type="text" name="u_name"  class=think>
          <input type="submit" name="Submit" value="�ύ"  class="stbtm">
        </p>
      </form>
      <?php } ?>
      <p>&nbsp;</p>
      <p>&nbsp; </p>
      <p>&nbsp;</p></td>
  </tr>
</table>
<br>
<?php include "conf/footer.php"; ?>
</body>
</html>