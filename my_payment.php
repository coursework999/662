<?php
require "conf/config.php";
include "chk.php";
?>
<html>


<head>
    <title><?php echo $sitename ?> -- 购物完成</title>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312">
    <?php echo $http_head; ?>
    <link rel="stylesheet" href="conf/style.css" type="text/css">
</head>

<body>

<table width="750" border="0" align="center" cellspacing="0" cellpadding="0">
<tr align="center" bgcolor="#efefef">
<td bgcolor="#FFFFFF">
<?php
if ($basket_items == 0) {
    echo "<br><br><img src='images/emptcart.gif'>";
    echo  "<br><input class=stbtm name='go on shopping' onClick=\"window.location.href='my_index.php';\" type=button value='shopping'>";
    echo "<br>";
} else {
    ?>
<!-- your cart table-->
<table width="630" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>
            <table cellpadding=0 cellspacing=0 width=630>
                <tbody>
                <tr>
                    <td align=left width="80%"><b><font class=p14 color=#cc0000>your order :</font></b></td>
                </tr>
                <tr bgcolor=#cc0000>
                    <td height=2 valign=top></td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table width="100%" border="0" cellspacing="1" cellpadding="0">
                <tr>
                    <td bgcolor="#e4e4e4"><font color=#000000
                                                size=2>name</font></td>
                    <td width="15%" align="center" bgcolor="#e4e4e4">price</td>
                    <td width="15%" align="center" bgcolor="#e4e4e4"><font color=#000000
                                                                           size=2>prime</font></td>
                    <td width="15%" align="center" bgcolor="#e4e4e4"><font color=#000000
                                                                           size=2>count</font></td>
                    <td width="15%" align="center" bgcolor="#e4e4e4"><font color=#000000
                                                                           size=2>summary</font></td>
                </tr>
                <?php
                $price_all = 0;
                $price_sum = 0;
                $sendtmp = "";
                for ($basket_counter = 0; $basket_counter < $basket_items; $basket_counter++) {
//把购物车中的商品的id添加到shopping表中
                    $db2->query("insert into $shopping_t          values(null,0,$login_id,$basket_id[$basket_counter],$basket_amount[$basket_counter],'$date_tmp')");

                    $amount = $basket_amount[$basket_counter];
                    ;
                    $db->query("select name,price_m,price from $goods_t where id=$basket_id[$basket_counter]");
                    $db->next_record();
                    $price_all = $price_all + $db->f('price') * $amount;
                    $price_sum = $price_sum + $db->f('price') * $amount;
                    $sendtmp .= "<tr >
      <td width=\"60%\"><b>" . stripslashes($db->f('name')) . "</b></td>
      <td width=\"20%\"><font color=\"red\">" . $db->f('price') . "</font>$</td>
      <td width=\"20%\">" . $basket_amount[$basket_counter] . "</td>
    </tr>\n";
                    ?>
                    <tr>
                        <td><b>
                            <?php echo stripslashes($db->f('name')); ?>
                        </b></td>
                        <td width="15%" align="center"><font color=#000000
                                                             size=2><strike>$<?php echo $db->f('price_m'); ?></strike>
                        </font></td>
                        <td width="15%" align="center"><b><font
                                color=#cc0000>$<?php echo $db->f('price'); ?></font></b></td>
                        <td width="15%" align="center">
                            <?php echo $basket_amount[$basket_counter] ?>
                        </td>
                        <td width="15%" align="center">
                            <?php echo $db->f('price') * $amount; ?>
                        </td>
                    </tr>
                    <?php
                }
                $price_all_format = sprintf("%01.2f", $price_all);
                $flag = 1;
                for ($basket_counter = 0; $basket_counter < $basket_items; $basket_counter++)
                    if ($basket_amount[$basket_counter] >= $jiti_num) {
                        $price_all = $price_all * (1 - $jiti_rebate);
                        $flag = 0;
                    }

//如果购买同一商品超过指定的个数，则优惠用户所设的优惠值$jiti_rebate
                if ($price_all >= 1000 and $flag) $price_all = $price_all * (1 - $rebate);
//单张定单总额超过1000元的折扣

//把用户的订单的送货信息添加到requests表中
                $a = split(',', $province);
                $province = $a[1];
                $db2->query("insert into $requests_t
           values(null,$login_id,'$name',$sex,'$email','$province','$city','$tel',
               '$address','$post','$attrib',$price_all,$pay,0,0,'$date_tmp')");
                $key_requests = $db2->insert_id();
//得到此次的订单号

                $db->query("select id from $shopping_t where user_id=$login_id and requests_id=0");
                while ($db->next_record()) {
                    $id_shopping = $db->f('id');
                    $db2->query("update $shopping_t set requests_id=$key_requests where id=$id_shopping");
                }
//用生成的订单号，更新shopping表中的每条记录

                $basket_items = 0;
                array_splice($basket_amount, 0);  //删除购物车的数组的所有元素
                array_splice($basket_id, 0);
                unset($basket_amount);
                unset($basket_id);
//当生成订单后，把购物车的内容清空
                ?>
                <tr>
                    <td colspan="5" width="100%" height="1" background="images/speaking_bg.gif"></td>
                </tr>
                <tr>
                    <td colspan="5">&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp; </td>
                    <td>&nbsp; </td>
                    <td>&nbsp;</td>
                    <td colspan="2">
                        <?php echo "summary：<b><font color=red>$$price_all_format</font></b>";?>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

    <!-- the basic info for order-->
<br>
<table width="630" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr>
        <td align="center"><img src="images/new_shouhuo.gif" width="258" height="30"></td>
    </tr>
    <tr>
        <td>
            <table cellspacing="0" cellpadding="0" width="630">
                <tr>
                    <td align="left" width="80%"><b><font color="#CC0000" class="p14">congratulation! you have finish your order：</font></b></td>
                </tr>
                <tr bgcolor="#CC0000">
                    <td colspan="4" height="2" valign="top"></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr align="center">
        <td>&nbsp;</td>
    </tr>
    <tr align="center">
        <td>this is the detail of this order</td>
    </tr>
    <tr>
        <td>
            <table cellspacing="0" cellpadding="2" width="100%" border="1" style="font-size:9pt"
                   bordercolorlight="#D2D2D2" bordercolordark="#FFFFFF">
                <tr>
                    <td width="116" bgcolor="f5f5f5">username</td>
                    <td width="500" bgcolor="f5f5f5">
                        <?php echo $login_name; ?>
                    </td>
                </tr>

                <tr bgcolor="f5f5f5">
                    <td width="116"> receiver </td>
                    <td width="500">
                        <?php
                        if ($sex == 1) echo "Mr"; else echo "Mrs";
                        echo  $name;  ?>
                    </td>
                </tr>
                <tr>
                    <td width="116">state</td>
                    <td width="500">
                        <?php echo  $province; ?>
                    </td>
                </tr>
                <tr bgcolor="f5f5f5">
                    <td width="116">city</td>
                    <td width="500">
                        <?php echo  $city; ?>
                    </td>
                </tr>
                <tr>
                    <td width="116">email</td>
                    <td width="500">
                        <?php echo  $email; ?>
                    </td>
                </tr>
                <tr>
                    <td width="116" bgcolor="f5f5f5">address</td>
                    <td width="500" bgcolor="f5f5f5">
                        <?php echo  $address; ?>
                    </td>
                </tr>
                <tr>
                    <td width="116">zip code</td>
                    <td width="500">
                        <?php echo  $post; ?>
                    </td>
                </tr>
                <tr>
                    <td width="116" bgcolor="f5f5f5">contact number</td>
                    <td width="500" bgcolor="f5f5f5">
                        <?php echo  $tel; ?>
                    </td>
                </tr>
                <tr>
                    <td width="116">order number</td>
                    <td width="500"><b><font size="4" color="red">
                        <?php echo  $key_requests + $init_num; ?>
                    </font></b> (please remember your order number)
                    </td>
                </tr>
                <tr>
                    <td width="116" bgcolor="f5f5f5">order time</td>
                    <td width="500" bgcolor="f5f5f5">
                        <?php echo  $date_tmp; ?>
                    </td>
                </tr>
                <tr>
                    <td width="116">message</td>
                    <td width="500">
                        <?php echo  $attrib; ?>
                        &nbsp;</td>
                </tr>
                <tr>
                    <td width="116" bgcolor="f5f5f5">all</td>
                    <td width="500" bgcolor="f5f5f5">all（<font color="red" size="4">
                        <?php echo  $price_all + $send_money; ?>
                        $</font>）=item （<font color="red" size="4">
                        <?php echo  $price_all; ?>
                    </font>)$+delivery（<font color="red" size="4">
                        <?php echo  $send_money; ?>
                    </font>$）

                        <?php
                        if ($price_sum >= 1000 and $flag) echo "expanse more than 1000 $，debate 10%";
                        if (!$flag) echo "buy the same item more than ten times, debate 20%";
                        ?>
                        )
                    </td>
                </tr>
                <tr>
                    <td width="116">delivery</td>
                    <td width="500">UPS</td>
                </tr>
                <tr>
                    <td width="116">&nbsp;</td>
                    <td width="500">&nbsp;</td>
                </tr>
                <tr>
                    <td width="116" bgcolor="f5f5f5" valign="top">payment method</td>
                    <td width="500" bgcolor="f5f5f5">
                        <?php echo nl2br($pay_str[$pay]); ?>
                    </td>
                </tr>
                <tr>
                    <td width="116">&nbsp;</td>
                    <td width="500">&nbsp;</td>
                </tr>

                <tr>
                    <td colspan="2" bgcolor="f5f5f5" align="center"><b><font color="#cc0000">please pay soon. So that we can deal with the order</font></b></td>
                </tr>
            </table>
        </td>
    </tr>


</table>

    <?php } ?>
</td>
</tr>
</table>


<br>

</body>
</html>
