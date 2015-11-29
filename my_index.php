<?php
require "conf/config.php";

if ($siteclose_flag) {
    echo $sitereason;
    exit();
}
session_start();

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

<!-- detect the login state div-->
<div>
    <?php
    if (isset($login_name)) {

        echo "dear <font color='#cc0000'>" . $login_name . "</font>，welcome!";
        echo "<br>";
        echo "last login in time " . $cookielogintime;
    } else {
        echo "Hello, please register ! <a href='my_login.php' class='clink03'>sign in</a> ";
    }
    ?>
</div>

<!-- login div -->
<div>
    <form action="my_login.php" method=post>
        username : <input name=u_pass>
        <br>
        password : <input name=u_name type=password>
        <br>
        <input name="sign_in" type=submit value="sign in">
        <a href="my_register1.php">
            <input name="sign_up" type=button value="sign up">
        </a>
    </form>
</div>


<!-- category div -->
<div>
    <table border=1>

        <tr>
            <th>Category</th>
        </tr>


        <?php
        $db->query("select id,name from $class_t where up_id=0");
        $top_category = 0;
        //for every topmost category
        //echo $db->num_rows();
        while ($db->next_record()) {
            echo "<tr><td>";
            echo "<a href = 'my_index?category_num=" . $db->f('id') . "'>";
            echo $db->f('name');
            echo "</a>";
            echo "</td></tr>";
        }
        ?>

    </table>

</div>


<!--goods list table -->
<div>

</div>


<?php
//init

if (!isset($page)) $page = 1;
if (!isset($category_num)) $category_num = 88;

echo "upid = $category_num  ";


$record_one_line = 3;
$line_one_page = 4;
$records_one_page = $record_one_line * $line_one_page;
$begin = ($page-1) * $records_one_page;
php?>


<table border="1">


    <?php
    $db->query("select * from $goods_t where up_id = $category_num");
    $total_num = $db->num_rows();// all records in this category
    $totalpage = ceil($total_num / $records_one_page);//all the pages
    $init_record = ($page - 1) * $records_one_page;

    echo "find   $total_num results<br>";

    $db->query("select * from $goods_t where up_id = $category_num limit $begin, $records_one_page");
    $cur_page_record = $db->num_rows();
    $i = 0;
    $j = 0;
    for (; $i * $record_one_line + $j < $cur_page_record; $i++) {

        if ($i % $record_one_line == 0) echo "<tr>";
        for ($j = 0; $j < $record_one_line && $i * $record_one_line + $j < $cur_page_record; $j++) {
            $db->next_record();
            echo "<td>"
            ?>
            <!-- show table of an item -->
            <table>

                <tr>
                    <td>
                        <?php
                        echo "<a href='my_goods_list.php?id=" . $db->f('id') . "' target='_blank'><img src='" . show_img($db->f('image'), 50, 50) . " border='0'></a>";
                        ?>
                    </td>

                    <td>
                        <?php echo "<a href='my_goods_list.php?id=" . $db->f('id') . "' class='softtitle' target='_blank'>" . stripslashes($db->f('name')) . "</a>"; ?>
                        <br>
                        price：
                        <?php echo $db->f('price_m'); ?>
                        $
                        <br>
                        prime：
                        <?php
                        if ($user_price)
                            if (isset($login_name))
                                echo $db->f('price');
                            else
                                echo "";
                        else
                            echo $db->f('price');
                        ?>
                        $ <br>
                        count：
                        <?php
                        if ($db->f('state') == 0) echo "many";
                        if ($db->f('state') == 1) echo "none";
                        ?>
                        <br>
                        <a href="my_shopping.php?id=<?php echo $db->f('id') ?>" target="cart"><img
                                src="images/gou.gif" width="60" height="22" border="0"></a>
                        <a href="my_shopping.php?id2=<?php echo $db->f('id') ?>" target="cart">
                            <img src="images/sc.gif" width="60" height="22" border="0"></a>
                    </td>
                </tr>

            </table>


            <?php
            echo "</td>";
        }
        ?>

        <?php
        echo "</tr>";
    }
    ?>

</table>


<!-- cart-->
<iframe frameborder=1
        height=182 name=cart scrolling=no
        src="shopping.php"
        width="100%"></iframe>

<!-- show using multiple pages-->
<table width="100%" border="0" cellspacing="1" cellpadding="1">
    <form action="<?php echo $PHP_SELF . "?up_id=$up_id&sf=$sf" ?> " method="post" name="form8"
          onSubmit="return check_page('form8.page')">
        <tr>
            <td align="right"> total:
                <?php echo $total_num . " ";
                $page1 = $page - 1;
                $page2 = $page + 1;
                if ($page1 < 1) echo "<FONT color=#999999> first page&nbsp; last page</FONT>&nbsp;";
                else echo "<a href='$PHP_SELF?page=1&category_num=$category_num&sf=$sf'>first page</a>&nbsp;<a href='$PHP_SELF?page=$page1&category_num=$category_num&sf=$sf'>previous page</a>&nbsp;";
                if ($page2 > $totalpage) echo "<FONT color=#999999>next page&nbsp; last page</FONT>&nbsp;";
                else echo "<a href='$PHP_SELF?page=$page2&category_num=$category_num&sf=$sf'>next page</a>&nbsp;<a href='$PHP_SELF?page=$totalpage&category_num=$category_num&sf=$sf'>last page</a>&nbsp;";
                ?>
                current page:<b>
                    <?php echo $page . "/" . $totalpage ?>
                </b>&nbsp;
                <script language="JavaScript">
                    function check_page(name) {
                        eval("page=" + name + ".value");
                        if (isNaN(page) || page <= 0 || page > <?php echo $totalpage ?>) {
                            alert("Please input page num correctly，Max is <?php echo $totalpage ?> ！");
                            eval(name + ".select()");
                            return false;
                        }
                    }
                </script>
                goto
                <input type="text" name="page" size="2">
                <input type="submit" name="Submit22" value="GO">
            </td>
        </tr>
    </form>
</table>
</td>
<?php include "conf/footer.php"; ?>
</body>