<?php
 session_start();
 if (session_is_registered("admin_name") && isset($admin_name))
   return ;
  else
  {
?>
<html>
<head>
<title><?php echo $sitename ?> -- ����Ա</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
</head>
<body bgcolor="#FFFFFF" text="#000000">
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<div align="center">����û�е�¼������ <a href="admin.php">[��¼] </a> </div>
</body>
</html>
<?php
exit(); 
  }
?>