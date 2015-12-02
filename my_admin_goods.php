
<!--all admin's options -->
<!-- display after log in -->

<?php
require "conf/config.php";
include "admin_check.php";
?>

<html>
<head>
    <title><?php echo $sitename ?> -- Product Management</title>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312">
    <?php echo $http_head; ?>
    <link rel="stylesheet" href="conf/style.css" type="text/css">
</head>


<body bgcolor="#FFFFFF" text="#000000">


<?php include "conf/admin.php"; ?>


<!-- view -->
<table width="750" align="center">
    <tr align="center">
        <td bgcolor="#EFEFEF">
            <p class="p13"><br>
                goods management</p>
            <form name="form1" method="post" action="">
                search：
                <input type="text" name="key" class="think">
                　
                <input type="submit" name="Submit1" value="search" class="stbtm2">
            </form>

        <?php
                $db->query("select * from $class_t where up_id=$up_id");
                while($db->next_record())
                {
                    if ($up_id)
                    {
                        $db2->query("select count(*) as total from $goods_t where class_id=".$db->f('id'));
                        $db2->next_record();
                        echo "<a href='$PHP_SELF?up_id=$up_id&sf=".$db->f('id')."' class='clink03'>".$db->f('name')."</a>(".$db2->f('total').") 　";
                    }
                    else
                    {
                        $db2->query("select count(*) as total from $class_t where up_id=".$db->f('id'));
                        $db2->next_record();
                        echo "<a href='$PHP_SELF?up_id=".$db->f('id')."' class='clink03'>".$db->f('name')."</a>(".$db2->f('total').") 　";
                    }
                }
                ?>
        </span><br>
                <br>
            </div>
            <?php
            echo $result;
            if ($key)
                $tmp="where name like '%$key%' or descript like '%$key%'";
            if ($up_id)
                $tmp="where up_id=$up_id";
            if ($sf)
                $tmp="where class_id=$sf";
            if (!$page) $page=1;
            $db->query("select null from $goods_t $tmp");
            $total_num=$db->num_rows();//得到总记录数
            $totalpage=ceil($total_num/$num_to_show);//得到总页数
            $init_record=($page-1)*$num_to_show;
            $db->query("select id,name,image,price_m,price,state
   from $goods_t $tmp
   order by id DESC limit $init_record, $num_to_show");
            ?>
            <table width="96%" border="0" cellspacing="1" cellpadding="1">
                <form action="<?php echo $PHP_SELF."?up_id=$up_id&sf=$sf&key=$key" ?> " method="post" name="form8" onSubmit="return check_page('form8.page')">
                    <tr>
                        <td align="right"> <a href="my_admin_goods_work.php?action=insert<?php echo "&up_id=$up_id&class_id=$sf" ?>" class="clink03">add new item</a>　total:
                            <?php echo $total_num." ";
                            $page1=$page-1;
                            $page2=$page+1;
                            if ($page1 < 1) echo "<FONT color=#999999>first page&nbsp;previous page</FONT>&nbsp;";
                            else echo "<a href='$PHP_SELF?page=1&up_id=$up_id&sf=$sf&key=$key'>first page</a>&nbsp;<a href='$PHP_SELF?page=$page1&up_id=$up_id&sf=$sf&key=$key'>previous page</a>&nbsp;";
                            if ($page2 > $totalpage) echo "<FONT color=#999999>next page&nbsp;last page</FONT>&nbsp;";
                            else echo "<a href='$PHP_SELF?page=$page2&up_id=$up_id&sf=$sf&key=$key'>next page</a>&nbsp;<a href='$PHP_SELF?page=$totalpage&up_id=$up_id&sf=$sf&key=$key'>last page</a>&nbsp;";
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
                                        alert ("please input the right page，max page is <?php echo $totalpage ?> ！");
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
            <form name="form_sele" method="post" action="">
                <table width="98%" border="1" class="black" cellspacing="1" cellpadding="3" bordercolor="#FFFFFF" bgcolor="#D3E3FE">
                    <tr>
                        <td colspan="7" align="center">
                            <input type="checkbox" name="deleteall" value="on" onClick="CheckAll(this.form,this.checked)"   >
                            <font color="#CC3366">select all </font> 　
                            <input type="submit" name="Submit" value="delete" onClick="if(!confirm('确定要delete这些吗？')) return false;" class="stbtm2">
                        </td>
                    </tr>
                    <tr>
                        <td width="8%" align="center">no</td>
                        <td width="56%" align="center">name</td>
                        <td width="10%" align="center">price</td>
                        <td width="10%" align="center">prime</td>
                        <td width="6%" align="center">status</td>
                        <td width="5%" align="center">alter</td>
                        <td width="5%" align="center">delete</td>
                    </tr>
                    <?php
                    while($db->next_record())
                    {
                        $i++;
                        ?>
                        <tr>
                            <td width="8%" align="center" bgcolor="<?php if ($i % 2 ==0) echo "#ffffff";else echo "#F1F5FE"; ?>">
                                <?php echo $db->f('id') ?>
                            </td>
                            <td width="56%" bgcolor="<?php if ($i % 2 ==0) echo "#ffffff";else echo "#F1F5FE"; ?>">
                                <a href="my_goods_list.php?id=<?php echo $db->f('id') ?>" class='clink03' target="_blank">
                                    <?php echo stripslashes($db->f('name')) ?>
                                </a></td>
                            <td width="10%" align="center" bgcolor="<?php if ($i % 2 ==0) echo "#ffffff";else echo "#F1F5FE"; ?>">
                                <?php echo $db->f('price_m') ?>
                            </td>
                            <td width="10%" align="center" bgcolor="<?php if ($i % 2 ==0) echo "#ffffff";else echo "#F1F5FE"; ?>">
                                <?php echo $db->f('price') ?>
                            </td>
                            <td width="6%" align="center" bgcolor="<?php if ($i % 2 ==0) echo "#ffffff";else echo "#F1F5FE"; ?>">
                                <?php
                                if ($db->f('state')==0) echo "many";
                                if ($db->f('state')==1) echo "none";
                                ?>
                            </td>
                            <td width="5%" align="center" bgcolor="<?php if ($i % 2 ==0) echo "#ffffff";else echo "#F1F5FE"; ?>">
                                <?php
                                $link_order = "action=update&id=".$db->f('id');
                                echo "<a href=\"my_admin_goods_work.php?$link_order\">";
                                echo '<img src="images/xg.gif" alt="alter" border="0"></a>';
                                ?>
                            </td>
                            <td width="5%" align="center" bgcolor="<?php if ($i % 2 ==0) echo "#ffffff";else echo "#F1F5FE"; ?>">
                                <input type="checkbox" name="delete[]" value="<?php echo $db->f('id')."|".$db->f('image'); ?>">
                            </td>
                        </tr>
                        <?php } ?>
                    <tr>
                        <td colspan="7" align="center">
                            <input type="checkbox" name="deleteall" value="on" onClick="CheckAll(this.form,this.checked)"   >
                            <font color="#CC3366">select all </font> 　
                            <input type="submit" name="Submit" value="delete" onClick="if(!confirm('确定要delete这些吗？')) return false;" class="stbtm2">
                        </td>
                    </tr>
                </table>
            </form>
            <table width="96%" border="0" cellspacing="1" cellpadding="1">
                <form action="<?php echo $PHP_SELF."?up_id=$up_id&sf=$sf&key=$key" ?> " method="post" name="form88" onSubmit="return check_page('form88.page')">
                    <tr>
                        <td align="right"> <a href="my_admin_goods_work.php?action=insert<?php echo "&up_id=$up_id&class_id=$class_id" ?>" class="clink03">add new item</a>　total:
                            <?php echo $total_num." ";
                            $page1=$page-1;
                            $page2=$page+1;
                            if ($page1 < 1) echo "<FONT color=#999999>first page&nbsp;previous</FONT>&nbsp;";
                            else echo "<a href='$PHP_SELF?page=1&up_id=$up_id&sf=$sf&key=$key'>first page</a>&nbsp;<a href='$PHP_SELF?page=$page1&up_id=$up_id&sf=$sf&key=$key'>previous page</a>&nbsp;";
                            if ($page2 > $totalpage) echo "<FONT color=#999999>next page&nbsp;</FONT>&nbsp;";
                            else echo "<a href='$PHP_SELF?page=$page2&up_id=$up_id&sf=$sf&key=$key'>next page</a>&nbsp;<a href='$PHP_SELF?page=$totalpage&up_id=$up_id&sf=$sf&key=$key'></a>&nbsp;";
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



</body>
</html>

