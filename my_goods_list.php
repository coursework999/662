<?php
require "conf/config.php";
session_start();
?>

<body>

<!-- cart div-->
<!--<div>-->
<!--    <table>-->
<!--        <tbody>-->
<!--        <tr>-->
<!--            <td bgcolor=#ff6600 height=22 valign=top width="5%"><img height=19-->
<!--                                                                     src="images/jiao.gif" width=5></td>-->
<!--            <td bgcolor=#ff660 height=22 valign=center width="15%"><img-->
<!--                    height=21 src="images/bikegif.gif" width=35></td>-->
<!--            <td bgcolor=#ff6600 height=22 valign=center width="80%"><img-->
<!--                    height=1 src="images/spacer.gif" width=3><img height=18-->
<!--                                                                  src="images/gwc_new.gif" width=116></td>-->
<!--        </tr>-->
<!--        <tr valign=top>-->
<!--            <td colspan=3>-->
<!--                <table align=center border=0 cellpadding=0 cellspacing=0-->
<!--                       width="100%">-->
<!--                    <tbody>-->
<!--                    <tr>-->
<!--                        <td bgcolor=#ffcc00><img height=1-->
<!--                                                 src="images/spacer.gif" width=1></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td bgcolor=#ffcc00 valign=top>-->
<!--                            <table align=center border=0 cellpadding=0 cellspacing=0-->
<!--                                   width="99%">-->
<!--                                <tbody>-->
<!--                                <tr>-->
<!--                                    <td bgcolor=#ffffff valign=top>-->
<!--                                        <iframe frameborder=0-->
<!--                                                height=182 name=cart scrolling=no-->
<!--                                                src="my_shopping.php"-->
<!--                                                width="100%"></iframe>-->
<!--                                    </td>-->
<!--                                </tr>-->
<!--                                </tbody>-->
<!--                            </table>-->
<!--                        </td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td bgcolor=#ffcc00 height=1><img height=1-->
<!--                                                          src="images/spacer.gif"-->
<!--                                                          width=1></td>-->
<!--                    </tr>-->
<!--                    </tbody>-->
<!--                </table>-->
<!--            </td>-->
<!--        </tr>-->
<!--        </tbody>-->
<!--    </table>-->
<!--</div>-->


<!--detail div-->
<div>
    <?php
    $db->query("select * from $goods_t where id=$id");
    $db->next_record();
    if ($db->num_rows()) {
        ?>
        <table>
            <tr>
                <td>
                    <?php
                    echo "<a href='" . $db->f('image') . "' target='_blank'><img src='" . show_img($db->f('image'), 100, 100) . " border='0'></a>";
                    ?>
                </td>
                <td>
                    <?php echo stripslashes($db->f('name')); ?>
                    <br>
                    price :<?php echo $db->f('price_m'); ?> $
                    <br>
                    prime :<?php
                    if ($user_price)
                        if (isset($login_name))
                            echo $db->f('price');
                        else
                            echo "";
                    else
                        echo $db->f('price');
                    ?>
                    $<br>
                    count :
                    <?php
                    if ($db->f('state') == 0) echo "many";
                    if ($db->f('state') == 1) echo "none";
                    ?>
                    <br>
                    <a href="my_shopping.php?id=<?php echo $db->f('id') ?>" target="cart"><img src="images/gou.gif"
                                                                                            width="60"
                                                                                            height="22"
                                                                                            border="0"></a>
                    <a href="my_shopping.php?id2=<?php echo $db->f('id') ?>" target="cart">
                        <img src="images/sc.gif" width="60" height="22" border="0"></a> <br>
                </td>
            </tr>

            <tr>
                <th>Detail</th>
            </tr>

            <tr>
                <td>
                    <?php echo stripslashes(nl2br($db->f('descript'))) ?>
                </td>
            </tr>

        </table>
        <?php
    } else
        echo "the item doesn't exist!<br>";
    ?>
</div>


</body>