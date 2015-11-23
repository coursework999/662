<?php
require "conf/config.php";
include "admin_check.php";
?>
<html>
<head>
    <title><?php echo $sitename ?> -- user management</title>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312">
    <?php echo $http_head; ?>
    <link rel="stylesheet" href="conf/style.css" type="text/css">
</head>
<body bgcolor="#FFFFFF" text="#000000">


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


<table width="750" border="0" align="center" cellpadding="0" cellspacing="0">

</tr>
<tr align="center" bgcolor="#EFEFEF">
<td>
<?php
if ($submit)
{
    $a=split(',',$province);
    $province=$a[1];
    $db->query("update $user_t set u_pass='$u_pass',name='$name',sex=$sex,email='$email',
            province='$province',city='$city',tel='$tel',address='$address',
			post='$post',attrib='$attrib',paper_name='$paper_name',paper_num='$paper_num',
			zzbh='$zzbh',khhh='$khhh',khzh='$khzh'
			where id=$id");
    echo 'successfully! back to usermanagement<meta http-equiv="refresh" content="2;URL=my_admin_user.php"><br><br>';
}
else
{
    $db->query("select * from $user_t where id=$id");
    $db->next_record();
 ?>

<table width="630" border="0">
    <tr>
        <td height="18" class="p14">
            <table border=0 cellpadding=0 cellspacing=0 width="100%">
                <tbody>
                <tr align="left">
                    <th bgcolor=#ffffff colspan=4 height=22 valign=top><font color=#ffffcc
                                                                             face="Arial, Helvetica, sans-serif"><b><font class=p14
                                                                                                                          color=#cc0000>profile：</font></b></font></th>
                </tr>
                <tr bgcolor=#cc0000>
                    <td colspan=4 height=2 valign=top></td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    <tr align="center">
        <td height="18">
            <form name="formlogin" method="post" onSubmit="return(check());">
                <table width="96%" border="1" bordercolorlight="#d2d2d2" cellpadding="0" cellspacing="0" bordercolordark="#ffffff">
                    <tr align="center">
                        <td>
                            <table width="70%" border="0">
                                <tr>
                                    <td colspan="2">&nbsp; </td>
                                </tr>
                                <tr>
                                    <td align="right">username：</td>
                                    <td>
                                        <?php echo $db->f('u_name') ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right">new password：</td>
                                    <td>
                                        <input type="text" name="u_pass" class="think" maxlength="16" size="12" value="<?php echo $db->f('u_pass') ?>">
                                        <font color="#CC0000">*</font></td>
                                </tr>
                                <tr>
                                    <td align="right">comfirm password：</td>
                                    <td>
                                        <input type="text" name="u_pass2" class="think" maxlength="16" size="12" value="<?php echo $db->f('u_pass') ?>">
                                        <font color="#CC0000">*</font> </td>
                                </tr>
                                <tr>
                                    <td align="right">email：</td>
                                    <td>
                                        <input type="text" name="email" class="think" maxlength="60" size="30" value="<?php echo $db->f('email') ?>">
                                        <font color="#CC0000">*</font></td>
                                </tr>
                                <tr>
                                    <td align="right">real name：</td>
                                    <td>
                                        <input type="text" name="name" class="think" maxlength="20" size="12" value="<?php echo $db->f('name') ?>">
                                        <font color="#CC0000">*</font></td>
                                </tr>
                                <tr>
                                    <td width="20%" align="right">gender： </td>
                                    <td width="80%">
                                        <select name="sex">
                                            <option value="0" selected>choose</option>
                                            <option value="1">male</option>
                                            <option value="2">female</option>
                                        </select>
                                        <font color="#CC0000">*</font></td>
                                </tr>
                               
                                <tr>
                                    <td align="right">contact： </td>
                                    <td>
                                        <input type="text" name="tel" class="think" maxlength="40" size="20" value="<?php echo $db->f('tel') ?>">
                                        <font color="#CC0000">*</font></td>
                                </tr>
                                <tr>
                                    <td align="right">address： </td>
                                    <td>
                                        <input type="text" name="address" class="think" maxlength="100" size="40" value="<?php echo $db->f('address') ?>">
                                        <font color="#CC0000">*</font></td>
                                </tr>
                                <tr>
                                    <td align="right">zipcode： </td>
                                    <td>
                                        <input type="text" name="post" class="think" maxlength="6" size="8" value="<?php echo $db->f('post') ?>">
                                        <font color="#CC0000">*</font></td>
                                </tr>
                                <tr align="center">
                                    <td colspan="2" height="44">
                                        <input type="hidden" name="id" value="<?php echo $id ?>">
                                        <input type="submit" name="submit" value="submit" class=stbtm2>
                                        　　
                                        <input type="reset" name="Submit2" value="give up" onClick="history.go(-1)" class=stbtm2>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </form>
        </td>
    </tr>
</table>
    <?php
}
?>
</td>
</tr>
</table>
<br>
</body>
</html>
