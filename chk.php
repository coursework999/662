<?php
 session_start();
 if (session_is_registered("login_id") && session_is_registered("login_name") && isset($login_id))
   return ;
  else
  {
?>
<html>
<head>
<title><?php echo $sitename ?> -- 用户登录</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<?php echo $http_head; ?>
<link rel="stylesheet" href="conf/style.css" type="text/css">
</head>
<body bgcolor="#FFFFFF" text="#000000">
<?php include "conf/header.php" ?>
<table width="750" border="0" align="center" cellspacing="0" cellpadding="0">
  <tr align="center" bgcolor="#efefef"> 
    <td> 
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>您还没有登录，请先 <a href="login.php?url=<?php echo $PHP_SELF ?>" class="title">[登录]</a></p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      </td>
  </tr>
</table>
<br>
<?php include "conf/footer.php"; ?>
</body>
</html>
<?php
 }
 exit(); 
?>
