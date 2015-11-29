<?php
require "conf/config.php";
if ($u=="")
{
    echo "参数错误!";
    exit();
}
if ($user_reg_flag==0)
{
    echo "不能注册新用户 <BR><BR>对不起，系统已经关闭了新用户注册功能，如有问题请和管理员联系。";
    exit();
}
?>
<html>
<head>
    <title><?php echo $sitename ?> register</title>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312">
    <?php echo $http_head; ?>
    <link rel="stylesheet" href="conf/style.css" type="text/css">
</head>
<body bgcolor="#FFFFFF" text="#000000">
<?php include "conf/header.php" ?>
<table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr align="center" bgcolor="#EFEFEF">
        <td bgcolor="#FFFFFF">
            <table width="630" border="0">
                <tr>
                    <td height="18" class="p14">
                        <table border=0 cellpadding=0 cellspacing=0 width="100%">
                            <tbody>
                            <tr align="left">
                                <th bgcolor=#ffffff colspan=4 height=22 valign=top> <font class=p14 color=#cc0000>register result</font></th>
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
                        <p><br>
                            <?php
                            $db->query("select null from $user_t where u_name='$u'");
                            if ($db->num_rows()==0)
                            {
                                $a=split(',',$province);
                                $province=$a[1];
                                $reg_date=date("Y-m-d");
                                $str_sql = "insert into $user_t
           values(null,'$u','$u_pass','$name',$sex,'$email','$province','$city','$tel','$address',
                  '$post','$attrib','$paper_name','$paper_num','$zzbh','$khhh','$khzh','$reg_date','$date_tmp',0,'$init_action')";
                            }
                            if ($db->query($str_sql))
                            {
                                if ($init_action=="y")
                                    echo "login with your username";
                                else
                                    echo "Successfully ! we will confirm your request in future two days.";
                            }
                            else
                                echo "sorry, register failed";
                            ?>
                        </p>
                        <p>
                            <input type="button" value="index" onClick="JavaScript:window.location.href='my_index.php'" class="stbtm"  name="button3">
                        </p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<br>
<?php include "conf/footer.php"; ?>
</body>
</html>
