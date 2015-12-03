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
    $_SESSION['admin_name'] = $a_xmxm;
//session_register('admin_name');
    //$admin_name = $a_xmxm;
}
?>

<!--all admin's options -->
<!-- display after log in -->

<?php include "conf/admin.php"; ?>

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
        echo '<meta http-equiv="refresh" content="2;URL=my_admin.php">back to index';
    }


<<<<<<< HEAD
    if (session_is_registered("admin_name") && isset($admin_name))
=======

    if (isset($_SESSION["admin_name"]))
>>>>>>> 7d9e19ccad4db499ecdc32c8bef01ba872c1b72f
        echo "<br>status  : <font color=blue>$admin_name </font>, logged in...&nbsp;&nbsp;  <input class=stbtm2 name=button2 type=button onClick=\"JavaScript:if (confirm('quit ?')) window.location.href='my_admin.php?logout=1'\" value=\"quit\">";
    else
        echo "<br>status  :  unlogged...";

    //submit
    if ($submit)
        if (isset($_SESSION["admin_name"]))
            echo "";
        else{
            echo "<br>username or password is incorrect. Please enter again!  <a href='my_admin.php'><font color=blue>[login]</font></a>";
        }


    //wait for inputing uname & pwd
    else {
        ?>

        </tr>
        <tr>
            <td align="center">

                <?php
                if (!isset($_SESSION["admin_name"])) {
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

<br>
</td>
</tr>
</table>
<br>

</body>
</html>
