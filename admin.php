<?php
require "conf/config.php";
session_start();
//检测install.php文件，如果存在则删除
if (file_exists("install.php") == 1) {
    if (!@unlink("install.php")) {
        echo "<html><body><p>安全警告! install.php 仍然在你商城中. 这样很危险, 请马上删除它. .由于其它的原因install.php没有自动删除, 请通过 FTP 删除, 否则在未删除安装脚本之前. 你将无法进入控制面板.
</p></body></html>";
        exit;
    }
}

if ($submit)
    if ($a_xmxm == $ad_name && $a_pass == $ad_pass) {
        session_register('admin_name');
        $admin_name = $a_xmxm;
    }
?>
<html>
<head>
    <title><?php echo $sitename ?> -- 管理员首页</title>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312">
    <?php echo $http_head; ?>
    <link rel="stylesheet" href="conf/style.css" type="text/css">
</head>

<body bgcolor="#FFFFFF"
      text="#000000" <?php if (!isset($admin_name)) echo 'onload="document.login.a_xmxm.focus();"'; ?>>
<?php
if (session_is_registered("admin_name") && isset($admin_name))
    include "conf/admin.php";
?>
<table width="750" align="center">
<tr align="center">
    <td bgcolor="#EFEFEF" class="p13">
        <p><br>
            管理员首页<br>
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
            if ($logout) {
                session_destroy();
                echo "<br>您已经注销成功，";
                echo '<meta http-equiv="refresh" content="2;URL=index.php">正在返回首页......';
            }
            if (session_is_registered("admin_name") && isset($admin_name))
                echo "<br>管理员状态: <font color=blue>$admin_name </font>,正在进行管理...&nbsp;&nbsp;  <input class=stbtm2 name=button2 type=button onClick=\"JavaScript:if (confirm('确定要退出管理吗?')) window.location.href='admin.php?logout=1'\" value=\"退出管理\">";
            else
                echo "<br>管理员状态:未登录...";
            if ($submit)
                if (session_is_registered("admin_name") && isset($admin_name))
                    echo "";
                else
                    echo "<br>用户名或密码不对,请  <a href='admin.php'><font color=blue>[重新登录]</a>";
            else {
                ?>
          
          </td>
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
                                <td width="35%" align="right"> 用户名<b>：</b></td>
                                <td width="65%">
                                    <input class=think name=a_xmxm size=15>
                                </td>
                            </tr>
                            <tr>
                                <td width="35%" align="right"> 密　码<b>：</b></td>
                                <td width="65%">
                                    <input class=think name=a_pass size=15
                                           type=password>
                                </td>
                            </tr>
                            <tr align="center">
                                <td colspan=2 height=27 width="65%">
                                    <input class=stbtm name=submit type=submit value="登录">
                                    <input class=stbtm name=reset type=reset value="清除">
                                    <input class=stbtm name=button type=button
                                           onClick="JavaScript:if (confirm('确定要退出管理吗?')) window.location.href='admin.php?logout=1'"
                                           value="退出管理">
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </form><?php } ?>
            </td>
        </tr><?php } ?>

            </tbody>
        </table>
        <?php
        if (session_is_registered("admin_name") && isset($admin_name)) {
            ?>

            <br>
            <?php
            //TODO: this is the table
            ?>

            <table width="500" border="0" cellpadding="2" cellspacing="1" bgcolor="#7777777">
                <tr>
                    <td colspan="5" height="26" align="center"><b><font color="#FFFFFF">网站统计</font></b></td>
                </tr>
                <tr>
                    <td bgcolor="#dddddd" width="25%" align="right">商品类别总数</td>
                    <td bgcolor="#eeeeee" width="20%">
                        <?php
                        $db->query("select count(*) as total from $class_t");
                        $db->next_record();
                        echo $db->f('total');
                        ?>
                    </td>
                    <td bgcolor="#FFFFFF">&nbsp;</td>
                    <td bgcolor="#dddddd" width="25%" align="center" class="p13">订单统计</td>
                    <td bgcolor="#eeeeee" width="20%">&nbsp;</td>
                </tr>
                <tr>
                    <td height="20" bgcolor="#dddddd" width="25%" align="right">商品个数</td>
                    <td height="20" bgcolor="#eeeeee" width="20%">
                        <?php
                        $db->query("select count(*) as total from $goods_t");
                        $db->next_record();
                        echo $db->f('total');
                        ?>
                    </td>
                    <td height="20" bgcolor="#FFFFFF">&nbsp;</td>
                    <td bgcolor="#dddddd" width="25%" align="right">待处理的订单管理</td>
                    <td bgcolor="#eeeeee" width="20%">
                        <?php
                        $db->query("select count(*) as total from $requests_t where (payment=0 or send_out=0) and (TO_DAYS(now())-TO_DAYS(date_created)) < $dingdang_days");
                        $db->next_record();
                        echo $db->f('total');
                        ?>
                    </td>
                </tr>
                <tr>
                    <td height="20" bgcolor="#dddddd" width="25%" align="right">新闻条数</td>
                    <td height="20" bgcolor="#eeeeee" width="20%">
                        <?php
                        $db->query("select count(*) as total from $news_t");
                        $db->next_record();
                        echo $db->f('total');
                        ?>
                    </td>
                    <td height="20" bgcolor="#FFFFFF">&nbsp;</td>
                    <td height="20" bgcolor="#dddddd" width="25%" align="right"> 成功的订单</td>
                    <td height="20" bgcolor="#eeeeee" width="20%">
                        <?php
                        $db->query("select count(*) as total from $requests_t where (payment=1 and send_out=1)");
                        $db->next_record();
                        echo $db->f('total');
                        ?>
                    </td>
                </tr>
                <tr>
                    <td height="20" bgcolor="#dddddd" width="25%" align="right">注册用户数</td>
                    <td height="20" bgcolor="#eeeeee" width="20%">
                        <?php
                        $db->query("select count(*) as total from $user_t");
                        $db->next_record();
                        echo $db->f('total');
                        ?>
                    </td>
                    <td height="20" bgcolor="#FFFFFF">&nbsp;</td>
                    <td height="20" bgcolor="#dddddd" width="25%" align="right">无效的订单</td>
                    <td height="20" bgcolor="#eeeeee" width="20%">
                        <?php
                        $db->query("select count(*) as total from $requests_t where (payment=0 or send_out=0) and (TO_DAYS(now())-TO_DAYS(date_created)) > $dingdang_days");
                        $db->next_record();
                        echo $db->f('total');
                        ?>
                    </td>
                </tr>

                <tr>
                    <td height="20" bgcolor="#dddddd" width="25%" align="right">广告条数</td>
                    <td height="20" bgcolor="#eeeeee" width="20%">
                        <?php
                        $db->query("select count(*) as total from $ad_t");
                        $db->next_record();
                        echo $db->f('total');
                        ?>
                    </td>
                    <td height="20" bgcolor="#FFFFFF">&nbsp;</td>
                    <td height="20" bgcolor="#dddddd" width="25%" align="right">&nbsp;</td>
                    <td height="20" bgcolor="#eeeeee" width="20%">&nbsp;</td>
                </tr>
                <tr>
                    <td height="20" bgcolor="#dddddd" width="25%" align="right">友情链接个数</td>
                    <td height="20" bgcolor="#eeeeee" width="20%">
                        <?php
                        $db->query("select count(*) as total from $link_t");
                        $db->next_record();
                        echo $db->f('total');
                        ?>
                    </td>
                    <td height="20" bgcolor="#FFFFFF">&nbsp;</td>
                    <td height="20" bgcolor="#dddddd" width="25%" align="right">&nbsp;</td>
                    <td height="20" bgcolor="#eeeeee" width="20%">&nbsp;</td>
                </tr>
                <tr>
                    <td height="20" bgcolor="#dddddd" width="25%" align="right">调查表个数</td>
                    <td height="20" bgcolor="#eeeeee" width="20%">
                        <?php
                        $db->query("select count(*) as total from $vote_t");
                        $db->next_record();
                        echo $db->f('total');
                        ?>
                    </td>
                    <td height="20" bgcolor="#FFFFFF">&nbsp;</td>
                    <td height="20" bgcolor="#dddddd" width="25%" align="right">&nbsp;</td>
                    <td height="20" bgcolor="#eeeeee" width="20%">&nbsp;</td>
                </tr>
            </table>
            <?php } ?>
        <br>
    </td>
</tr>
</table>
<br>

<?php include "conf/footer.php"; ?>
</body>
</html>
