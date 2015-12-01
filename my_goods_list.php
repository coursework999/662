<?php
require "conf/config.php";
session_start();
?>
<html>
<head>
    <title><?php echo $sitename ?> -- Product View</title>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312">
    <?php echo $http_head; ?>
    <link rel="stylesheet" href="conf/style.css" type="text/css">
</head>
<body bgcolor="#FFFFFF" text="#000000">
<body>

<?php include "conf/header.php" ?>

<table width="750" border="0" align="center">
    <tr>
        <td width="182" valign="top">
            <table border=0 cellpadding=0 cellspacing=0 width=180>
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
                                            <td bgcolor=#ffffff valign=top><iframe frameborder=0
                                                                                   height=182 name=cart scrolling=no
                                                                                   src="my_shopping.php"
                                                                                   width="100%"></iframe></td>
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
        </td>
        <td width="558" align="center">

        <!--detail div-->
    <?php
    $db->query("select * from $goods_t where id=$id");
    $db->next_record();
    if ($db->num_rows()) {
        ?>
        <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">
            <tr>
                <td width="27%" align="center">
                    <?php
                    echo "<a href='".$db->f('image')."' target='_blank'><img src='".show_img($db->f('image'),100,100)." border='0'></a>";
                    ?>
                </td>
                <td width="73%" valign="top"><b><font class=p14 color=#000000>
                    <?php echo stripslashes($db->f('name')); ?>
                </font></b><br>
                    List Price： $<strike><font color=red>
                        <?php echo $db->f('price_m'); ?>
                    </font></strike><br>
                    Membership Price： $<font class=p13 color=#ff3333
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
                        if ($db->f('state')==0)  echo "In stock";
                        if ($db->f('state')==1)  echo "Out of stock";
                        ?>
                    </font><br>
                    <a href="my_shopping.php?id=<?php echo $db->f('id') ?>" target="cart"><img src="images/gou.gif" width="60" height="22" border="0"></a>
                    <a href="my_shopping.php?id2=<?php echo $db->f('id') ?>" target="cart">
                        <img src="images/sc.gif" width="60" height="22" border="0"></a> <br>
                </td>
            </tr>
            <tr>
                <td colspan="2"><img src="images/spacer.gif" width="1" height="1"></td>
            </tr>
            <tr >
                <td colspan="2" background="images/line1.gif"><img src="images/spacer.gif" width="1" height="1"></td>
            </tr>
            <tr>
                <td colspan="2" class="p14"><b>Product introduction</b></td>
            </tr>
            <tr bgcolor="#000000">
                <td colspan="2"><img src="images/spacer.gif" width="1" height="1"></td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;<font class=p14 color=#000000>
                    <?php echo stripslashes(nl2br($db->f('descript'))) ?>
                </font></td>
            </tr>
            <tr bgcolor="#000000">
                <td colspan="2"><img src="images/spacer.gif" width="1" height="1"></td>
            </tr>
        </table>
        <?php
    } else
        echo "the item doesn't exist!<br>";
    ?>
        </td>
    </tr>
</table>

<br>
<?php include "conf/footer.php"; ?>


</body>