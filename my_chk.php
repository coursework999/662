<?php
session_start();
if (session_is_registered("login_id") && session_is_registered("login_name") && isset($login_id))
    return ;
else
{
    ?>
<html>
<head>
    <title><?php echo $sitename ?> -- check login</title>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312">
    <?php echo $http_head; ?>
    <link rel="stylesheet" href="conf/style.css" type="text/css">
</head>


<body bgcolor="#FFFFFF" text="#000000">
<table width="750" border="0" align="center" cellspacing="0" cellpadding="0">
    <tr align="center" bgcolor="#efefef">
        <td>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>you have not login <a href="my_login.php?url=<?php echo $PHP_SELF ?>" class="title">[login]</a></p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
        </td>
    </tr>
</table>
<br>

</body>
</html>
<?php
}
exit();
?>
