<?php
 session_start();
 if (session_is_registered("admin_name") && isset($admin_name))
   return ;
  else
  {
?>
<html>
<head>
<title><?php echo $sitename ?> -- Administrator</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
</head>
<body bgcolor="#FFFFFF" text="#000000">
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<div align="center">Unlogged，Please <a href="my_admin.php">[login] </a> first!</div>
</body>
</html>
<?php
exit(); 
  }
?>