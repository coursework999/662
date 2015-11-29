<?php
require "conf/config.php";
if ($u)
{
    $db->query("select null from $user_t where u_name='$u'");
    if ($db->num_rows()==0)
        header("Location: my_register2.php?u=$u");
    else
        $flag=1;
}
?>
<html>
<head>
    <title><?php echo $sitename ?> register/title>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312">
    <?php echo $http_head; ?>
    <link rel="stylesheet" href="conf/style.css" type="text/css">
</head>
<body>
<?php include "conf/header.php" ?>
<table width="750" border="0" align="center">
    <tr align="center">
        <td><img src="images/ze1.gif" width="195" height="35">
            <script language="JavaScript">
                function check()
                {
                    if (document.formlogin.u.value.length<4 || document.formlogin.u.value.indexOf(' ')!=-1 || document.formlogin.u.value.indexOf("'") != -1 )
                    {
                        document.formlogin.u.focus();
                        window.alert("Please input your username, (4-16 characters or numbers)");
                        return false;
                    }
                }
            </script>
        </td>
    </tr>
    <tr align="center">
        <td>
            <?php
            if ($user_reg_flag==0)
            {
                echo "<BBR><BR>Cannot register new user <BR><BR>Sorry, registration has shut down, please contact administrator。";
            }
            else
            {
                ?>
                <table width="630" border="0">
                    <tr>
                        <td height="18" class="p14">
                            <table >
                                <tbody>
                                <tr>
                                    <th>Profile(<b>*</b> is necessary) </th>
                                </tr>
                                <tr >
                                    <td> </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>

                    <tr align="center">
                        <td height="18">
                            <form name="formlogin" method="post" action="" onSubmit="return(check());">
                                <table width="63%" border="0">
                                    <tr>
                                        <td height="18">&nbsp; </td>
                                    </tr>
                                    <tr>
                                        <td height="19">
                                            <?php
                                            if ($flag) echo "<b><font color=#cc0033>sorry, username：".$u."are used. Please change another one</font></b>";
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="19"> username：
                                            <input type="text" name="u" class=think maxlength="16" size="12">
                                            <font color=#cc0000>*</font>（4-16 numbers, characters） </td>
                                    </tr>
                                    <tr>
                                        <td height="18">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td height="18">&nbsp;</td>
                                    </tr>
                                    <tr align="center">
                                        <td>
                                            <input type="submit" name="Submit" value=" register " class=stbtm2>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </td>
                    </tr>
                </table>
                <?php } ?>
        </td>
    </tr>
</table>
<br>
<?php include "conf/footer.php"; ?>
</body>
</html>
