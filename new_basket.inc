<?php
// ��session��ע���µ�����  
//�ô�href���Ӵ�������ֵ�������ĵ�0��λ�õ�ֵ
$basket_items=1; //������Ϊ1�����ﳵ��Ʒ�ĸ���
$basket_amount[0]=1; //ÿ����Ʒ�ĸ���
$basket_id[0]=$id; //ÿ����Ʒ�����ݿ��е�id
session_register("basket_items");
session_register("basket_amount");
session_register("basket_id");
?>