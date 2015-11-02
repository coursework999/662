<?php
require "conf/config.php";
?>

<head>
    <title><?php echo $sitename ?> back up database </title>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312">
    <link rel="stylesheet" href="conf/style.css" type="text/css">
</head>

<body>

<!--all admin's options -->
<!-- display after log in -->

<?php

if (session_is_registered("admin_name") && isset($admin_name))
{
    ?>
<table width="750" border="0" bgcolor="#eeeeee" align="center">
    <tr>
        <td align="right" style="line-height:150%"><a href="my_index.php" class="clink03">index</a>
            | <a href="my_admin.php" class="clink03">admin index</a>
            | <a href="admin_goods" class="clink03">goods management</a>
            <!-- admin_goods.php -->
            | <a href="admin_dingdan.php" class="clink03">order management</a>
            <!-- admin_dingdang.php -->
            | <a href="admin_user" class="clink03">user management</a>
            <!-- admin_user.php -->
            <BR>

            other functions：
            <a href="my_backup.php" title="backup database" class="clink03">backup database</a>
            | <a href="my_recovery.php" title="recovery database" target="_blank" class="clink03">recovery database</a>
            &nbsp;</td>
    </tr>
</table>

    <?php
}
?>

<!--select a sql file -->
select a sql file..

</body>