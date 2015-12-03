<?php
// 在session中注册新的篮子
$_SESSION["basket_items"] = 1;
$_SESSION["basket_amount"][0] = 1;
$_SESSION["basket_id"][0] = $id;

////用从href链接传过来的值填充数组的第0个位置的值
//$basket_items=1; //计数设为1，购物车商品的个数
//$basket_amount[0]=1; //每个商品的个数
//$basket_id[0]=$id; //每个商品在数据库中的id

?>