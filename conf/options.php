<?php

include('conf/register_globals.php');
register_globals();

//db_set_start 
 //���ݿ�����
$dbservername="mysql1.cs.clemson.edu";
$dbname="b2c_4w83";
$dbusername="b2c_vt1i";
$dbuserpass="zhubo19910914";

//db_set_end

  //���ݿ�ǰ׺  9 ����
$prefix = "b2c_";
$news_t = $prefix."news";//�������ݱ�
$class_t = $prefix."class";//��Ʒ����
$goods_t = $prefix."goods";//��Ʒ��Ϣ��
$shopping_t = $prefix."shopping";//������Ʒ��
$requests_t = $prefix."requests";//������
$user_t = $prefix."user";//�û���Ϣ��
$ad_t = $prefix."ad";//����
$vote_t = $prefix."vote";//�����
$link_t = $prefix."link";//�������ӱ�

//�û�ע��
$user_reg_flag = 1;

//base_set_start 
 //��������
$sitename="zhubo's store";   //��վ����
$siteurl="http://localhost/662";   //��վ��ַ 
$sitecopyright = "Zhubo&Zhuge";          //��վ��Ȩ��

//base_set_end

//admin_set_start 
    //��վ����Ա����
$ad_name="zhubo";   //��վ����Ա�û���
$ad_pass="zhubo";   //��վ����Ա����
$siteemail="buaazhubo@outlook.com";   //��վ����Ա������

//admin_set_end

//�򿪻��߹ر��̵� 
$siteclose_flag = 0;
$sitereason = "Shutdown currently, please visit later!";

//��ʾ��ʽ
$num_to_show = 14;   //ÿҳ��Ʒ��ʾ����
$num_to_show_news = 14;   //ÿҳ������ʾ����

//��������
$init_num = 5000;   //�����ĳ�ʼ���
$rebate = 0.1;   //���Ŷ����ܶ��1000Ԫ���ۿ�, ��С����ʾ��0.1��10%)
$jiti_num = 10;   //������������ͬһ����Ʒ��������������������ʱ������
$jiti_rebate = 0.2;   //������������ͬһ����Ʒ���������۸��Ż�20%(0.2��20%)
$send_money = 10;   //ÿ�Ŷ��������ͷѣ���ԪΪԪ��
$dingdang_days = 15;   //ÿ�Ŷ�������Ч�����������ָ���������ڣ��û�δ�����������Ч����ҳ��
$del_delay = 1800; //�û��������������ڴ��趨��ʱ���ڣ��ٴε�¼�������ɾ���˶��� ��λ���� �磺1800�뼴30����

//��վ��ϵ��ʽ�������ж�����ÿո�ֿ�
$siteadd = "Clemson University";
$sitetel = "8649865927";
$siteemail = "zhugexubin@163.com";

//��������
$user_price = 1 ; //��Ʒ�Ļ�Ա�ۣ��Ƿ�Ϊ��¼��Ա���ܿ���1--�û������¼���ܿ���Ա��  0--�����˶����Կ���Ա��
$init_action = "n";//��Ա��action�ֶεĳ�ʼֵ,y ��ʾע�ἴ��ʹ�ã�n ��ʾע������ɹ���Ա�������ʹ��
$guestbook  =  1 ;  //�Ƿ�ʹ�����Ա����� 1--ʹ�� 0--��ʹ��
$bbs_name   = "BBS" ; //��̳����
$bbs_url    = "" ; //��̳��ַ�������ʹ�ô˹��ܣ���ֵΪ��
$stat       = 1 ; //�Ƿ����վ��������ͳ��
$stat_type  = 1 ;   //ͳ��ͼ����ʾ���Ŀǰ����4�� 1.����ʾ����  2.��ʾ�����ı�  3.��ʾСͼ��  4.��ʾ��ͼ��

$date_tmp = date("Y-m-d H:i:s"); //���ڸ�ʽ���벻Ҫ�޸ģ�������ݿ���ֶ��������
?>