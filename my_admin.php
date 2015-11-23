<?php
require "conf/config.php";
?>

<head>
    <title><?php echo $sitename ?> admin's homepage </title>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312">
    <?php echo $http_head; ?>
    <link rel="stylesheet" href="conf/style.css" type="text/css">
</head>

<body bgcolor="#FFFFFF"
      text="#000000" <?php if (!isset($admin_name)) echo 'onload="document.login.a_xmxm.focus();"'; ?> >




<!--this page have several states -->
<!-- already login -->
<!-- logout (temporary)-->
<!-- submit (temporary)-->
<!-- wait to input username & password -->

<?php
if ($submit)
if ($a_xmxm == $ad_name && $a_pass == $ad_pass) {
session_register('admin_name');
$admin_name = $a_xmxm;
}
?>

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
            | <a href="my_admin_goods" class="clink03">goods management</a>
            <!-- admin_goods.php -->
            | <a href="my_admin_order.php" class="clink03">order management</a>
            <!-- admin_dingdang.php -->
            | <a href="my_admin_user" class="clink03">user management</a>
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



<table width="750" align="center">
<tr align="center">
<td bgcolor="#EFEFEF" class="p13">
<p><br>
    Admin's home page<br>
</p>
<table align=center border=0 cellspacing=0 width=510>
    <tbody>
    <tr>
        <td height=30 align="center"><img height=35 src="images/denlu1.gif"
                                          width=170></td>
    </tr>
    <tr>
    <td height="38" align="center" class="p13">

    <?php

    //logout
    if ($logout) {
        session_destroy();
        echo "<br>you have logged out successfully!";
        echo '<meta http-equiv="refresh" content="2;URL=my_index.php">back to index';
    }



    if (session_is_registered("admin_name") && isset($admin_name))
        echo "<br>status  : <font color=blue>$admin_name </font>, logged in...&nbsp;&nbsp;  <input class=stbtm2 name=button2 type=button onClick=\"JavaScript:if (confirm('quit ?')) window.location.href='my_admin.php?logout=1'\" value=\"quit\">";
    else
        echo "<br>status  :  unlogged...";

    //submit
    if ($submit)
        if (session_is_registered("admin_name") && isset($admin_name))
            echo "";
        else
            echo "<br>username or password is incorrect. Please enter again!  <a href='my_admin.php'><font color=blue>[login]</a>";

    //wait for inputing uname & pwd
    else {
        ?>

        <!-- admin login page -->
        username or password is incorrect.
        </tr>
        <tr>
            <td align="center">

                <?php
                if (!(session_is_registered("admin_name") && isset($admin_name))) {
                    ?>
                    <form method=post name=login>
                        <table align=center border=0 cellpadding=2 cellspacing=5 width="260">
                            <tbody>
                            <tr>
                                <td width="35%" align="right"> username<b>：</b></td>
                                <td width="65%">
                                    <input class=think name=a_xmxm size=15>
                                </td>
                            </tr>
                            <tr>
                                <td width="35%" align="right"> password<b>：</b></td>
                                <td width="65%">
                                    <input class=think name=a_pass size=15
                                           type=password>
                                </td>
                            </tr>
                            <tr align="center">
                                <td colspan=2 height=27 width="65%">
                                    <input class=stbtm name=submit type=submit value="login">
                                    <input class=stbtm name=reset type=reset value="clean">
                                    <input class=stbtm name=button type=button
                                           onClick="JavaScript:if (confirm('quit ?')) window.location.href='my_admin.php?logout=1'"
                                           value="quit">
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </form><?php } ?>
            </td>

        </tr><?php } ?>

    </tbody>
</table>


<!-- outline table -->

<?php
//if (session_is_registered("admin_name") && isset($admin_name)) {
//    ?>
<!---->
<!--<br>-->
<!--    --><?php
//    //TODO: this is the table
//    ?>
<!---->
<!--<table width="500" border="0" cellpadding="2" cellspacing="1" bgcolor="#7777777">-->
<!--    <tr>-->
<!--        <td colspan="5" height="26" align="center"><b><font color="#FFFFFF">网站统计</font></b></td>-->
<!--    </tr>-->
<!--    <tr>-->
<!--        <td bgcolor="#dddddd" width="25%" align="right">商品类别总数</td>-->
<!--        <td bgcolor="#eeeeee" width="20%">-->
<!--            --><?php
//            $db->query("select count(*) as total from $class_t");
//            $db->next_record();
//            echo $db->f('total');
//            ?>
<!--        </td>-->
<!--        <td bgcolor="#FFFFFF">&nbsp;</td>-->
<!--        <td bgcolor="#dddddd" width="25%" align="center" class="p13">订单统计</td>-->
<!--        <td bgcolor="#eeeeee" width="20%">&nbsp;</td>-->
<!--    </tr>-->
<!--    <tr>-->
<!--        <td height="20" bgcolor="#dddddd" width="25%" align="right">商品个数</td>-->
<!--        <td height="20" bgcolor="#eeeeee" width="20%">-->
<!--            --><?php
//            $db->query("select count(*) as total from $goods_t");
//            $db->next_record();
//            echo $db->f('total');
//            ?>
<!--        </td>-->
<!--        <td height="20" bgcolor="#FFFFFF">&nbsp;</td>-->
<!--        <td bgcolor="#dddddd" width="25%" align="right">待处理的订单管理</td>-->
<!--        <td bgcolor="#eeeeee" width="20%">-->
<!--            --><?php
//            $db->query("select count(*) as total from $requests_t where (payment=0 or send_out=0) and (TO_DAYS(now())-TO_DAYS(date_created)) < $dingdang_days");
//            $db->next_record();
//            echo $db->f('total');
//            ?>
<!--        </td>-->
<!--    </tr>-->
<!--    <tr>-->
<!--        <td height="20" bgcolor="#dddddd" width="25%" align="right">新闻条数</td>-->
<!--        <td height="20" bgcolor="#eeeeee" width="20%">-->
<!--            --><?php
//            $db->query("select count(*) as total from $news_t");
//            $db->next_record();
//            echo $db->f('total');
//            ?>
<!--        </td>-->
<!--        <td height="20" bgcolor="#FFFFFF">&nbsp;</td>-->
<!--        <td height="20" bgcolor="#dddddd" width="25%" align="right"> 成功的订单</td>-->
<!--        <td height="20" bgcolor="#eeeeee" width="20%">-->
<!--            --><?php
//            $db->query("select count(*) as total from $requests_t where (payment=1 and send_out=1)");
//            $db->next_record();
//            echo $db->f('total');
//            ?>
<!--        </td>-->
<!--    </tr>-->
<!--    <tr>-->
<!--        <td height="20" bgcolor="#dddddd" width="25%" align="right">注册用户数</td>-->
<!--        <td height="20" bgcolor="#eeeeee" width="20%">-->
<!--            --><?php
//            $db->query("select count(*) as total from $user_t");
//            $db->next_record();
//            echo $db->f('total');
//            ?>
<!--        </td>-->
<!--        <td height="20" bgcolor="#FFFFFF">&nbsp;</td>-->
<!--        <td height="20" bgcolor="#dddddd" width="25%" align="right">无效的订单</td>-->
<!--        <td height="20" bgcolor="#eeeeee" width="20%">-->
<!--            --><?php
//            $db->query("select count(*) as total from $requests_t where (payment=0 or send_out=0) and (TO_DAYS(now())-TO_DAYS(date_created)) > $dingdang_days");
//            $db->next_record();
//            echo $db->f('total');
//            ?>
<!--        </td>-->
<!--    </tr>-->
<!---->
<!--    <tr>-->
<!--        <td height="20" bgcolor="#dddddd" width="25%" align="right">广告条数</td>-->
<!--        <td height="20" bgcolor="#eeeeee" width="20%">-->
<!--            --><?php
//            $db->query("select count(*) as total from $ad_t");
//            $db->next_record();
//            echo $db->f('total');
//            ?>
<!--        </td>-->
<!--        <td height="20" bgcolor="#FFFFFF">&nbsp;</td>-->
<!--        <td height="20" bgcolor="#dddddd" width="25%" align="right">&nbsp;</td>-->
<!--        <td height="20" bgcolor="#eeeeee" width="20%">&nbsp;</td>-->
<!--    </tr>-->
<!--    <tr>-->
<!--        <td height="20" bgcolor="#dddddd" width="25%" align="right">友情链接个数</td>-->
<!--        <td height="20" bgcolor="#eeeeee" width="20%">-->
<!--            --><?php
//            $db->query("select count(*) as total from $link_t");
//            $db->next_record();
//            echo $db->f('total');
//            ?>
<!--        </td>-->
<!--        <td height="20" bgcolor="#FFFFFF">&nbsp;</td>-->
<!--        <td height="20" bgcolor="#dddddd" width="25%" align="right">&nbsp;</td>-->
<!--        <td height="20" bgcolor="#eeeeee" width="20%">&nbsp;</td>-->
<!--    </tr>-->
<!--    <tr>-->
<!--        <td height="20" bgcolor="#dddddd" width="25%" align="right">调查表个数</td>-->
<!--        <td height="20" bgcolor="#eeeeee" width="20%">-->
<!--            --><?php
//            $db->query("select count(*) as total from $vote_t");
//            $db->next_record();
//            echo $db->f('total');
//            ?>
<!--        </td>-->
<!--        <td height="20" bgcolor="#FFFFFF">&nbsp;</td>-->
<!--        <td height="20" bgcolor="#dddddd" width="25%" align="right">&nbsp;</td>-->
<!--        <td height="20" bgcolor="#eeeeee" width="20%">&nbsp;</td>-->
<!--    </tr>-->
<!--</table>-->
<!--    -->
<?php //} ?>

<br>
</td>
</tr>
</table>
<br>

</body>
</html>
