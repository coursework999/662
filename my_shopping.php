<?php
session_start();
require ("conf/config.php");

//para id2 represent like
if ($id2!="")
{
    if ($scj)
    {
        $f=1;
        $scsp=split("&&",$scj);
        for($j=0;$j<count($scsp);$j++)
            if ($scsp[$j]==$id2) $f=0;
        if ($f)
            setcookie("scj",$scj."&&".$id2,time()+60*60*24*365); //����cookie����Чʱ��Ϊһ��
    }
    else
        setcookie("scj",$id2,time()+60*60*24*365); //����cookie����Чʱ��Ϊһ��
    echo '<meta http-equiv="refresh" content="0;URL=my_shopping.php">';
}

//id represent the cart
if ($id!="")
{
    if (isset($_SESSION["basket_items"]))
        require("addto_basket.inc");
    else
        require("new_basket.inc") ;
}

require("display.php");
?>