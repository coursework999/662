<?php
require "conf/config.php";
include "chk.php";
session_start();

switch ($op) {
    case "add":
//把商品的id加入购物车
        if ($id != "") {
            if (session_is_registered("basket_items"))
                require("addto_basket.inc");
            else
                require("new_basket.inc");
        }
        break;
    case "del":
        require("del_basket.inc");
        break;
    case "clear":
        $basket_items = 0;
        array_splice($basket_amount, 0); //删除购物车的数组的所有元素
        array_splice($basket_id, 0);
        unset($basket_amount);
        unset($basket_id);
        break;
    case "update":
        for ($basket_counter = 0; $basket_counter < $basket_items; $basket_counter++) {
            $basket_amount[$basket_counter] = $num[$basket_counter];
        }
        break;
}

switch ($op2) {
    case "add":

        $f = 1; //确定该商品的id是否存在收藏夹中
        $scsp = split("&&", $scj);
        for ($j = 0; $j < count($scsp); $j++)
            if ($scsp[$j] == $prod) $f = 0;
        if ($f) //表示商品的id不存在收藏夹中，则添加到收藏夹中
            if ($scj)
                setcookie("scj", $scj . "&&" . $prod, time() + 60 * 60 * 24 * 365); //设置cookie的有效时间为一年
            else
                setcookie("scj", $prod, time() + 60 * 60 * 24 * 365); //设置cookie的有效时间为一年
        break;
    case "del":

        $scsp = split("&&", $scj);
        for ($j = 0; $j < count($scsp); $j++) {
            if ($scsp[$j] != $prod) $new_scsp[] = $scsp[$j];
        }
        if (is_array($new_scsp))
            $tmp = @implode("&&", $new_scsp);
        else
            $tmp = "";
        setcookie("scj", $tmp, time() + 60 * 60 * 24 * 365); //设置cookie的有效时间为一年
        break;
}
if ($op2) echo '<script language="javascript"> location.href="my_buystore.php";</script>';
?>


<html>
<head>
    <title><?php echo $sitename ?> -- Favorite</title>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312">
    <?php echo $http_head; ?>
    <link rel="stylesheet" href="conf/style.css" type="text/css">
</head>
<body>
<?php include "conf/header.php" ?>
<table width="630" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr>
        <td>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr align="center">
                    <td>
                        <p>&nbsp;</p>

                        <p><img src="images/new_my_scj.gif" width="183" height="30">
                            <script language=javascript>
                                function PutInStore(a, prod) {
                                    document.frmbuy.action = 'my_buystore.php?op=del&counter=' + a + '&op2=add&prod=' + prod;
                                    document.frmbuy.submit();
                                }

                                function DelProduct(a) {
                                    document.frmbuy.action = 'my_buystore.php?op=del&counter=' + a;
                                    document.frmbuy.submit();
                                }

                                function ClearCart() {
                                    if (confirm('Sure to empty all products in the Cart？')) {
                                        document.frmbuy.action = 'my_buystore.php?op=clear';
                                        document.frmbuy.submit();
                                    }
                                }

                                function ChangeN() {
                                    if (confirm('Sure to update product number？')) {
                                        document.frmbuy.action = "my_buystore.php?op=update";
                                        document.frmbuy.submit();
                                    }
                                }

                                function buy2(prod) {
                                    document.form2.action = 'my_buystore.php?op2=del&prod=' + prod;
                                    document.form2.submit();
                                }

                                function buy22(prod) {
                                    document.form2.action = 'my_buystore.php?op2=del&prod=' + prod + '&op=add&id=' + prod;
                                    document.form2.submit();
                                }
                            </script>
                        </p>
                    </td>
                </tr>

            </table>
        </td>
    </tr>
    <tr>
        <td height="2">
            <table >
                <form action="" method=post name="form2">
                    <tr>
                        <th >name</th>
                        <th >price</th>
                        <th >prime</th>
                        <th >operation</th>
                    </tr>
                    <?php
                    $scsp = split("&&", $scj);
                    $m = ($scj == "") ? 0 : count($scsp);
                    for ($j = 0; $j < $m; $j++) {
                        $prod = $scsp[$j];
                        $db->query("select name,price_m,price from $goods_t where id=$prod");
                        $db->next_record();
                        ?>
                        <tr>
                            <td align=left height=20 width="50%"><b>
                                <?php echo stripslashes($db->f('name')); ?>
                            </b></td>
                            <td width="8%"><font color=#000000
                                                 size=2><strike>$<?php echo $db->f('price_m'); ?></strike> </font></td>
                            <td width="8%"><b><font
                                    color=#cc0000>$ <?php echo $db->f('price'); ?></font></b></td>
                            <td align=middle height=20 width="10%">
                                <input class=stbtm name=清除 onClick="buy2('<?php echo $prod ?>');return false;"
                                       type=button value=delete>
                                <input class=stbtm1 name=放入购物车 onClick="buy22('<?php echo $prod ?>');return false;"
                                       type=button value="add to cart">
                            </td>
                        </tr>
                        <?php } ?>
                    <tr valign=bottom>
                        <td background=images/speaking_bg.gif colspan=4 height=1
                            width="100%"></td>
                    </tr>
                </form>
            </table>
        </td>
    </tr>
    <tr align="center">
        <td>&nbsp; </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
</table>

<?php include "conf/footer.php"; ?>
</body>
</html>
