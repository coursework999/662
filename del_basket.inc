<?php
for ($basket_counter=$counter;$basket_counter<$basket_items-1;$basket_counter++)
         {
          $basket_amount[$basket_counter]=$basket_amount[$basket_counter+1];
     	  $basket_id[$basket_counter]=$basket_id[$basket_counter+1];
     	 } 
$basket_items--;
?>