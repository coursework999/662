<?php
 session_start();
 if (session_is_registered("admin_name") && isset($admin_name))
   return ;
  else
  {
?>
<html>
<head>
<title><?php echo $sitename ?> -- 管理员</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
</head>
<body bgcolor="#FFFFFF" text="#000000">
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<div align="center">您还没有登录，请先 <a href="admin.php">[登录] </a> </div>
</body>
</html>
<?php
exit(); 
  }
?>