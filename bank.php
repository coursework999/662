<?php
require "conf/config.php";
include "chk.php";
?>
<html>
<head>
<title><?php echo $sitename ?> -- ����̨</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<?php echo $http_head; ?>
<link rel="stylesheet" href="conf/style.css" type="text/css">
</head>
<body bgcolor="#FFFFFF" text="#000000">
<?php include "conf/header.php" ?>
<table width="750" border="0" align="center" cellspacing="0" cellpadding="0">
  <tr align="center" bgcolor="#efefef"> 
    <td bgcolor="#FFFFFF"> 
      <?php
if ($basket_items==0)
{
 echo "<center><br><br><img src='images/emptcart.gif'>";
 echo  "<br><input class=stbtm name='��������' onClick=\"window.location.href='index.php';\" type=button value=��������>";
 echo "</center><br>";
}
else
{
?>
      <table width="630" border="0" cellspacing="0" cellpadding="0" align="center">
        <tr> 
          <td>&nbsp;</td>
        </tr>
        <tr> 
          <td align="center"><img src="images/new_syt.gif" width="149" height="30"></td>
        </tr>
        <tr> 
          <td> 
            <table cellpadding=0 cellspacing=0 width=630>
              <tbody> 
              <tr> 
                <td align=left width="80%"><b><font class=p14 color=#cc0000>�� 
                  �� ��</font></b></td>
              </tr>
              <tr bgcolor=#cc0000> 
                <td height=2 valign=top></td>
              </tr>
              </tbody> 
            </table>
          </td>
        </tr>
        <tr> 
          <td> 
            <table width="100%" border="0" cellspacing="1" cellpadding="0">
              <tr> 
                <td bgcolor="#e4e4e4"><font color=#000000 
      size=2>��Ʒ����</font></td>
                <td width="15%" align="center" bgcolor="#e4e4e4">���ۼ�</td>
                <td width="15%" align="center" bgcolor="#e4e4e4"><font color=#000000 
      size=2>��Ա��</font></td>
                <td width="15%" align="center" bgcolor="#e4e4e4"><font color=#000000 
      size=2>����</font></td>
                <td width="15%" align="center" bgcolor="#e4e4e4"><font color=#000000 
      size=2>С��</font></td>
              </tr>
              <?php
$price_all=0;
for ($basket_counter=0;$basket_counter<$basket_items;$basket_counter++) 
{
            $amount=$basket_amount[$basket_counter];;
			$db->query("select name,price_m,price from $goods_t where id=$basket_id[$basket_counter]");
            $db->next_record();
			$price_all=$price_all+$db->f('price')*$amount;
?>
              <tr> 
                <td><b> 
                  <?php echo stripslashes($db->f('name')); ?>
                  </b></td>
                <td width="15%" align="center"><font color=#000000 
      size=2><strike>��<?php echo $db->f('price_m'); ?></strike> </font> </td>
                <td width="15%" align="center"><b><font 
      color=#cc0000>��<?php echo $db->f('price'); ?></font></b></td>
                <td width="15%" align="center"> 
                  <?php echo $basket_amount[$basket_counter] ?>
                </td>
                <td width="15%" align="center"> 
                  <?php echo $db->f('price')*$amount; ?>
                </td>
              </tr>
              <?php 
}
$price_all_format=sprintf("%01.2f",$price_all); 
?>
              <tr> 
                <td colspan="5" width="100%" height="1" background="images/speaking_bg.gif"></td>
              </tr>
              <tr> 
                <td colspan="5">&nbsp;</td>
              </tr>
              <tr> 
                <td>&nbsp; </td>
                <td> 
                  <input class=stbtm2 name=changeOK1 onClick="JavaScript:window.location.href='buycar.php';" type=button value=������Ʒ>
                </td>
                <td>&nbsp;</td>
                <td colspan="2"> 
                  <?php echo "�ϼƣ�<b><font color=red>��$price_all_format</font></b>";?>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
      <p align="center"><img src="images/new_shouhuo.gif" width="258" height="30"> 
      </p>
      <table width="630" cellspacing="0" cellpadding="0" align="center" border="1" bordercolorlight="#d2d2d2" bordercolordark="#FFFFFF">
        <tr align="center"> 
          <td> 
            <table cellpadding=0 cellspacing=0 width=630 align="center">
              <tbody> 
              <tr> 
                <td align=left width="80%"><b><font class=p14 color=#cc0000>�����ջ���Ϣ</font><font class=p14><span class="p9">(���޸�)��
                  <script language=javascript>
prvarr= new Array(31);
ctylst= new Array(1000);
ss= new Array(3);
prvcnt=31;
prvarr[1]=new prv(1,'����');
ctylst[1]=new prvcty(1,1,'������');
ctylst[2]=new prvcty(1,3,'��ɽ');
ctylst[3]=new prvcty(1,4,'����');
ctylst[4]=new prvcty(1,5,'��˳');
ctylst[5]=new prvcty(1,18,'����');
ctylst[6]=new prvcty(1,19,'��Ϫ');
ctylst[7]=new prvcty(1,20,'����');
ctylst[8]=new prvcty(1,21,'����');
ctylst[9]=new prvcty(1,22,'Ӫ��');
ctylst[10]=new prvcty(1,23,'����');
ctylst[11]=new prvcty(1,24,'����');
ctylst[12]=new prvcty(1,25,'����');
ctylst[13]=new prvcty(1,26,'�߷���');
ctylst[14]=new prvcty(1,27,'����');
ctylst[15]=new prvcty(1,28,'����');
ctylst[16]=new prvcty(1,29,'�̽�');
ctylst[17]=new prvcty(1,30,'����');
prvarr[2]=new prv(2,'������');
ctylst[18]=new prvcty(2,38,'������');
ctylst[19]=new prvcty(2,40,'�������');
ctylst[20]=new prvcty(2,41,'ĵ����');
ctylst[21]=new prvcty(2,42,'��ľ˹');
ctylst[22]=new prvcty(2,43,'����');
ctylst[23]=new prvcty(2,170,'����');
prvarr[3]=new prv(3,'����');
ctylst[24]=new prvcty(3,31,'����');
ctylst[25]=new prvcty(3,32,'������');
ctylst[26]=new prvcty(3,33,'�Ӽ�');
ctylst[27]=new prvcty(3,34,'��ƽ');
ctylst[28]=new prvcty(3,35,'ͨ��');
ctylst[29]=new prvcty(3,36,'�׳�');
ctylst[30]=new prvcty(3,37,'��Դ');
prvarr[4]=new prv(4,'�ӱ�');
ctylst[31]=new prvcty(4,10,'ʯ��ׯ');
ctylst[32]=new prvcty(4,11,'��ɽ');
ctylst[33]=new prvcty(4,12,'�ػʵ�');
prvarr[5]=new prv(5,'����');
ctylst[34]=new prvcty(5,6,'������');
prvarr[6]=new prv(6,'�Ϻ�');
ctylst[35]=new prvcty(6,7,'�Ϻ���');
prvarr[7]=new prv(7,'���');
ctylst[36]=new prvcty(7,8,'�����');
prvarr[8]=new prv(8,'ɽ��');
ctylst[37]=new prvcty(8,13,'̫ԭ');
ctylst[38]=new prvcty(8,14,'��ͬ');
ctylst[39]=new prvcty(8,15,'����');
prvarr[9]=new prv(9,'���ɹ�');
ctylst[40]=new prvcty(9,16,'���ͺ���');
ctylst[41]=new prvcty(9,17,'���');
prvarr[10]=new prv(10,'����');
ctylst[42]=new prvcty(10,44,'�Ͼ�');
ctylst[43]=new prvcty(10,45,'��');
ctylst[44]=new prvcty(10,46,'����');
ctylst[45]=new prvcty(10,47,'��ͨ');
ctylst[46]=new prvcty(10,48,'����');
ctylst[47]=new prvcty(10,49,'����');
ctylst[48]=new prvcty(10,50,'����');
ctylst[49]=new prvcty(10,51,'�żҸ�');
prvarr[11]=new prv(11,'�㽭');
ctylst[50]=new prvcty(11,52,'����');
ctylst[51]=new prvcty(11,53,'����');
ctylst[52]=new prvcty(11,54,'����');
ctylst[53]=new prvcty(11,55,'����');
ctylst[54]=new prvcty(11,56,'�');
prvarr[12]=new prv(12,'����');
ctylst[55]=new prvcty(12,57,'�Ϸ�');
ctylst[56]=new prvcty(12,58,'����');
ctylst[57]=new prvcty(12,59,'����');
ctylst[58]=new prvcty(12,60,'��ɽ');
prvarr[13]=new prv(13,'����');
ctylst[59]=new prvcty(13,61,'����');
ctylst[60]=new prvcty(13,62,'����');
ctylst[61]=new prvcty(13,63,'����');
prvarr[14]=new prv(14,'����');
ctylst[62]=new prvcty(14,64,'�ϲ�');
ctylst[63]=new prvcty(14,65,'�Ž�');
ctylst[64]=new prvcty(14,66,'����');
ctylst[65]=new prvcty(14,67,'�ٴ�');
ctylst[66]=new prvcty(14,68,'�˴�');
ctylst[67]=new prvcty(14,69,'����');
ctylst[68]=new prvcty(14,70,'������');
ctylst[69]=new prvcty(14,71,'����ɽ');
prvarr[15]=new prv(15,'ɽ��');
ctylst[70]=new prvcty(15,72,'����');
ctylst[71]=new prvcty(15,73,'�ൺ');
ctylst[72]=new prvcty(15,74,'�Ͳ�');
ctylst[73]=new prvcty(15,75,'����');
ctylst[74]=new prvcty(15,76,'��̨');
ctylst[75]=new prvcty(15,77,'Ϋ��');
ctylst[76]=new prvcty(15,78,'����');
ctylst[77]=new prvcty(15,79,'̩��');
ctylst[78]=new prvcty(15,80,'����');
ctylst[79]=new prvcty(15,81,'�ٳ�');
ctylst[80]=new prvcty(15,82,'����');
ctylst[81]=new prvcty(15,83,'��ׯ');
ctylst[82]=new prvcty(15,84,'��ׯ');
prvarr[16]=new prv(16,'����');
ctylst[83]=new prvcty(16,85,'֣��');
ctylst[84]=new prvcty(16,86,'����');
ctylst[85]=new prvcty(16,87,'����');
ctylst[86]=new prvcty(16,88,'���');
ctylst[87]=new prvcty(16,89,'ƽ��ɽ');
ctylst[88]=new prvcty(16,90,'����');
ctylst[89]=new prvcty(16,91,'����');
ctylst[90]=new prvcty(16,92,'����');
ctylst[91]=new prvcty(16,93,'����');
ctylst[92]=new prvcty(16,94,'����');
ctylst[93]=new prvcty(16,95,'����');
ctylst[94]=new prvcty(16,96,'פ���');
ctylst[95]=new prvcty(16,97,'����Ͽ');
prvarr[17]=new prv(17,'����');
ctylst[96]=new prvcty(17,98,'�人');
ctylst[97]=new prvcty(17,99,'Т��');
ctylst[98]=new prvcty(17,100,'��ʯ');
ctylst[99]=new prvcty(17,101,'����');
ctylst[100]=new prvcty(17,102,'ɳ��');
ctylst[101]=new prvcty(17,103,'�˲�');
ctylst[102]=new prvcty(17,104,'�差');
prvarr[18]=new prv(18,'����');
ctylst[103]=new prvcty(18,105,'��ɳ');
ctylst[104]=new prvcty(18,106,'��̶');
ctylst[105]=new prvcty(18,107,'����');
ctylst[106]=new prvcty(18,108,'����');
ctylst[107]=new prvcty(18,109,'����');
ctylst[108]=new prvcty(18,110,'����');
prvarr[19]=new prv(19,'�㶫');
ctylst[109]=new prvcty(19,39,'����');
ctylst[110]=new prvcty(19,111,'����');
ctylst[111]=new prvcty(19,112,'����');
ctylst[112]=new prvcty(19,113,'��ͷ');
ctylst[113]=new prvcty(19,114,'����');
ctylst[114]=new prvcty(19,115,'��ɽ');
ctylst[115]=new prvcty(19,116,'տ��');
ctylst[116]=new prvcty(19,117,'��ݸ');
ctylst[117]=new prvcty(19,118,'��ɽ');
ctylst[118]=new prvcty(19,164,'�麣');
prvarr[20]=new prv(20,'����');
ctylst[119]=new prvcty(20,119,'����');
ctylst[120]=new prvcty(20,120,'����');
ctylst[121]=new prvcty(20,121,'����');
ctylst[122]=new prvcty(20,122,'����');
prvarr[21]=new prv(21,'����');
ctylst[123]=new prvcty(21,123,'����');
ctylst[124]=new prvcty(21,124,'����');
prvarr[22]=new prv(22,'�Ĵ�');
ctylst[125]=new prvcty(22,125,'�ɶ�');
ctylst[126]=new prvcty(22,126,'��Ԫ');
ctylst[127]=new prvcty(22,127,'����');
ctylst[128]=new prvcty(22,128,'����');
ctylst[129]=new prvcty(22,129,'����');
ctylst[130]=new prvcty(22,130,'�ﴨ');
ctylst[131]=new prvcty(22,131,'�ϳ�');
ctylst[132]=new prvcty(22,132,'����');
ctylst[133]=new prvcty(22,133,'����');
ctylst[134]=new prvcty(22,134,'����');
ctylst[135]=new prvcty(22,135,'üɽ');
ctylst[136]=new prvcty(22,136,'��ɽ');
ctylst[137]=new prvcty(22,137,'����');
ctylst[138]=new prvcty(22,138,'��֦��');
ctylst[139]=new prvcty(22,139,'�ڽ�');
ctylst[140]=new prvcty(22,140,'����');
ctylst[141]=new prvcty(22,141,'�˱�');
ctylst[142]=new prvcty(22,142,'�Թ�');
prvarr[23]=new prv(23,'����');
ctylst[143]=new prvcty(23,143,'����');
ctylst[144]=new prvcty(23,144,'����');
prvarr[24]=new prv(24,'����');
ctylst[145]=new prvcty(24,145,'����');
ctylst[146]=new prvcty(24,146,'����');
ctylst[147]=new prvcty(24,147,'����');
ctylst[148]=new prvcty(24,148,'����');
ctylst[149]=new prvcty(24,149,'����');
ctylst[150]=new prvcty(24,150,'��Ϫ');
ctylst[151]=new prvcty(24,151,'����');
prvarr[25]=new prv(25,'�ຣ');
ctylst[152]=new prvcty(25,152,'����');
ctylst[153]=new prvcty(25,153,'ƽ��');
ctylst[154]=new prvcty(25,154,'ͬ��');
ctylst[155]=new prvcty(25,155,'����');
prvarr[26]=new prv(26,'����');
ctylst[156]=new prvcty(26,156,'����');
prvarr[27]=new prv(27,'����');
ctylst[157]=new prvcty(27,157,'����');
prvarr[28]=new prv(28,'����');
ctylst[158]=new prvcty(28,158,'����');
ctylst[159]=new prvcty(28,159,'�Ӱ�');
ctylst[160]=new prvcty(28,160,'����');
ctylst[161]=new prvcty(28,161,'����');
ctylst[162]=new prvcty(28,162,'����');
ctylst[163]=new prvcty(28,163,'����');
prvarr[29]=new prv(29,'�½�');
ctylst[164]=new prvcty(29,164,'��³ľ��');
ctylst[165]=new prvcty(29,165,'����');
ctylst[166]=new prvcty(29,166,'ʯ����');
ctylst[167]=new prvcty(29,167,'��³��');
ctylst[168]=new prvcty(29,168,'�����');
ctylst[169]=new prvcty(29,169,'������');
ctylst[170]=new prvcty(29,170,'����');
ctylst[171]=new prvcty(29,171,'��������');
ctylst[172]=new prvcty(29,172,'����');
prvarr[30]=new prv(30,'����');
ctylst[173]=new prvcty(30,173,'����');
ctylst[174]=new prvcty(30,174,'����');
ctylst[175]=new prvcty(30,175,'����');
ctylst[176]=new prvcty(30,176,'����');
ctylst[177]=new prvcty(30,177,'��Ҵ');
ctylst[178]=new prvcty(30,178,'��Ȫ');
ctylst[179]=new prvcty(30,179,'��ˮ');
prvarr[31]=new prv(31,'����');
ctylst[180]=new prvcty(31,180,'������');
ctycnt=180;
function prvcty(pid,cid,name)
{this.pid=pid;this.cid=cid;this.name=name;}
function prv(id,name)
{this.id=id;this.name=name;}

function ctychg(n,k)
{	
	lth=document.formlogin.city.length
	for (i=0;i<=lth;i++)
	{
		document.formlogin.city.remove(0);
	}
	
	for (j=1;j<=ctycnt;j++)
	{   

	a=n.substring(0,n.indexOf(","));
		if (ctylst[j].pid==a)
		{
			var oOption = document.createElement("OPTION");

			oOption.text=ctylst[j].name;
			oOption.value=ctylst[j].name;
			document.formlogin.city.add(oOption);
			if (ctylst[j].name==k)
			{
				oOption.selected=1;
				cityname = ctylst[j].name;
			}
			oOption.empty;
		}
	}
}

function check()
{
	if (document.formlogin.name.value=="")
	{
		document.formlogin.name.focus();
		window.alert("�û������ܿգ������20���ַ�!");
		return false;  
	}
	if (document.formlogin.sex.value==0)
	{
		document.formlogin.sex.focus();
		window.alert("��ѡ���Ա�!");
		return false;  
	}
 if (document.formlogin.email.value == "" || document.formlogin.email.value.length < 1)            //�ж������Ƿ�Ϊ��
    {
	    alert("����������!");
	    document.formlogin.email.select();
	    document.formlogin.email.focus();
	    return (false);
	}

	var checkOKeemail = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-_@.";           //�ж��������Ƿ��зǷ��ַ�
	var checkStreemail = document.formlogin.email.value;
	var allValideemail = true;
	for (i = 0;  i < checkStreemail.length;  i++)
	{
		ch = checkStreemail.charAt(i);
		for (j = 0;  j < checkOKeemail.length;  j++)
		if (ch == checkOKeemail.charAt(j))
			break;
		if (j == checkOKeemail.length)
		{
			allValideemail = false;
			break;
		}
	}

	if (document.formlogin.email.value.length < 6 || document.formlogin.email.value.length >60) //�ж����䳤���Ƿ�Ϸ�
	{
		allValideemail = false;
	}

	if (!allValideemail)                                                   //�ж��������Ƿ��зǷ��ַ�
	{
		alert("������� \"�����ʼ���ַ\" ��Ч,��ע��Email��ַ�ĳ��ȼ��Ƿ������˷Ƿ��ַ�!");
		document.formlogin.email.select();
		document.formlogin.email.focus();
		return (false);
	}

	eemailvalue=document.formlogin.email.value;
    if(eemailvalue.length>0)
	{
        i=eemailvalue.indexOf("@");
        if(i==-1)
		{
			window.alert("�Բ���!������ĵ����ʼ���ַ�Ǵ����,��\"@\"��û��!");
			document.formlogin.email.select();
			document.formlogin.email.focus();
			return false
        }
        ii=eemailvalue.indexOf(".")
        if(ii==-1)
		{
			window.alert("�Բ���!������ĵ����ʼ���ַ�Ǵ���ģ���\".\"��û��!");
			document.formlogin.email.select();
			document.formlogin.email.focus();
			return false
        }
    }

  if (document.formlogin.email.value.indexOf('@') == -1 || document.formlogin.email.value.indexOf('@') == 0 || document.formlogin.email.value.indexOf('@') == document.formlogin.email.value.length-1)
  {
      alert("���ĵ����������ֲ��ԣ�@Ӧ������ȷ��λ��!");
	  document.formlogin.email.select();
      document.formlogin.email.focus();
      return (false);
  }
	/*if (document.formlogin.province.value=="")
	{
		document.formlogin.province.focus();
		window.alert("��ѡ������ʡ��!");
		return false;  
	}
	if (document.formlogin.city.value=="")
	{
		document.formlogin.city.focus();
		window.alert("��ѡ�����ڳ���!");
		return false;  
	}
	if (document.formlogin.tel.value=="")
	{
		document.formlogin.tel.focus();
		window.alert("����д��ϵ�绰!");
		return false;  
	}
	if (document.formlogin.address.value=="")
	{
		document.formlogin.address.focus();
		window.alert("����д��ϵ��ַ!");
		return false;  
	}
	if (document.formlogin.post.value.length<6 || isNaN(document.formlogin.post.value))
	{
		document.formlogin.post.focus();
		window.alert("����ȷ��д�ʱ�!");
		return false;  
	}
*/
return confirm("     ȷ�������ջ���Ϣ������?\r\n\r\nȷ����������Ϣ������Ȩ�޸�!");
}
</script>
                  </span></font></b></td>
              </tr>
              <tr> 
                <td height=2 valign=top bgcolor="#cc0000"></td>
              </tr>
              </tbody> 
            </table>
            <?php
$db->query("select * from $requests_t where user_id=$login_id order by id DESC");
$db->next_record();
$num=$db->num_rows();
?>
            <script language="JavaScript">
function old_user()
{
document.formlogin.name.value="<?php echo  $db->f('name') ?>";
document.formlogin.sex.value=<?php echo ($db->f('sex')) ? $db->f('sex') : "0" ?>;
document.formlogin.email.value="<?php echo  $db->f('email') ?>";
lth=document.formlogin.province.length;
	for (i=0;i<=lth;i++)
		document.formlogin.province.remove(0);
	var oOption = document.createElement("OPTION");
	oOption.text="��ѡ��ʡ��";
        document.formlogin.province.add(oOption);
       	oOption.selected=0;	
	oOption.empty;
	for (i=1;i<=prvcnt;i++)
	{   
			var oOption = document.createElement("OPTION");
			oOption.text=prvarr[i].name;
			oOption.value=prvarr[i].id+","+prvarr[i].name;
			document.formlogin.province.add(oOption);
	         	if (prvarr[i].name=="<?php echo $db->f('province') ?>")
	         	{ oOption.selected=1;
		   	  //oOption.empty;
		   	}
		   	
	}
ctychg(document.formlogin.province.value,"<?php echo $db->f('city') ?>");
document.formlogin.tel.value="<?php echo $db->f('tel') ?>";
document.formlogin.address.value="<?php echo  $db->f('address') ?>";
document.formlogin.post.value="<?php echo $db->f('post') ?>";
set_sele_pay(<?php echo intval($db->f('pay')) ?>);
document.formlogin.attrib.value="";
document.formlogin.name.focus();
}
function set_sele_pay(pay)
{
  for(i=0;i<formlogin.pay.length;i++)
   if (formlogin.pay[i].value==pay) formlogin.pay[i].checked=true;
}
</script>
            <?php
$db->query("select * from $user_t where id=$login_id");
$db->next_record();
?>
            <script language="JavaScript">
function my_info()
{
document.formlogin.name.value="<?php echo  $db->f('name') ?>";
document.formlogin.sex.value=<?php if ($db->f('sex')) echo $db->f('sex'); else "0"; ?>;
document.formlogin.email.value="<?php echo  $db->f('email') ?>";
lth=document.formlogin.province.length;
	for (i=0;i<=lth;i++)
		document.formlogin.province.remove(0);
	var oOption = document.createElement("OPTION");
	oOption.text="��ѡ��ʡ��";
        document.formlogin.province.add(oOption);
       	oOption.selected=0;	
	oOption.empty;
	for (i=1;i<=prvcnt;i++)
	{   
			var oOption = document.createElement("OPTION");
			oOption.text=prvarr[i].name;
			oOption.value=prvarr[i].id+","+prvarr[i].name;
			document.formlogin.province.add(oOption);
	         	if (prvarr[i].name=="<?php echo $db->f('province') ?>")
	         	{ oOption.selected=1;
		   	  //oOption.empty;
		   	}
		   	
	}
ctychg(document.formlogin.province.value,"<?php echo $db->f('city') ?>");
document.formlogin.tel.value="<?php echo $db->f('tel') ?>";
document.formlogin.address.value="<?php echo  $db->f('address') ?>";
document.formlogin.post.value="<?php echo $db->f('post') ?>";
document.formlogin.pay[0].checked=true;
document.formlogin.attrib.value="";
document.formlogin.name.focus();
}
function new_user()
{
document.formlogin.name.value="";
document.formlogin.sex.value=0;
document.formlogin.email.value="";
lth=document.formlogin.province.length;
	for (i=0;i<=lth;i++)
		document.formlogin.province.remove(0);
	var oOption = document.createElement("OPTION");
	oOption.text="��ѡ��ʡ��";
        document.formlogin.province.add(oOption);
       	oOption.selected=1;	
	oOption.empty;
	for (i=1;i<=prvcnt;i++)
	{   
			var oOption = document.createElement("OPTION");
			oOption.text=prvarr[i].name;
			oOption.value=prvarr[i].id+","+prvarr[i].name;
			document.formlogin.province.add(oOption);
	         	oOption.selected=0;
			oOption.empty;
	}
ctychg(document.formlogin.city.value,0);
document.formlogin.tel.value="";
document.formlogin.address.value="";
document.formlogin.post.value="";
document.formlogin.pay[0].checked=true;
document.formlogin.attrib.value="";
document.formlogin.name.focus();
}
function checkName()
{
	var args=checkName.arguments
	var strWord;
	var s;
	var lStringLength;
	var i;
	var bReturn;
		
	if ( args.length > 0)
	{
		strWord = args[0];
		lStringLength = strWord.length;
		if (lStringLength>0)
		{
			for (i=0;i<lStringLength;i++)
			{
				s = strWord.charCodeAt(i);
				bReturn = true;
				if(s<255)	
					bReturn = false;
				
				if (!bReturn)
				{
					alert('Ϊ�˹���˳������������ʵ��������');
					return false;
				}
					
			}
		}
	}
	return true;
}
</script>
            <form name="formlogin" method="post" action="payment.php" onSubmit=return(check());>
              <table width="100%" border="0">
                <tr> 
                  <td width="14%" align="center" height="18">�ա�������</td>
                  <td width="86%" height="18"> 
                    <input type="text" name="name" class="think" maxlength="20" size="12" onChange="JavaScript:if(!checkName(this.value)) return false;">
                    <font color="#CC0000">*</font> </td>
                </tr>
                <tr> 
                  <td width="14%" align="center">&nbsp;</td>
                  <td width="86%"><a href="javascript:new_user()"><font color=#cc0000><u>�½�������ջ���</u></font></a>&nbsp; 
                    <?php if ($num) 
                echo "<a href=\"javascript:old_user()\" ><font color='#cc0000'><u>ʹ���ϴε��ջ���ַ</u></font></a>";
               else 
                echo "<font color='#cc0000'>ʹ���ϴε��ջ���ַ</font>";
            ?>
                    &nbsp; <a href="javascript:my_info()"><font color="#cc0000"><u>���Լ���ע����Ϣ</u></font></a>��Ϊ�˹����˳������������ʵ������</td>
                </tr>
                <tr> 
                  <td width="14%" align="center">�ԡ�����</td>
                  <td width="86%"> 
                    <select name="sex">
                      <option value="0" selected>��ѡ��</option>
                      <option value="1">��</option>
                      <option value="2">Ů</option>
                    </select>
                  </td>
                </tr>
                <tr> 
                  <td width="14%" align="center">E-mail��</td>
                  <td width="86%"> 
                    <input type="text" name="email" class="think" maxlength="60" size="30">
                    <font color="#CC0000">*</font></td>
                </tr>
                <tr> 
                  <td align="right">����ʡ�ݣ� </td>
                  <td> 
                    <select  name=province onChange="ctychg(document.formlogin.province.value)" class="think">
                      <script language=javascript>
   			  document.write ("<option");
			  document.write (">")
			  document.write ("��ѡ��ʡ��");
			  document.write ("</option>");
			for (i=1;i<=prvcnt;i++)
			{
			  document.write ("<option ");
     		  document.write ("value="+prvarr[i].id+","+prvarr[i].name);
			  document.write (">");
			  document.write (prvarr[i].name);
			  document.write ("</option>");
			}
			</script>
                    </select>
                    <font color="#CC0000"> *</font></td>
                </tr>
                <tr> 
                  <td align="right">���ڳ��У� </td>
                  <td> 
                    <select id=city name=city  class="think">
                    </select>
                    <script language=javascript> 
			  ctychg(document.formlogin.province.value,0);
			</script>
                    <font color="#CC0000">*</font></td>
                </tr>
                <tr> 
                  <td width="14%" align="center">��ϵ�绰��</td>
                  <td width="86%"> 
                    <input type="text" name="tel" class="think" maxlength="40" size="20">
                    <font color="#CC0000">*</font></td>
                </tr>
                <tr> 
                  <td width="14%" align="center">��ϵ��ַ��</td>
                  <td width="86%"> 
                    <input type="text" name="address" class="think" maxlength="100" size="40">
                    <font color="#CC0000">*</font></td>
                </tr>
                <tr> 
                  <td width="14%" align="center">�ʡ����ࣺ</td>
                  <td width="86%"> 
                    <input type="text" name="post" class="think" maxlength="6" size="8">
                    <font color="#CC0000">*</font></td>
                </tr>
                <tr> 
                  <td colspan="2"><b>��ѡ�񸶿ʽ�� </b></td>
                </tr>
                <?php
				//for($h=0;$h<count($pay_str);$h++)
				$h=0;
				while(list($key,$val)=each($pay_str))
				{
				?>
                <tr> 
                  <td width="14%">&nbsp;</td>
                  <td width="86%">
                    <input type="radio" name="pay" value="<?php echo $key ?>" <?php if ($h==0) echo "checked"; ?>>
                    <?php echo ($h+1).". ".nl2br($val) ?>
                  </td>
                </tr>
                <?php
				$h++;
				 }
				 ?>
                <tr> 
                  <td width="14%"><b>�� �� �� ʽ��</b></td>
                  <td width="86%">&nbsp;</td>
                </tr>
                <tr> 
                  <td width="14%">&nbsp;</td>
                  <td width="86%">������EMS �ؿ�ר��<br>
                    ������˵��: �ڱ���˾�����κβ�Ʒ������EMS��ʽ����</td>
                </tr>
                <tr> 
                  <td width="14%">&nbsp;</td>
                  <td width="86%">&nbsp;</td>
                </tr>
                <tr> 
                  <td colspan="2"> 
                    <table width="630" border="0" cellspacing="0" cellpadding="0" align="center">
                      <tr> 
                        <th colspan="4" bgcolor="#FFFFFF" height="22" valign="top"> 
                          <div align="left"><b><font color="#cc6600"><b><font color="#cc6600"><b><font color="#CC0000" class="p14">�ͻ�����</font></b></font></b></font></b></div>
                        </th>
                      </tr>
                      <tr bgcolor="#CC0000"> 
                        <td colspan="4" height="2" valign="top"> </td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr> 
                  <td colspan="2"> 
                    <li>����������������µ绰��<?php echo $sitetel ?>�� ���� 
                    <li>��Ҫ����˫�����ͻ�,���������ͻ�Ҫ�����ڴ����ԣ� ���� 
                    <li>����Ҫ���������Ʒ����Ʊ���������Ҫ�����ڴ��� 
                  </td>
                </tr>
                <tr align="center"> 
                  <td colspan="2"> 
                    <textarea name="attrib" cols="80" rows="5" class="think"></textarea>
                  </td>
                </tr>
                <tr align="center"> 
                  <td colspan="2" height="34"> 
                    <input type="submit" name="Submit" value=" �� �� "  class=stbtm2>
                  </td>
                </tr>
              </table>
            </form>
          </td>
        </tr>
      </table>
      <?php } ?>
    </td>
  </tr>
</table>
<br>
<?php include "conf/footer.php"; ?>
</body>
</html>
