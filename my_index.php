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
    <title><?php echo $sitename ?> -- Homepage </title>
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
                    <td height=20 bgcolor=#F0F788 align=center><font color="#663300">User login</font></td>
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
                                        Username<b>：</b></td>
                                    <td width="65%" height="43">
                                        <input class=think name=u_name size=10>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="35%" align="right" height="20"> Password<b>：</b></td>
                                    <td width="65%" height="20">
                                        <input class=think name=u_pass size=10
                                               type=password>
                                    </td>
                                </tr>
                                <tr align="center">
                                    <td colspan=2 height=34 width="65%">
                                        <input name=submit type=submit value=Login class="think">
                                        　
                                        <input name=submit2
                                               onClick="JavaScript:window.location.href='my_register1.php'" type=button
                                               value=Register class="think">
                                        <input type="hidden" name="url" value="<?php echo $url ?>">
                                    </td>
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
        <td height=20 bgcolor=#7A5E12 align=center><font color="#FFFFFF">Product Categories</font></td>
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

            while ($db->next_record()) {
                echo "<a href='my_index.php?category_num=".$db->f('id')."'><b><font color=\"#333399\">[ </font></b><font color=\"#FF3333\">" . $db->f("name") . "</font><font color=\"#333399\"><b> ]</b></font></a><BR>\n";
                echo "<table id=\"menu$h\" style=\"display:none\" width=\"98%\" border=\"0\" cellspacing=\"3\" cellpadding=\"0\"><tr align=\"center\">\n";
                echo "</tr></table>";

            }
                ?>
        </td>
    </tr>
</table>



</td>
<td valign="top">
<?php if (isset($login_name)) {

    echo "Dear <font color='#cc0000'>" . $login_name . "</font>，Hello!Welcome!";
} else
    echo "Dear customer，hello!welcome! <a href='my_login.php' class='clink03'>[Login]</a> ";
echo "&nbsp&nbsp&nbsp Last login：" . $cookielogintime;

    if ($category_num)
        $tmp = "where up_id=$category_num";


if (!$page) $page = 1;
$db->query("select null from $goods_t " . $tmp);
$total_num = $db->num_rows();
$totalpage = ceil($total_num / $num_to_show);
$init_record = ($page - 1) * $num_to_show;

$db->query("select id,name,image,price_m,price,state
   from $goods_t $tmp
   order by id DESC limit $init_record, $num_to_show");
?>


<table width="99%" border="0">
    <tr>
        <td bgcolor="#333366"><font color="#FFFFFF">
            <?php  echo "Your are viewing products"; ?>
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
                            echo "<a href='my_goods_list.php?id=" . $db->f('id') . "' target='_blank'><img src='" . show_img($db->f('image'), 50, 50) . " border='0'></a>";
                            ?>
                        </td>
                        <td width="2" valign="top">&nbsp;</td>
                        <td width="77%" valign="top"><b><font class=p14 color=#000000>
                            <?php echo "<a href='my_goods_list.php?id=" . $db->f('id') . "' class='softtitle' target='_blank'>" . stripslashes($db->f('name')) . "</a>"; ?>
                        </font></b><br>
                            List Price：$<strike><font color=red>
                                <?php echo $db->f('price_m'); ?>
                            </font></strike><br>
                            Price：$<font class=p13 color=#ff3333
                                      size=2><?php
                                if ($user_price)
                                    if (isset($login_name))
                                        echo $db->f('price');
                                    else
                                        echo "";
                                else
                                    echo $db->f('price');
                                ?>
                            </font><br>
                            State：<font color=red>
                                <?php
                                if ($db->f('state') == 0) echo "In stock";
                                if ($db->f('state') == 1) echo "Out of stock";
                                ?>
                            </font><br>
                            <a href="my_shopping.php?id=<?php echo $db->f('id') ?>" target="cart"><img
                                    src="images/gou.gif" width="60" height="22" border="0"></a>
                            <a href="my_shopping.php?id2=<?php echo $db->f('id') ?>" target="cart">
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
        <form action="<?php echo $PHP_SELF . "?category_num=$category_num" ?> " method="post" name="form8"
              onSubmit="return check_page('form8.page')">
            <tr>
                <td align="right"> Total:
                    <?php echo $total_num . " ";
                    $page1 = $page - 1;
                    $page2 = $page + 1;
                    if ($page1 < 1) echo "<FONT color=#999999>First Page&nbsp;Previous Page</FONT>&nbsp;";
                    else echo "<a href='$PHP_SELF?page=1&category_num=$category_num'>First Page</a>&nbsp;<a href='$PHP_SELF?page=$page1&category_num=$category_num'>Previous Page</a>&nbsp;";
                    if ($page2 > $totalpage) echo "<FONT color=#999999>Next Page&nbsp;Last page</FONT>&nbsp;";
                    else echo "<a href='$PHP_SELF?page=$page2&category_num=$category_num'>Next Page</a>&nbsp;<a href='$PHP_SELF?page=$totalpage&category_num=$category_num'>Last Page</a>&nbsp;";
                    ?>
                    Current Page:<b>
                        <?php echo $page . "/" . $totalpage ?>
                    </b>&nbsp;
                    <script language="JavaScript">
                        function check_page(name) {
                            eval("page=" + name + ".value");
                            if (isNaN(page) || page <= 0 || page > <?php echo $totalpage ?>) {
                                alert("Please input correct page，max is <?php echo $totalpage ?> ！");
                                eval(name + ".select()");
                                return false;
                            }
                        }
                    </script>
                    go to
                    <input type="text" name="page" size="2">
                    <input type="submit" name="Submit22" value="GO">
                </td>
            </tr>
        </form>
    </table>
</td>


<!-- cart section -->

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
                                                src="my_shopping.php"
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
    <table width="98%" border="0" cellpadding="1" cellspacing="0">
        <tr>
            <td bgcolor="#ff6000" height="57">
                <table width=100% border=0 cellspacing=0 cellpadding=0>
                    <tr>
                        <td height=20 bgcolor=#ff6000 align=center><font color="#FFFFFF">Friend Links</font></td>
                    </tr>
                    <tr>
                        <td height=2 bgcolor=#000000>
                            <spacer type=block width=1>
                        </td>
                    </tr>
                    <tr>
                        <tr bgcolor='#ffffff'><td height=40 align=center>
                        <a href="http://www.ebay.com" class="title" target=_blank>Ebay</a>
                        </td>
                    </tr>
                    <tr>
                        <tr bgcolor='#ffffff'><td height=40 align=center>
                        <a href="http://www.amzon.com" class="title" target=_blank>Amzon</a>
                        </td>
                    </tr>
                    <tr>
                        <tr bgcolor='#ffffff'><td height=40 align=center>
                        <a href="http://www.taobao.com" class="title" target=_blank>Taobao(China)</a>
                        </td>
                    </tr>

                    </tr>
                    <tr>
                        <td class=p7 bgcolor="#FFFFFF" align="right" height="24"><a href="links.php"><img
                                src="images/more.gif" width="50" height="10" border="0" alt="more..."></a>&nbsp;&nbsp;
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>



</td>
</tr>
</table>

<?php include "conf/footer.php"; ?>
</body>
