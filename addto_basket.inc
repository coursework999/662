<?php
$ff=0; //���ñ�־Ϊ1
//foreach($basket_name as $basket_item)
for($count=0;$count<$basket_items;$count++)
        {
          if ($basket_id[$count]==$id)
          // �������������������֣�����Ƿ����href����������ƥ��                          
                {
                  $ff=1;
                  // ������������Ѿ�����һ����Ŀ����ff��Ϊ1
                  $basket_position=$count;
                  // ��ס��Ŀ��λ�ã������и���
                }
         }
          if ($ff==1)
               {
                  // �����Ŀ�ڹ��������Ѿ������������$basket_position������������λ��
                  $basket_amount[$basket_position]++;
              }
          else
               {
                // �����������������У���������ĩβ�����µ���Ŀ
     		  $basket_amount[$basket_items]=1;
     		  $basket_id[$basket_items]=$id;
     		  $basket_items++;
               }
?>