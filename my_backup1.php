<?php
require "conf/config.php";
?>

<head>
    <title><?php echo $sitename ?> back up database </title>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312">
    <link rel="stylesheet" href="conf/style.css" type="text/css">
</head>

<body>

<!-- admin's functions -->
<table width="750" border="0" bgcolor="#eeeeee" align="center">
    <tr>
        <td align="right" style="line-height:150%"><a href="my_index.php" class="clink03">index</a>
            | <a href="my_admin.php" class="clink03">admin index</a>
            | <a href="#" class="clink03">goods management</a>
            <!-- admin_goods.php -->
            | <a href="#" class="clink03">order management</a>
            <!-- admin_dingdang.php -->
            | <a href="#" class="clink03">user management</a>
            <!-- admin_user.php -->
            <BR>

            other functions：
            <a href="my_backup.php" title="back up database" class="clink03">backup database</a>
            | <a href="#" title="recovery database" target="_blank" class="clink03">recovery database</a>
            &nbsp;</td>
    </tr>
</table>

<?php
//require("bak/global.php");



?>


<p>you can backup your database here.</p>

<!-- 1. select tables -->
<P><b>tables :</b></p>
<form method = "post" action = #>
<?php
    //a table with names ...
//while ($currow = $DB_site->fetch_array($result)) {
//    makeyesnocode($currow[0], "table[$currow[0]]", 1);
//}

?>

    b2c_goods <input type="radio" checked="checked" name="tablename" value="select" /> select
    <input type="radio"  name="tablename" value="igonre" /> ignore

<!--2. select path -->
<p><b>path :</b></p>
enter the path: <input type = "text" name = "path" value = "bak/ <?php echo date('m-d-Y', time()); ?>.sql" />

<input type = "submit" value = "submit" />


</form>

</body>