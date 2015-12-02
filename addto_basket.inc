<?php
$ff = 0; //设置标志为1
//foreach($basket_name as $basket_item)
for ($count = 0; $count < $basket_items; $count++) {
    if ($basket_id[$count] == $id) // 遍历数组所包含的名字，检查是否与从href所传来的相匹配
    {
        $ff = 1;
        // 如果在篮子中已经有了一个项目，将ff设为1
        $basket_position = $count;
        // 记住项目的位置，将进行更新
    }
}
if ($ff == 1) {
    // 如果项目在购物篮中已经存在则更新在$basket_position处理的数量和位置

//                  $basket_amount[$basket_position]++;
    $_SESSION["basket_amount"][$basket_position]++;
} else {
    // 如果它不在你的篮子中，则在数组末尾增加新的项目
    $_SESSION["basket_amount"][$basket_items] = 1;
    $_SESSION["basket_id"][$basket_items] = $id;
    $_SESSION["basket_items"]++;
}



?>