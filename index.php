<?php
require "conf/config.php";

if ($siteclose_flag) {
    echo $sitereason;
    exit();
}
session_start();
require("link.php");
?>
<html>
<head>
    <title><?php echo $sitename ?> -- ��ҳ</title>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312">
    <?php echo $http_head; ?>
    <link rel="stylesheet" href="conf/style.css" type="text/css">
</head>

<body bgcolor="#FFFFFF" text="#000000">
<?php include "conf/header.php" ?>

<table width="750" border="0" align="center">
<tr>
<td width="158" valign="top" align="center" class="softtitle">
    <table width="98%" border="0" cellpadding="1" cellspacing="0">
        <tr>
            <td bgcolor="#cccccc" height="57">
                <table width=100% border=0 cellspacing=0 cellpadding=0>
                    <tr>
                        <td height=20 bgcolor=#F0F788 align=center><font color="#663300">�û���¼</font></td>
                    </tr>
                    <tr>
                        <td height=2 bgcolor=#000000>
                            <spacer type=block width=1>
                        </td>
                    </tr>
                    <tr>
                        <td class=p7 bgcolor="#FFFFFF" align="center">
                            <table align=center border=0 cellpadding=0 cellspacing=3
                                   width="100%">
                                <form action="my_login.php" method=post name=login onSubmit="return(check());">
                                    <tbody>
                                    <tr>
                                        <td width="35%" align="right" height="43">
                                            <script language="JavaScript">
                                                function check() {
                                                    document.login.submit.disabled = true;
                                                    document.login.submit2.disabled = true;
                                                }
                                            </script>
                                            �û���<b>��</b></td>
                                        <td width="65%" height="43">
                                            <input class=think name=u_name size=10>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="35%" align="right" height="20"> �ܡ���<b>��</b></td>
                                        <td width="65%" height="20">
                                            <input class=think name=u_pass size=10
                                                   type=password>
                                        </td>
                                    </tr>
                                    <tr align="center">
                                        <td colspan=2 height=34 width="65%">
                                            <input name=submit type=submit value=��¼ class="think">
                                            ��
                                            <input name=submit2
                                                   onClick="JavaScript:window.location.href='register1.php'" type=button
                                                   value=ע�� class="think">
                                            <input type="hidden" name="url" value="<?php echo $url ?>">
                                        </td>
                                    </tr>
                                    <tr align="center">
                                        <td colspan=2 height=20 width="65%"><img height=11
                                                                                 src="images/forget.gif" width=11>
                                            &nbsp;�����������룬<a
                                                    href="password.php"><font
                                                    color=#ce0929>���������</font></a></td>
                                    </tr>
                                    </tbody>
                                </form>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <br>
    <table width=100% border=0 cellspacing=0 cellpadding=0>
        <tr>
            <td height=20 bgcolor=#7A5E12 align=center><font color="#FFFFFF">��Ʒ����</font></td>
        </tr>
        <tr>
            <td height=1 bgcolor=#000000>
                <spacer type=block width=1>
            </td>
        </tr>
        <tr>
            <td class=p7 bgcolor="#FAEEFD" style="line-height:150%" align="center">
                <?php
                $db->query("select id,name from $class_t where up_id=0");
                $h = 0;
                while ($db->next_record()) {
                    echo "<a href=\"javascript:void(0);\" onclick=\"showmenu(menu$h," . $db->num_rows() . ");\"><b><font color=\"#333399\">[ </font></b><font color=\"#FF3333\">" . $db->f("name") . "</font><font color=\"#333399\"><b> ]</b></font></a><BR>\n";
                    echo "<table id=\"menu$h\" style=\"display:none\" width=\"98%\" border=\"0\" cellspacing=\"3\" cellpadding=\"0\"><tr align=\"center\">\n";
                    $db2->query("select id,name from $class_t where up_id=" . $db->f("id"));
                    $i = 0;
                    while ($db2->next_record()) {
                        if ($i % 2 == 0) echo "</tr><tr align=\"center\">\n";
                        echo "<td width=\"50%\" height=\"25\">";
                        echo "<a href=\"index.php?sf=" . $db2->f("id") . "&text=" . $db2->f("name") . "&sh=$h\" class=\"clink03\">" . $db2->f("name") . "</a>";
                        echo "</td>";
                        $i++;
                    }
                    echo "</tr></table>";
                    $h++;
                }
                ?>
            </td>
        </tr>
    </table>

    <script language="JavaScript">
        <?php
        if (isset($sh))
            echo "showmenu(menu$sh,$h);";
        ?>
        function showmenu(name, num) {
            flag = name.style.display;
            for (i = 0; i < num; i++)
                eval("menu" + i + ".style.display='none';");
            if (flag == "none")
                name.style.display = "";
            else
                name.style.display = "none";
        }
        function winopen(url, flag) {
            window.open(url, flag, "toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=1,resizable=yes,width=640,height=450,top=60,left=80");
        }
    </script>
    <br>
    <table width="98%" border="0" cellpadding="1" cellspacing="0">
        <tr>
            <td bgcolor="#ff6000" height="57">
                <table width=100% border=0 cellspacing=0 cellpadding=0>
                    <tr>
                        <td height=20 bgcolor=#ff6000 align=center><font color="#FFFFFF">��������</font></td>
                    </tr>
                    <tr>
                        <td height=2 bgcolor=#000000>
                            <spacer type=block width=1>
                        </td>
                    </tr>
                    <tr>
                        <?php showLinks(); ?>
                    </tr>
                    <tr>
                        <td class=p7 bgcolor="#FFFFFF" align="right" height="24"><a href="links.php"><img
                                src="images/more.gif" width="50" height="10" border="0" alt="����..."></a>&nbsp;&nbsp;
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>


</td>

<td valign="top">
    <?php if (isset($login_name)) {

    echo "�װ��� <font color='#cc0000'>" . $login_name . "</font>������!��ӭ������!";
} else
    echo "�װ��Ĺ˿ͣ�����!��ӭ������! <a href='login.php' class='clink03'>[���¼]</a> ";
    echo " �ϴε�¼ʱ�䣺" . $cookielogintime;

    if ($f) $tmp = "where class_id=$f";

    if ($up_id)
        $tmp = "where up_id=$up_id";
    if ($sf)
        $tmp = "where class_id=$sf";

    if (!$page) $page = 1;
    $db->query("select null from $goods_t " . $tmp);
    echo "select null from $goods_t " . $tmp;
    $total_num = $db->num_rows();//�õ��ܼ�¼��
    $totalpage = ceil($total_num / $num_to_show);//�õ���ҳ��
    $init_record = ($page - 1) * $num_to_show;
    $db->query("select id,name,image,price_m,price,state
   from $goods_t $tmp
   order by id DESC limit $init_record, $num_to_show");
    ?>
    <table width="99%" border="0">
        <tr>
            <td bgcolor="#333366"><font color="#FFFFFF">
                <?php if ($text) echo "��������� $text ���Ʒ"; ?>
            </font></td>
        </tr>
    </table>
    <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">
        <tr>
            <?php
            $i = 0;
            while ($db->next_record()) {
                if ($i % 2 == 0) echo "</tr><tr>";
                ?>
                <td width="50%" align="center">
                    <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" height="120">
                        <tr>
                            <td colspan="3" height="4"></td>
                        </tr>
                        <tr>
                            <td width="20%" align="center">
                                <?php
                                echo "<a href='goods_list.php?id=" . $db->f('id') . "' target='_blank'><img src='" . show_img($db->f('image'), 50, 50) . " border='0'></a>";
                                ?>
                            </td>
                            <td width="2" valign="top">&nbsp;</td>
                            <td width="77%" valign="top"><b><font class=p14 color=#000000>
                                <?php echo "<a href='goods_list.php?id=" . $db->f('id') . "' class='softtitle' target='_blank'>" . stripslashes($db->f('name')) . "</a>"; ?>
                            </font></b><br>
                                ���ۼۣ�<strike><font color=red>
                                    <?php echo $db->f('price_m'); ?>
                                </font></strike>Ԫ<br>
                                ��Ա�ۣ�<font class=p13 color=#ff3333
                                          size=2><?php
                                    if ($user_price)
                                        if (isset($login_name))
                                            echo $db->f('price');
                                        else
                                            echo "";
                                    else
                                        echo $db->f('price');
                                    ?>
                                </font>Ԫ<br>
                                ״̬��<font color=red>
                                    <?php
                                    if ($db->f('state') == 0) echo "�л�";
                                    if ($db->f('state') == 1) echo "ȱ��";
                                    ?>
                                </font><br>
                                <a href="shopping.php?id=<?php echo $db->f('id') ?>" target="cart"><img
                                        src="images/gou.gif" width="60" height="22" border="0"></a>
                                <a href="shopping.php?id2=<?php echo $db->f('id') ?>" target="cart">
                                    <img src="images/sc.gif" width="60" height="22" border="0"></a></td>
                        </tr>
                        <tr>
                            <td colspan="3"><img src="images/spacer.gif" width="1" height="1"></td>
                        </tr>
                        <tr>
                            <td colspan="3" background="images/line1.gif"><img src="images/spacer.gif" width="1"
                                                                               height="1"></td>
                        </tr>
                    </table>
                </td>
                <?php
                $i++;
            }
            ?>
        </tr>
    </table>
    <table width="100%" border="0" cellspacing="1" cellpadding="1">
        <form action="<?php echo $PHP_SELF . "?up_id=$up_id&sf=$sf" ?> " method="post" name="form8"
              onSubmit="return check_page('form8.page')">
            <tr>
                <td align="right"> �ܼ�:
                    <?php echo $total_num . " ";
                    $page1 = $page - 1;
                    $page2 = $page + 1;
                    if ($page1 < 1) echo "<FONT color=#999999>��ҳ&nbsp;��һҳ</FONT>&nbsp;";
                    else echo "<a href='$PHP_SELF?page=1&up_id=$up_id&sf=$sf'>��ҳ</a>&nbsp;<a href='$PHP_SELF?page=$page1&up_id=$up_id&sf=$sf'>��һҳ</a>&nbsp;";
                    if ($page2 > $totalpage) echo "<FONT color=#999999>��һҳ&nbsp;βҳ</FONT>&nbsp;";
                    else echo "<a href='$PHP_SELF?page=$page2&up_id=$up_id&sf=$sf'>��һҳ</a>&nbsp;<a href='$PHP_SELF?page=$totalpage&up_id=$up_id&sf=$sf'>βҳ</a>&nbsp;";
                    ?>
                    ��ǰҳ:<b>
                        <?php echo $page . "/" . $totalpage ?>
                    </b>&nbsp;
                    <script language="JavaScript">
                        function check_page(name) {
                            eval("page=" + name + ".value");
                            if (isNaN(page) || page <= 0 || page > <?php echo $totalpage ?>) {
                                alert("����ȷ����ҳ�������ֵΪ <?php echo $totalpage ?> ��");
                                eval(name + ".select()");
                                return false;
                            }
                        }
                    </script>
                    ת����
                    <input type="text" name="page" size="2">
                    <input type="submit" name="Submit22" value="GO">
                </td>
            </tr>
        </form>
    </table>
</td>


<td width="170" valign="top" align="center">
    <table border=0 cellpadding=0 cellspacing=0 width=100%>
        <tbody>
        <tr>
            <td bgcolor=#ff6600 height=22 valign=top width="5%"><img height=19
                                                                     src="images/jiao.gif" width=5></td>
            <td bgcolor=#ff660 height=22 valign=center width="15%"><img
                    height=21 src="images/bikegif.gif" width=35></td>
            <td bgcolor=#ff6600 height=22 valign=center width="80%"><img
                    height=1 src="images/spacer.gif" width=3><img height=18
                                                                  src="images/gwc_new.gif" width=116></td>
        </tr>
        <tr valign=top>
            <td colspan=3>
                <table align=center border=0 cellpadding=0 cellspacing=0
                       width="100%">
                    <tbody>
                    <tr>
                        <td bgcolor=#ffcc00><img height=1
                                                 src="images/spacer.gif" width=1></td>
                    </tr>
                    <tr>
                        <td bgcolor=#ffcc00 valign=top>
                            <table align=center border=0 cellpadding=0 cellspacing=0
                                   width="99%">
                                <tbody>
                                <tr>
                                    <td bgcolor=#ffffff valign=top>
                                        <iframe frameborder=0
                                                height=182 name=cart scrolling=no
                                                src="shopping.php"
                                                width="100%"></iframe>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor=#ffcc00 height=1><img height=1
                                                          src="images/spacer.gif"
                                                          width=1></td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
    <br>
    <?php include "news_hot.php" ?>
    <table width=100% border=0 cellspacing=0 cellpadding=0>
        <tr>
            <td height=20 bgcolor=#2E5F49 align=center><font color="#FFFFFF">����Ǽ�</font></td>
        </tr>
        <tr>
            <td height=1 bgcolor=#000000>
                <spacer type=block width=1>
            </td>
        </tr>
        <tr>
            <td class=p7 bgcolor="#C2D6EF" style="line-height:150%" align="center">
                <table width="96%" height="62">
                    <tr>
                        <td align="center"><a href="####"
                                              onClick="window.open('buy.php?f=1','displayWindow','toolbar=no,scrollbars=no,location=no,left=0,top=0,width=500,height=450')"
                                              class="clink03">�����󹺲�Ʒ</a></td>
                    </tr>
                    <tr>
                        <td align="center"><a href="####"
                                              onClick="window.open('buy.php','displayWindow','toolbar=no,scrollbars=no,location=no,left=0,top=0,width=500,height=450')"
                                              class="clink03">�������۲�Ʒ</a></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <br>
    <table width="98%" border="0" cellpadding="1" cellspacing="0">
        <tr>
            <td bgcolor="#750000">
                <table width=100% border=0 cellspacing=0 cellpadding=0>
                    <form name="form1" method="post" action="vote.php" target="vote">
                        <tr>
                            <td height=20 bgcolor=#750000 align=center><font color="#FFFFFF">��վ����
                                <?php
                                $db->query("select caption,thing from $vote_t order by id DESC limit 1");
                                $db->next_record();
                                $thing = stripslashes($db->f('thing'));
                                $thing2 = explode(";", $thing);
                                ?>
                            </font></td>
                        </tr>
                        <tr>
                            <td height=1 bgcolor=586011>
                                <spacer type=block width=1>
                            </td>
                        </tr>
                        <tr>
                            <td class=p7 bgcolor="#FFFFFF" style="line-height:150%" align="center">
                                <?php echo $db->f('caption') ?>
                            </td>
                        </tr>
                        <?php
                        for ($i = 0; $i < count($thing2); $i++) {
                            ?>
                            <tr>
                                <td class=p7 bgcolor="#FFFFFF" style="line-height:150%">
                                    <input type="radio" name="vote" value="<?php echo $i ?>">
                                    <?php echo $thing2[$i]; ?>
                                </td>
                            </tr>
                            <?php } ?>
                        <tr>
                            <td class=p7 bgcolor="#FFFFFF" style="line-height:150%" height="38" align="center">
                                <input type="submit" name="Submit" value="Ͷ Ʊ" class="think"
                                       onClick="winopen('about:blank','vote')">
                                ��
                                <input type="button" name="Submit2" value="�� ��" class="think"
                                       onClick="winopen('vote.php','vote')">
                            </td>
                        </tr>
                    </form>
                </table>
            </td>
        </tr>
    </table>
</td>
</tr>
</table>
<?php include "conf/footer.php"; ?>
</body>
</html>















<table align = 'center'>


    <!--goods list table -->
    <div>
        <?php
//init

        if (!isset($page)) $page = 1;
        if (!isset($category_num)) $category_num = 88;

        echo "upid = $category_num  ";


        $record_one_line = 3;
        $line_one_page = 4;
        $records_one_page = $record_one_line * $line_one_page;
        $begin = ($page - 1) * $records_one_page;
        php?>


        <table border="1">


            <?php
            $db->query("select * from $goods_t where up_id = $category_num");
            $total_num = $db->num_rows();// all records in this category
            $totalpage = ceil($total_num / $records_one_page);//all the pages
            $init_record = ($page - 1) * $records_one_page;

            echo "find   $total_num results<br>";

            $db->query("select * from $goods_t where up_id = $category_num limit $begin, $records_one_page");
            $cur_page_record = $db->num_rows();
            $i = 0;
            $j = 0;
            for (; $i * $record_one_line + $j < $cur_page_record; $i++) {

                if ($i % $record_one_line == 0) echo "<tr>";
                for ($j = 0; $j < $record_one_line && $i * $record_one_line + $j < $cur_page_record; $j++) {
                    $db->next_record();
                    echo "<td>"
                    ?>
                    <!-- show table of an item -->
                    <table>

                        <tr>
                            <td>
                                <?php
                                echo "<a href='my_goods_list.php?id=" . $db->f('id') . "' target='_blank'><img src='" . show_img($db->f('image'), 50, 50) . " border='0'></a>";
                                ?>
                            </td>

                            <td>
                                <?php echo "<a href='my_goods_list.php?id=" . $db->f('id') . "' class='softtitle' target='_blank'>" . stripslashes($db->f('name')) . "</a>"; ?>
                                <br>
                                price��
                                <?php echo $db->f('price_m'); ?>
                                $
                                <br>
                                prime��
                                <?php
                                if ($user_price)
                                    if (isset($login_name))
                                        echo $db->f('price');
                                    else
                                        echo "";
                                else
                                    echo $db->f('price');
                                ?>
                                $ <br>
                                count��
                                <?php
                                if ($db->f('state') == 0) echo "many";
                                if ($db->f('state') == 1) echo "none";
                                ?>
                                <br>
                                <a href="my_shopping.php?id=<?php echo $db->f('id') ?>" target="cart"><img
                                        src="images/gou.gif" width="60" height="22" border="0"></a>
                                <a href="my_shopping.php?id2=<?php echo $db->f('id') ?>" target="cart">
                                    <img src="images/sc.gif" width="60" height="22" border="0"></a>
                            </td>
                        </tr>

                    </table>


                    <?php
                    echo "</td>";
                }
                ?>

                <?php
                echo "</tr>";
            }
            ?>

        </table>

    </div>
    <td>
    <td>
        <!-- cart-->
        <iframe frameborder=1
                height=182 name=cart scrolling=no
                src="shopping.php"
                width="100%"></iframe>

    </td>
    </tr>
</table>

