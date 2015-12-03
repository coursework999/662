<?php
require "conf/config.php";
session_start();
?>
<html>
<head>
<title><?php echo $sitename ?> -- Get password back</title>
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
$date=date('m/d/Y H:i:s');

$body="Dear $u_name ，hello：

  This is the username and password you registed in $sitename($siteurl):
     
  username：$u_name

  password: $password

  Please modify your password as soon as possible.
                    
                               $date
"; 
mail($to,"$sitename--Your username and password",$body,"From:$siteemail");
echo "Password has sent to your registered email, please check it soon!";
}
else
echo "Sorry, Username does not exist!";
echo "<br><br>";
echo "<input type=\"button\" value=\"Homepage\" onClick=\"JavaScript:window.location.href='my_index.php'\" class=\"stbtm\"  name=\"button3\">";
}
else
{
?>
        <script language=javascript>
function chk()
{
if(document.form10.u_name.value=="")
{
   window.alert("Please input your username!");
   document.form10.u_name.focus();
   return false; 
}
}   
</script>
      </p>
      <form name="form10" method="post" onSubmit="return chk();">
    <p>Please input you username, we will sent your password to your email</p>
        <p> 
          <input type="text" name="u_name"  class=think>
          <input type="submit" name="Submit" value="Submit"  class="stbtm">
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
