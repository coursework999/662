<?php
require "conf/config.php";
session_start();
//���install.php�ļ������������ɾ��
if (file_exists("install.php") == 1) {
    if (!@unlink("install.php")) {
        echo "<html><body><p>��ȫ����! install.php ��Ȼ�����̳���. ������Σ��, ������ɾ����. .����������ԭ��install.phpû���Զ�ɾ��, ��ͨ�� FTP ɾ��, ������δɾ����װ�ű�֮ǰ. �㽫�޷�����������.
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
    <title><?php echo $sitename ?> -- ����Ա��ҳ</title>
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
            ����Ա��ҳ<br>
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
                echo "<br>���Ѿ�ע���ɹ���";
                echo '<meta http-equiv="refresh" content="2;URL=index.php">���ڷ�����ҳ......';
            }
            if (session_is_registered("admin_name") && isset($admin_name))
                echo "<br>����Ա״̬: <font color=blue>$admin_name </font>,���ڽ��й���...&nbsp;&nbsp;  <input class=stbtm2 name=button2 type=button onClick=\"JavaScript:if (confirm('ȷ��Ҫ�˳�������?')) window.location.href='admin.php?logout=1'\" value=\"�˳�����\">";
            else
                echo "<br>����Ա״̬:δ��¼...";
            if ($submit)
                if (session_is_registered("admin_name") && isset($admin_name))
                    echo "";
                else
                    echo "<br>�û��������벻��,��  <a href='admin.php'><font color=blue>[���µ�¼]</a>";
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
                                <td width="35%" align="right"> �û���<b>��</b></td>
                                <td width="65%">
                                    <input class=think name=a_xmxm size=15>
                                </td>
                            </tr>
                            <tr>
                                <td width="35%" align="right"> �ܡ���<b>��</b></td>
                                <td width="65%">
                                    <input class=think name=a_pass size=15
                                           type=password>
                                </td>
                            </tr>
                            <tr align="center">
                                <td colspan=2 height=27 width="65%">
                                    <input class=stbtm name=submit type=submit value="��¼">
                                    <input class=stbtm name=reset type=reset value="���">
                                    <input class=stbtm name=button type=button
                                           onClick="JavaScript:if (confirm('ȷ��Ҫ�˳�������?')) window.location.href='admin.php?logout=1'"
                                           value="�˳�����">
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
                    <td colspan="5" height="26" align="center"><b><font color="#FFFFFF">��վͳ��</font></b></td>
                </tr>
                <tr>
                    <td bgcolor="#dddddd" width="25%" align="right">��Ʒ�������</td>
                    <td bgcolor="#eeeeee" width="20%">
                        <?php
                        $db->query("select count(*) as total from $class_t");
                        $db->next_record();
                        echo $db->f('total');
                        ?>
                    </td>
                    <td bgcolor="#FFFFFF">&nbsp;</td>
                    <td bgcolor="#dddddd" width="25%" align="center" class="p13">����ͳ��</td>
                    <td bgcolor="#eeeeee" width="20%">&nbsp;</td>
                </tr>
                <tr>
                    <td height="20" bgcolor="#dddddd" width="25%" align="right">��Ʒ����</td>
                    <td height="20" bgcolor="#eeeeee" width="20%">
                        <?php
                        $db->query("select count(*) as total from $goods_t");
                        $db->next_record();
                        echo $db->f('total');
                        ?>
                    </td>
                    <td height="20" bgcolor="#FFFFFF">&nbsp;</td>
                    <td bgcolor="#dddddd" width="25%" align="right">������Ķ�������</td>
                    <td bgcolor="#eeeeee" width="20%">
                        <?php
                        $db->query("select count(*) as total from $requests_t where (payment=0 or send_out=0) and (TO_DAYS(now())-TO_DAYS(date_created)) < $dingdang_days");
                        $db->next_record();
                        echo $db->f('total');
                        ?>
                    </td>
                </tr>
                <tr>
                    <td height="20" bgcolor="#dddddd" width="25%" align="right">��������</td>
                    <td height="20" bgcolor="#eeeeee" width="20%">
                        <?php
                        $db->query("select count(*) as total from $news_t");
                        $db->next_record();
                        echo $db->f('total');
                        ?>
                    </td>
                    <td height="20" bgcolor="#FFFFFF">&nbsp;</td>
                    <td height="20" bgcolor="#dddddd" width="25%" align="right"> �ɹ��Ķ���</td>
                    <td height="20" bgcolor="#eeeeee" width="20%">
                        <?php
                        $db->query("select count(*) as total from $requests_t where (payment=1 and send_out=1)");
                        $db->next_record();
                        echo $db->f('total');
                        ?>
                    </td>
                </tr>
                <tr>
                    <td height="20" bgcolor="#dddddd" width="25%" align="right">ע���û���</td>
                    <td height="20" bgcolor="#eeeeee" width="20%">
                        <?php
                        $db->query("select count(*) as total from $user_t");
                        $db->next_record();
                        echo $db->f('total');
                        ?>
                    </td>
                    <td height="20" bgcolor="#FFFFFF">&nbsp;</td>
                    <td height="20" bgcolor="#dddddd" width="25%" align="right">��Ч�Ķ���</td>
                    <td height="20" bgcolor="#eeeeee" width="20%">
                        <?php
                        $db->query("select count(*) as total from $requests_t where (payment=0 or send_out=0) and (TO_DAYS(now())-TO_DAYS(date_created)) > $dingdang_days");
                        $db->next_record();
                        echo $db->f('total');
                        ?>
                    </td>
                </tr>

                <tr>
                    <td height="20" bgcolor="#dddddd" width="25%" align="right">�������</td>
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
                    <td height="20" bgcolor="#dddddd" width="25%" align="right">�������Ӹ���</td>
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
                    <td height="20" bgcolor="#dddddd" width="25%" align="right">��������</td>
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
