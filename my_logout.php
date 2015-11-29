<?php
require "conf/config.php";
include "chk.php";
?>
<html>
<head>
<title><?php echo $sitename ?> -- Logout</title>
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
if ($submit)
{
 $basket_items=0;
 session_destroy();
 echo '<meta http-equiv="refresh" content="2;URL=my_index.php"><br><br><br>You have exit system successfully, going back to homepage......';
 echo  "<br><br><input class=stbtm onClick=\"window.location.href='my_index.php';\" type=button value='return homepage'>";
 echo "<br><br><br>";
}
else
{
?>
      <table align=center border=0 cellspacing=0 width=300>
        <tbody> 
        <tr> 
          <td height=40 align="center" class="p13"> Logout System</td>
        </tr>
        <tr align="center"> 
          <td>&nbsp;</td>
        </tr>
        <tr align="center"> 
          <td><font color="#cc0000"> 
            <?php echo $login_name; ?>
            </font>User，are you sure to logout?</td>
        </tr>
        <tr align="center"> 
          <td>&nbsp;</td>
        </tr>
        <tr align="center"> 
          <td> 
            <form action=<?php echo $PHP_SELF ?> method=post name=login>
              <input class=stbtm name=submit type=submit value=logout>
              <input class=stbtm name=Submit2 onClick="JavaScript:history.back();" type=button value=back>
            </form>
          </td>
        </tr>
        <tr> 
          <td height=10></td>
        </tr>
        <tr> 
          <td> </td>
        </tr>
        </tbody> 
      </table>
      <?php } ?>
    </td>
  </tr>
</table>
<br>
<?php include "conf/footer.php"; ?>
</body>
</html>
