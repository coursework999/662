<!-- response to the params -->


<?php
require "conf/config.php";
include "chk.php";
session_start();


switch ($op) {
    case "add":
//����Ʒ��id���빺�ﳵ
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
        array_splice($basket_amount, 0); //ɾ�����ﳵ�����������Ԫ��
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

        $f = 1; //ȷ������Ʒ��id�Ƿ�����ղؼ���
        $scsp = split("&&", $scj);
        for ($j = 0; $j < count($scsp); $j++)
            if ($scsp[$j] == $prod) $f = 0;
        if ($f) //��ʾ��Ʒ��id�������ղؼ��У�����ӵ��ղؼ���
            if ($scj)
                setcookie("scj", $scj . "&&" . $prod, time() + 60 * 60 * 24 * 365); //����cookie����Чʱ��Ϊһ��
            else
                setcookie("scj", $prod, time() + 60 * 60 * 24 * 365); //����cookie����Чʱ��Ϊһ��
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
        setcookie("scj", $tmp, time() + 60 * 60 * 24 * 365); //����cookie����Чʱ��Ϊһ��
        break;
}
//if ($op2) header("Location: my_buycar.php");
//if ($op2) echo '<meta http-equiv="refresh" content="0;URL=my_buycar.php">';
if ($op2) echo '<script language="javascript"> location.href="my_buycar.php";</script>';
?>


<html>
<head>
    <title><?php echo $sitename ?> -- Shopping Cart</title>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312">
    <?php echo $http_head; ?>
    <link rel="stylesheet" href="conf/style.css" type="text/css">
</head>

<body>
<?php include "conf/header.php" ?>
<div align="center">

    <p><img src="images/new_my_gwc.gif" width="172" height="30">
        <script language=javascript>
            function PutInStore(a, prod) {
                document.frmbuy.action = 'my_buycar.php?op=del&counter=' + a + '&op2=add&prod=' + prod;
                document.frmbuy.submit();
            }

            function DelProduct(a) {
                document.frmbuy.action = 'my_buycar.php?op=del&counter=' + a;
                document.frmbuy.submit();
            }

            function ClearCart() {
                if (confirm('clear all the items ��')) {
                    document.frmbuy.action = 'my_buycar.php?op=clear';
                    document.frmbuy.submit();
                }
            }

            function ChangeN() {
                if (confirm('update the count��')) {
                    document.frmbuy.action = "my_buycar.php?op=update";
                    document.frmbuy.submit();
                }
            }

            function buy2(prod) {
                document.form2.action = 'my_buycar.php?op2=del&prod=' + prod;
                document.form2.submit();
            }

            function buy22(prod) {
                document.form2.action = 'my_buycar.php?op2=del&prod=' + prod + '&op=add&id=' + prod;
                document.form2.submit();
            }
        </script>
    </p>
</div>

<!--my cart-->
<table align="center">
    <td height="2">
        <table>
            <form name="frmbuy" method="post">
                <tr>
                    <th>name</th>
                    <th>price</th>
                    <th>prime</th>
                    <th>count</th>
                    <th>sum</th>
                    <th >operation</th>
                </tr>

                <?php
                $price_all = 0;
                for ($basket_counter = 0; $basket_counter < $basket_items; $basket_counter++) {
                    $amount = $basket_amount[$basket_counter];
                    ;
                    $db->query("select name,price_m,price from $goods_t where id=$basket_id[$basket_counter]");
                    $db->next_record();
                    $price_all = $price_all + $db->f('price') * $amount;
                    ?>
                    <tr>
                        <td width="40%"><b>
                            <?php echo stripslashes($db->f('name')); ?>
                        </b></td>
                        <td width="8%">$<?php echo $db->f('price_m'); ?></STRIKE> </td>
                        <td width="8%"><B>
                                $<?php echo $db->f('price'); ?></B></td>
                        <td width="8%">
                            <input maxlength=4 name="num[]"
                                   onChange=" if(isNaN(this.value) || this.value>1000 ||this.value.indexOf('.') >= 0 || this.value.indexOf('-') >= 0) {alert('������С��1000����������');this.focus();return false;}else{return true;}"
                                   size=3 value="<?php echo $basket_amount[$basket_counter] ?>">
                        </td>
                        <td width="8%">
                            <?php echo $db->f('price') * $amount; ?>
                        </td>
                        <td >
                            <input class=stbtm name=del
                                   onClick=" if (confirm('delete this item ��')) DelProduct('<?php echo $basket_counter ?>');"
                                   type=button value="cancel">
                            <input class=stbtm1 name=puttocar
                                   onClick="PutInStore('<?php echo $basket_counter ?>','<?php echo $basket_id[$basket_counter] ?>')"
                                   type=button value="add to favorite">
                        </td>
                    </tr>
                    <?php
                }
                $price_all_format = sprintf("%01.2f", $price_all);
                ?>
                <tr>
                    <td width="40%">&nbsp;</td>
                    <td width="8%">&nbsp;</td>
                    <td width="8%">&nbsp;</td>
                    <td width="8%">&nbsp;</td>
                    <td colspan="2"> total��<b>$<?php echo $price_all_format ?>
                    </b></td>
                </tr>
                <tr>
                    <td colspan="6" height="1" background="images/speaking_bg.gif"></td>
                </tr>
                <tr>
                    <td colspan="6"><br>
                        <table width="100%" border="0">
                            <tr>
                                <td>if your change the count ��please click
                                    <input class=stbtm name=���� onClick="ChangeN();return false;" type=button
                                           value="update"  <?php if ($basket_items == 0) echo "disabled"; ?>>
                                </td>
                                <td>
                                    <input class=stbtm name=�������� onClick="window.location.href='my_index.php';"
                                           type=button value="go shopping">
                                </td>
                                <td>
                                    <input class=stbtm name=�������� onClick=" ClearCart();return false;" type=submit
                                           value="give up" <?php if ($basket_items == 0) echo "disabled"; ?>>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </form>
        </table>
    </td>
    </tr>
    <tr align="center">
        <td>
            <input class=stbtm2 name=bank onClick="window.location.href='my_bank.php';" type=button
                   value="pay" <?php if ($basket_items == 0) echo "disabled"; ?>>
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
</table>


<?php include "conf/footer.php"; ?>
</body>
</html>
