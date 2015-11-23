<?php
    require "conf/config.php";
    include "admin_check.php";

if ($action=="del")
{
    //delete用户订单表的订单
    $db->query("delete from $requests_t where id=($id-$init_num)");
    //delete用户shopping表的商品id
    $db->query("delete from $shopping_t where requests_id=($id-$init_num)");
}
if ($do=="update")
{
    $db->query("update $requests_t set $action=$value where id=($id-$init_num)");
//给用户发邮件通知用户
    if ($action=="send_out" && $value==1)
    {
        //从订单库$requests_t中取出用户的一些信息
        $db->query("select name,email,tel,post,address,fee  from $requests_t where id=($id-$init_num)");
        $db->next_record();
        $email=$db->f('email');
        $name=$db->f('name');
        $tel=$db->f('tel');
        $post=$db->f('post');
        $address=$db->f('address');
        $price_all=$db->f('fee');

//从订单详细库中取出订单的详细信息
        $sendtmp="";
        $db->query("select goods_id,goods_num from $shopping_t where requests_id=($id-$init_num)");
        while($db->next_record())
        {
//从产品库中取出产品所对应的名称和价格
            $db2->query("select name,price from $goods_t where id=".$db->f('goods_id'));
            $db2->next_record();

            $sendtmp.="<tr >
      <td width=\"60%\"><b>".stripslashes($db2->f('name'))."</b></td>
      <td width=\"20%\"><font color=\"red\">".$db2->f('price')."</font>$</td>
      <td width=\"20%\">".$db->f('goods_num')."</td>
    </tr>\n";
        }
    }
}

?>

<html>
<head>
    <title><?php echo $sitename ?> -- 商品管理</title>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312">
    <?php echo $http_head; ?>
    <link rel="stylesheet" href="conf/style.css" type="text/css">
</head>

<body bgcolor="#FFFFFF" text="#000000">
<?php
    if (session_is_registered("admin_name") && isset($admin_name))
{
    ?>
<table width="750" border="0" bgcolor="#eeeeee" align="center">
    <tr>
        <td align="right" style="line-height:150%"><a href="my_index.php" class="clink03">index</a>
            | <a href="my_admin.php" class="clink03">admin index</a>
            | <a href="my_admin_goods" class="clink03">goods management</a>
            <!-- admin_goods.php -->
            | <a href="my_admin_order.php" class="clink03">order management</a>
            <!-- admin_dingdang.php -->
            | <a href="my_admin_user" class="clink03">user management</a>
            <!-- admin_user.php -->
            <BR>

            other functions：
            <a href="my_backup.php" title="backup database" class="clink03">backup database</a>
            | <a href="my_recovery.php" title="recovery database" target="_blank" class="clink03">recovery database</a>
            &nbsp;</td>
    </tr>
</table>
<!-- view -->
<html>
<head>
    <title><?php echo $sitename ?> -- order management</title>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312">
    <?php echo $http_head; ?>
    <link rel="stylesheet" href="conf/style.css" type="text/css">
</head>
<body bgcolor="#FFFFFF" text="#000000">
<table width="750" align="center">
    <tr align="center">
        <td bgcolor="#EFEFEF">
            <p class="p13"><br>
                order management</p>
            <table width="96%" border="0" cellspacing="0" bgcolor="#ffffff">
                <form name="form1" method="post" action="<?php echo $PHP_SELF ?>" >
                    <tr>
                        <td> search:
                            <input type="text" name="key" size="15" class="think" >
                            <input type="hidden" name="search" value="1">
                            <input type="submit" name="submit1" value="search" class="stbtm2">
                        </td>
                    </tr>
                </form>
            </table>

            <?php
            if (!$page) $page=1;
            $tmp="where (payment=0 or send_out=0) and (TO_DAYS(now())-TO_DAYS(date_created)) < $dingdang_days";
            if ($key)
                if (($key-$init_num)>0)
                    $tmp.=" and id=".($key-$init_num);
                else
                    $tmp.=" and name like '%$key%' ";

            $db->query("select null from $requests_t $tmp"); //从订单表中查出用户的订单
            $total_num=$db->num_rows();//得到总记录数
            $totalpage=ceil($total_num/$num_to_show);//得到总页数
            $init_record=($page-1)*$num_to_show;
            $db->query("select * from $requests_t $tmp
     order by id DESC limit $init_record, $num_to_show");
            ?>

            <!-- orders
            <table width="99%" border="0" cellspacing="0" align="center" >
                <tr>
                    <td width="69%"> <b>orders：</b>
                    </td>
                    <td width="31%" align="right"><a href="admin_dingdang.php"><font color="blue">待处理的订单</font></a>
                        <a href="fail_admin_dingdang.php?action=all" onClick="return confirm('确定要delete所有的无效订单吗?')"><font color="blue"></font></a><a href="admin_succeed_dingdang.php"><font color="blue">成功的订单</font></a>
                        <a href="admin_fail_dingdang.php"><font color="blue">无效的订单</font></a></td>
                </tr>

            </table>
            -->
            <table width="96%" border="0" cellspacing="1" cellpadding="1">
                <form action="<?php echo $PHP_SELF."?key=$key" ?> " method="post" name="form8" onSubmit="return check_page('form8.page')">
                    <tr>
                        <td align="right"> total:
                            <?php echo $total_num." ";
                            $page1=$page-1;
                            $page2=$page+1;
                            if ($page1 < 1) echo "<FONT color=#999999>first page&nbsp;previous page</FONT>&nbsp;";
                            else echo "<a href='$PHP_SELF?page=1&key=$key'>first page</a>&nbsp;<a href='$PHP_SELF?page=$page1&key=$key'>previous page</a>&nbsp;";
                            if ($page2 > $totalpage) echo "<FONT color=#999999>next page&nbsp;last page</FONT>&nbsp;";
                            else echo "<a href='$PHP_SELF?page=$page2&key=$key'>next page</a>&nbsp;<a href='$PHP_SELF?page=$totalpage&key=$key'>last page</a>&nbsp;";
                            ?>
                            current page:<b>
                                <?php echo $page."/".$totalpage ?>
                            </b>&nbsp;
                            <script language="JavaScript">
                                function check_page(name)
                                {
                                    eval("page="+name+".value");
                                    if (isNaN(page) || page <=0 || page > <?php echo $totalpage ?>)
                                    {
                                        alert ("请正确输入页数，最大值为 <?php echo $totalpage ?> ！");
                                        eval(name+".select()");
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
            <table width="98%" border="1" cellspacing="0" align=center>
                <tr>
                    <td align=center><font color="#cc0000">order no</font></td>
                    <td align=center><font color="#cc0000">customer</font></td>
                    <td align=center><font color="#cc0000">payment</font></td>
                    <td align=center><font color="#cc0000">time</font></td>
                    <td align=center><font color="#cc0000">sent</font></td>
                    <td align=center><font color="#cc0000">paied</font></td>
                    <td align=center><font color="#cc0000">price</font></td>
                    <td align=center><font color="#cc0000">deliver</font></td>
                    <td align=center><font color="#cc0000">confirm payment</font></td>
                    <td align=center>&nbsp;</td>
                </tr>
                <?php
                while($db->next_record())
                {
                    ?>
                    <tr>
                        <td align=center>
                            <?php echo $db->f('id')+$init_num; ?>
                        </td>
                        <td align=center>
                            <?php
                            $db2->query("select id,u_name from $user_t where id=".$db->f('user_id'));
                            $db2->next_record();
                             echo $db2->f('u_name');
                            ?>
                        </td>
                        <td align=center>
                            <?php
                            echo substr($pay_str[$db->f('pay')],0,8);
                            ?>
                        </td>
                        <td align=center>
                            <?php echo $db->f('date_created'); ?>
                        </td>
                        <td align=center>
                            <?php if ($db->f('send_out')) echo "sent"; else echo "<font color=\"#cc0000\">wait for sending</font>"; ?>
                        </td>
                        <td align=center>
                            <?php if ($db->f('payment')) echo "paied"; else echo "<font color=\"#cc0000\">wait for paying</font>"; ?>
                        </td>
                        <td align=center>
                            <?php echo $db->f('fee')+$send_money; ?>
                            $</td>
                        <td align=center>
                            <?php
                            if ($db->f('send_out'))
                                echo "<a href='$PHP_SELF?do=update&action=send_out&value=0&id=".($db->f('id')+$init_num)."' onClick=\"return confirm('确定该条订单wait for sending吗?')\" class='clink03'>"."wait for sending</a>";
                            else
                                echo "<a href='$PHP_SELF?do=update&action=send_out&value=1&id=".($db->f('id')+$init_num)."' onClick=\"return confirm('确定该条订单已发货吗?')\" class='clink03'>"."sent</a>";
                            ?>
                        </td>
                        <td align=center>
                            <?php
                            if ($db->f('payment'))
                                echo "<a href='$PHP_SELF?do=update&action=payment&value=0&id=".($db->f('id')+$init_num)."' onClick=\"return confirm('确定该条订单wait for paying吗?')\" class='clink03'>"."wait for paying</a>";
                            else
                                echo "<a href='$PHP_SELF?do=update&action=payment&value=1&id=".($db->f('id')+$init_num)."' onClick=\"return confirm('确定该条订单已付款吗?')\" class='clink03'>"."paied</a>";
                            ?>
                        </td>
                        <td align=center>
                            <input type="button" name="Button2" value="delete" class="think" <?php echo "onclick=\"javaScript:if (confirm('确定要delete吗?')) window.location.href='$PHP_SELF?action=del&id=".($db->f('id')+$init_num)."'\""; ?>>
                        </td>
                    </tr>
                    <?php } ?>
            </table>
            <table width="96%" border="0" cellspacing="1" cellpadding="1">
                <form action="<?php echo $PHP_SELF."?key=$key" ?> " method="post" name="form88" onSubmit="return check_page('form88.page')">
                    <tr>
                        <td align="right"> total:
                            <?php echo $total_num." ";
                            $page1=$page-1;
                            $page2=$page+1;
                            if ($page1 < 1) echo "<FONT color=#999999>first page&nbsp;previous page</FONT>&nbsp;";
                            else echo "<a href='$PHP_SELF?page=1&key=$key'>first page</a>&nbsp;<a href='$PHP_SELF?page=$page1&key=$key'>previous page</a>&nbsp;";
                            if ($page2 > $totalpage) echo "<FONT color=#999999>next page&nbsp;last page</FONT>&nbsp;";
                            else echo "<a href='$PHP_SELF?page=$page2&key=$key'>next page</a>&nbsp;<a href='$PHP_SELF?page=$totalpage&key=$key'>last page</a>&nbsp;";
                            ?>
                            current page:<b>
                                <?php echo $page."/".$totalpage ?>
                            </b>&nbsp; go to
                            <input type="text" name="page" size="2">
                            <input type="submit" name="Submit222" value="GO">
                        </td>
                    </tr>
                </form>
            </table>
        </td>
    </tr>
</table>
<br>

<?php
}

?>
</body>
</html>

