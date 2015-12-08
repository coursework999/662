<?php
$ff = 0; 
for ($count = 0; $count < $basket_items; $count++) {
    if ($basket_id[$count] == $id) 
    {
        $ff = 1;
        $basket_position = $count;
    }
}
if ($ff == 1) {

    $_SESSION["basket_amount"][$basket_position]++;
} else {
    $_SESSION["basket_amount"][$basket_items] = 1;
    $_SESSION["basket_id"][$basket_items] = $id;
    $_SESSION["basket_items"]++;
}



?>
