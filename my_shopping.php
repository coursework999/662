<?php
session_start();
require ("conf/config.php");

//para id2 represent like
//para id represent cart
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

//����Ʒ��id���빺�ﳵ
if ($id!="")
{
    if (session_is_registered("basket_items"))
        require("addto_basket.inc");
    else
        require("new_basket.inc") ;
}
require("display.php");
?>