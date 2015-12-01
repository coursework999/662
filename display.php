
<html>
<head>
    <title><?php echo $sitename ?> -- cart</title>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312">
    <link rel="stylesheet" href="conf/style.css">
</head>


<body>


<!-- the items in your cart -->
<?php

if ($basket_items > 0) {
    $price_all = 0;
    $tmp = "";
    if ($basket_items <= 5) {
        echo "$you has $basket_items kinds of items in your cart<br>";
        for ($n = $basket_items; $n < 5; $n++)
            $tmp .= "&nbsp;<BR>";
    } else
        echo "there are $basket_items kind of items in your barket<br>";
    $h = ($basket_items < 5) ? $basket_items : 5;
    for ($basket_counter = 0; $basket_counter < $h; $basket_counter++) {
        $amount = $basket_amount[$basket_counter];
        $db->query("select name,price from $goods_t where id=$basket_id[$basket_counter]");
        $db->next_record();
        $name = stripslashes($db->f('name'));
        if (strlen($name) > 16) $name = substr_2($name, 16) . '...';
        $price_all = $price_all + $db->f('price') * $amount;
        $delete_it = "<A href=\"my_goods_list.php?id=$basket_id[$basket_counter]\" class='clink03'  target='_blank'>$name</A>";
        echo "&nbsp;&nbsp;<b><font color=red>$amount</font></b>&nbsp&nbsp&nbsp";
        echo $delete_it;
        echo "<BR> ";
    }

    //统计出购物车中未显示出来的产品的价格总和
    for ($basket_counter = $h; $basket_counter < $basket_items; $basket_counter++) {
        $amount = $basket_amount[$basket_counter];
        $db->query("select name,price from $goods_t where id=$basket_id[$basket_counter]");
        $db->next_record();
        $price_all = $price_all + $db->f('price') * $amount;
    }
    $price_all_format = sprintf("%01.2f", $price_all);
    echo "total cost：<b>$ $price_all_format</b><br>";

    echo "<a href='my_bank.php' target='_blank'>pay for them</a>";
    echo " | <a href='my_buycar.php' target='_blank'>go on shopping</a>";
}
else {
    $basket_items = 0;
    unset($basket_amount);
    unset($basket_id);
    echo "<center><br><br><img src='images/emptcart.gif'><br><br><br></center>";
}
echo $tmp;
?>

<!-- foot for the favourite -->
<TABLE>
    <TR>
        <TD ></TD>
    </TR>
    <TR>
        <TD>
            <?php
            $n = ($scj == "") ? 0 : count(split("&&", $scj));
            if ($n)
                echo "<a href='my_buystore.php' target='_blank'>there are " . $n . " items in your favourite &gt;&gt; </a>";
            else
                echo "there are 0 item in your favourite &gt;&gt; ";
            ?>
        </TD>
    </TR>
</TABLE>


</body>
</html>