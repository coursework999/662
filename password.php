<?php
require "conf/config.php";
session_start();
?>
<html>
<head>
<title><?php echo $sitename ?> -- 取回密码</title>
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
$date=date('Y年m月d日 H:i:s');

$body="亲爱的 $u_name ，您好：

  以下是您在  $sitename($siteurl) 网站的注册用户名和密码:
     
  用户名：$u_name

  密  码: $password

  请您尽快登录修改您的密码。
                    
                               $date
"; 
mail($to,"$sitename--您的用户密码",$body,"From:$siteemail"); 
echo "<img src=\"images/lpassword.gif\">";
}
else
echo "<img src=\"images/lsorry.gif\">";
echo "<br><br>";
echo "<input type=\"button\" value=\"返回首页\" onClick=\"JavaScript:window.location.href='index.php'\" class=\"stbtm\"  name=\"button3\">";
}
else
{
?>
        <script language=javascript>
function chk()
{
if(document.form10.u_name.value=="")
{
   window.alert("请填写您的用户名!");
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
          <input type="submit" name="Submit" value="提交"  class="stbtm">
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
