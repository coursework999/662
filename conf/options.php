<?php



include('conf/register_globals.php');

register_globals();

error_reporting(0);

 

  

$dbservername="mysql1.cs.clemson.edu";

$dbname="b2c_4w83";

$dbusername="b2c_vt1i";

$dbuserpass="zhubo19910914";



 



$prefix = "b2c_";

$news_t = $prefix."news"; 

$class_t = $prefix."class"; 

$goods_t = $prefix."goods"; 

$shopping_t = $prefix."shopping"; 

$requests_t = $prefix."requests"; 

$user_t = $prefix."user"; 

$ad_t = $prefix."ad"; 

$vote_t = $prefix."vote"; 

$link_t = $prefix."link"; 



 

$user_reg_flag = 1;



 

  

$sitename="zhubo's store";    

$siteurl="http://localhost/662";   

$sitecopyright = "Zhubo&Zhuge";           



 



 

     

$ad_name="zhubo";    

$ad_pass="zhubo";    

$siteemail="buaazhubo@outlook.com";    



 



 

$siteclose_flag = 0;

$sitereason = "Shutdown currently, please visit later!";



 

$num_to_show = 14;    

$num_to_show_news = 14;    



 

$init_num = 5000;    

$rebate = 0.1;    

$jiti_num = 10;    

$jiti_rebate = 0.2;    

$send_money = 10;    

$dingdang_days = 15;    

$del_delay = 1800;  



 

$siteadd = "Clemson University";

$sitetel = "8649865927";

$siteemail = "zhugexubin@163.com";



 

$user_price = 1 ;  

$init_action = "n"; 

$guestbook  =  1 ;   

$bbs_name   = "BBS" ;  

$bbs_url    = "" ;  

$stat       = 1 ;  

$stat_type  = 1 ;    



$date_tmp = date("Y-m-d H:i:s");  

?>
