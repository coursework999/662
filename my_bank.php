<?php
require "conf/config.php";
//check wether you have login or not.
include "my_chk.php";
?>


<html>
<head>
    <title><?php echo $sitename ?> -- 收银台</title>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312">
    <?php echo $http_head; ?>
    <link rel="stylesheet" href="conf/style.css" type="text/css">
</head>


<body>

<?php
if ($basket_items == 0) {
    echo "<center><br><br><img src='images/emptcart.gif'>";
    echo  "<br><input class=stbtm name='继续购买' onClick=\"window.location.href='index.php';\" type=button value=继续购买>";
    echo "</center><br>";
} else {

    ?>


<!--my cart-->
<table>
    <td height="2">
        <table>
            <form name="frmbuy" method="post">
                <tr>
                    <th>name</th>
                    <th>price</th>
                    <th>prime</th>
                    <th>count</th>
                    <th>sum</th>
                    <th>operation</th>
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
                                   onChange=" if(isNaN(this.value) || this.value>1000 ||this.value.indexOf('.') >= 0 || this.value.indexOf('-') >= 0) {alert('请输入小于1000的正整数！');this.focus();return false;}else{return true;}"
                                   size=3 value="<?php echo $basket_amount[$basket_counter] ?>">
                        </td>
                        <td width="8%">
                            <?php echo $db->f('price') * $amount; ?>
                        </td>
                        <td>
                            <input class=stbtm name=del
                                   onClick=" if (confirm('delete this item ？')) DelProduct('<?php echo $basket_counter ?>');"
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
                    <td colspan="2"> total：<b>$<?php echo $price_all_format ?>
                    </b></td>
                </tr>
                <tr>
                    <td colspan="6" height="1" background="images/speaking_bg.gif"></td>
                </tr>
                <tr>
                    <td colspan="6"><br>
                        <table width="100%" border="0">
                            <tr>
                                <td>if your change the count ，please click
                                    <input class=stbtm name=更新 onClick="ChangeN();return false;" type=button
                                           value="update"  <?php if ($basket_items == 0) echo "disabled"; ?>>
                                </td>
                                <td>
                                    <input class=stbtm name=继续购买 onClick="window.location.href='my_index.php';"
                                           type=button value="go shopping">
                                </td>
                                <td>
                                    <input class=stbtm name=放弃购买 onClick=" ClearCart();return false;" type=submit
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



    <?php
}
?>


<!--add some info for payment-->
<p><img src="images/new_shouhuo.gif" width="258" height="30">
</p>
<table>
<tr align="center">
<td>

<?php
$db->query("select * from $requests_t where user_id=$login_id order by id DESC");
$db->next_record();
$num = $db->num_rows();
?>
<script language="JavaScript">
    function old_user() {
        document.formlogin.name.value = "<?php echo  $db->f('name') ?>";
        document.formlogin.sex.value =<?php echo ($db->f('sex')) ? $db->f('sex') : "0" ?>;
        document.formlogin.email.value = "<?php echo  $db->f('email') ?>";
        lth = document.formlogin.province.length;
        for (i = 0; i <= lth; i++)
            document.formlogin.province.remove(0);
        var oOption = document.createElement("OPTION");
        oOption.text = "State ";
        document.formlogin.province.add(oOption);
        oOption.selected = 0;
        oOption.empty;
        for (i = 1; i <= prvcnt; i++) {
            var oOption = document.createElement("OPTION");
            oOption.text = prvarr[i].name;
            oOption.value = prvarr[i].id + "," + prvarr[i].name;
            document.formlogin.province.add(oOption);
            if (prvarr[i].name == "<?php echo $db->f('province') ?>") {
                oOption.selected = 1;
                //oOption.empty;
            }

        }
        ctychg(document.formlogin.province.value, "<?php echo $db->f('city') ?>");
        document.formlogin.tel.value = "<?php echo $db->f('tel') ?>";
        document.formlogin.address.value = "<?php echo  $db->f('address') ?>";
        document.formlogin.post.value = "<?php echo $db->f('post') ?>";
        set_sele_pay(<?php echo intval($db->f('pay')) ?>);
        document.formlogin.attrib.value = "";
        document.formlogin.name.focus();
    }
    function set_sele_pay(pay) {
        for (i = 0; i < formlogin.pay.length; i++)
            if (formlogin.pay[i].value == pay) formlogin.pay[i].checked = true;
    }
</script>
<?php
$db->query("select * from $user_t where id=$login_id");
$db->next_record();
?>
<script language="JavaScript">
    function my_info() {
        document.formlogin.name.value = "<?php echo  $db->f('name') ?>";
        document.formlogin.sex.value =<?php if ($db->f('sex')) echo $db->f('sex'); else "0"; ?>;
        document.formlogin.email.value = "<?php echo  $db->f('email') ?>";
        lth = document.formlogin.province.length;
        for (i = 0; i <= lth; i++)
            document.formlogin.province.remove(0);
        var oOption = document.createElement("OPTION");
        oOption.text = "请选择省份";
        document.formlogin.province.add(oOption);
        oOption.selected = 0;
        oOption.empty;
        for (i = 1; i <= prvcnt; i++) {
            var oOption = document.createElement("OPTION");
            oOption.text = prvarr[i].name;
            oOption.value = prvarr[i].id + "," + prvarr[i].name;
            document.formlogin.province.add(oOption);
            if (prvarr[i].name == "<?php echo $db->f('province') ?>") {
                oOption.selected = 1;
                //oOption.empty;
            }

        }
        ctychg(document.formlogin.province.value, "<?php echo $db->f('city') ?>");
        document.formlogin.tel.value = "<?php echo $db->f('tel') ?>";
        document.formlogin.address.value = "<?php echo  $db->f('address') ?>";
        document.formlogin.post.value = "<?php echo $db->f('post') ?>";
        document.formlogin.pay[0].checked = true;
        document.formlogin.attrib.value = "";
        document.formlogin.name.focus();
    }
    function new_user() {
        document.formlogin.name.value = "";
        document.formlogin.sex.value = 0;
        document.formlogin.email.value = "";
        lth = document.formlogin.province.length;
        for (i = 0; i <= lth; i++)
            document.formlogin.province.remove(0);
        var oOption = document.createElement("OPTION");
        oOption.text = "请选择省份";
        document.formlogin.province.add(oOption);
        oOption.selected = 1;
        oOption.empty;
        for (i = 1; i <= prvcnt; i++) {
            var oOption = document.createElement("OPTION");
            oOption.text = prvarr[i].name;
            oOption.value = prvarr[i].id + "," + prvarr[i].name;
            document.formlogin.province.add(oOption);
            oOption.selected = 0;
            oOption.empty;
        }
        ctychg(document.formlogin.city.value, 0);
        document.formlogin.tel.value = "";
        document.formlogin.address.value = "";
        document.formlogin.post.value = "";
        document.formlogin.pay[0].checked = true;
        document.formlogin.attrib.value = "";
        document.formlogin.name.focus();
    }
    function checkName() {
        var args = checkName.arguments
        var strWord;
        var s;
        var lStringLength;
        var i;
        var bReturn;

        if (args.length > 0) {
            strWord = args[0];
            lStringLength = strWord.length;
            if (lStringLength > 0) {
                for (i = 0; i < lStringLength; i++) {
                    s = strWord.charCodeAt(i);
                    bReturn = true;
                    if (s < 255)
                        bReturn = false;

                    if (!bReturn) {
                        alert('为了购物顺畅，请输入真实的姓名！');
                        return false;
                    }

                }
            }
        }
        return true;
    }
</script>
<form name="formlogin" method="post" action="my_payment.php" onSubmit=return(check());>
    <table width="100%" border="0">
        <tr>
            <td>Name：</td>
            <td width="86%" height="18">
                <input type="text" name="name" class="think" maxlength="20" size="12"
                       onChange="JavaScript:if(!checkName(this.value)) return false;">
                <font color="#CC0000">*</font></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><a href="javascript:new_user()"><font color=#cc0000><u>new an address</u></font></a>&nbsp;
                <?php if ($num)
                    echo "<a href=\"javascript:old_user()\" ><font color='#cc0000'><u>use last address</u></font></a>";
                else
                    echo "<font color='#cc0000'>use last address</font>";
                ?>
                &nbsp; <a href="javascript:my_info()"><font color="#cc0000"><u>use my address</u></font></a></td>
        </tr>
        <tr>
            <td>gender ：</td>
            <td>
                <select name="sex">
                    <option value="0" selected>choose</option>
                    <option value="1">male</option>
                    <option value="2">female</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>E-mail：</td>
            <td>
                <input type="text" name="email" class="think" maxlength="60" size="30">
            </td>
        </tr>
        <tr>
            <td>State：</td>
            <td>
        </tr>
        <tr>
            <td>city：</td>
            <td>
                <select id=city name=city class="think">
                </select>
                <script language=javascript>
                    ctychg(document.formlogin.province.value, 0);
                </script>

            </td>
        </tr>
        <tr>
            <td>telephone：</td>
            <td>
                <input type="text" name="tel" class="think" maxlength="40" size="20">
            </td>
        </tr>
        <tr>
            <td>address：</td>
            <td>
                <input type="text" name="address" class="think" maxlength="100" size="40">
                <font color="#CC0000">*</font></td>
        </tr>
        <tr>
            <td>zip code：</td>
            <td>
                <input type="text" name="post" class="think" maxlength="6" size="8">
                <font color="#CC0000">*</font></td>
        </tr>
        <tr>
            <td><b>payment method： </b></td>
        </tr>

        <tr>
            <td>your card :</td>
            <td><input type=input> </input></td>
        </tr>

        <tr>
            <td><b>delivery：</b></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>　　　UPS<br>
            </td>
        </tr>
        <tr>
            <td width="14%">&nbsp;</td>
            <td width="86%">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2">
                <table width="630" border="0" cellspacing="0" cellpadding="0" align="center">
                    <tr>
                        <th colspan="4" bgcolor="#FFFFFF" height="22" valign="top">
                        </th>
                    </tr>
                    <tr bgcolor="#CC0000">
                        <td colspan="4" height="2" valign="top"></td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr align="center">
            <td colspan="2" height="34">
                <input type="submit" name="Submit" value=" pay " class=stbtm2>
            </td>
        </tr>
    </table>
</form>
</td>
</tr>
</table>


</body>
</html>
