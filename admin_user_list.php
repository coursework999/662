<?php
require "conf/config.php";
include "admin_check.php";
?>
<html>
<head>
<title><?php echo $sitename ?> -- �����Ա</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<?php echo $http_head; ?>
<link rel="stylesheet" href="conf/style.css" type="text/css">
</head>
<body bgcolor="#FFFFFF" text="#000000">
<?php include "conf/admin.php"; ?>
<table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr align="center"> 
    <td>&nbsp;</td>
  </tr>
  <tr align="center" bgcolor="#EFEFEF"> 
    <td> 
      <?php
$db->query("select * from $user_t where id=$id");
$db->next_record();
if ($db->num_rows())
  {
?>
      <table width="630" border="0">
        <tr> 
          <td height="18" class="p14"> 
            <table border=0 cellpadding=0 cellspacing=0 width="100%">
              <tbody> 
              <tr align="left"> 
                <th bgcolor=#ffffff colspan=4 height=22 valign=top><font color=#ffffcc 
                  face="Arial, Helvetica, sans-serif"><b><font class=p14 
                  color=#cc0000>
                  <?php echo $db->f('u_name') ?>
                  ������ϸ��Ϣ��</font></b></font></th>
              </tr>
              <tr bgcolor=#cc0000> 
                <td colspan=4 height=2 valign=top></td>
              </tr>
              </tbody> 
            </table>
          </td>
        </tr>
        <tr align="center"> 
          <td height="18"> 
    
              <table width="96%" border="1" bordercolorlight="#d2d2d2" cellpadding="0" cellspacing="0" bordercolordark="#ffffff">
                <tr align="center"> 
                  <td> 
                    
                  <table width="90%" border="1" height="381" cellspacing="1" cellpadding="3" bgcolor="#CCCCCC" bordercolor="#FFFFFF">
                    <tr bgcolor="#FFFFFF"> 
                      <td align="right" width="21%">��Ա�û�����</td>
                      <td width="79%"> <font color="#CC0000"> 
                        <?php echo $db->f('u_name') ?>
                        </font></td>
                    </tr>
                    <tr bgcolor="#FFFFFF"> 
                      <td align="right" height="27" width="21%">���룺</td>
                      <td height="27" width="79%"> <font color="#CC0000"> 
                        <?php echo $db->f('u_pass') ?>
                        </font></td>
                    </tr>
                    <tr bgcolor="#FFFFFF"> 
                      <td align="right" width="21%">����Email��</td>
                      <td width="79%"> <font color="#CC0000"> 
                        <?php echo "<a href='mailto:".$db->f('email')."' class='clink03'>".$db->f('email')."</a>"; ?>
                        </font></td>
                    </tr>
                    <tr bgcolor="#FFFFFF"> 
                      <td align="right" width="21%">��ʵ������</td>
                      <td width="79%"> <font color="#CC0000"> 
                        <?php echo $db->f('name') ?>
                        </font></td>
                    </tr>
                    <tr bgcolor="#FFFFFF"> 
                      <td width="21%" align="right">�ԡ��� </td>
                      <td width="79%"> <font color="#CC0000"> 
                        <?php if ($db->f('sex')==1) echo "��"; else echo "Ů"; ?>
                        </font></td>
                    </tr>
                    <tr bgcolor="#FFFFFF"> 
                      <td align="right" width="21%">����ʡ�ݣ� </td>
                      <td width="79%"> <font color="#CC0000"> 
                        <?php echo $db->f('province') ?>
                        </font></td>
                    </tr>
                    <tr bgcolor="#FFFFFF"> 
                      <td align="right" width="21%">���ڳ��У� </td>
                      <td width="79%"> <font color="#CC0000"> 
                        <?php echo $db->f('city') ?>
                        </font></td>
                    </tr>
                    <tr bgcolor="#FFFFFF"> 
                      <td align="right" width="21%">��ϵ�绰�� </td>
                      <td width="79%"> <font color="#CC0000"> 
                        <?php echo $db->f('tel') ?>
                        </font></td>
                    </tr>
                    <tr bgcolor="#FFFFFF"> 
                      <td align="right" width="21%">��ϵ��ַ�� </td>
                      <td width="79%"> <font color="#CC0000"> 
                        <?php echo $db->f('address') ?>
                        </font></td>
                    </tr>
                    <tr bgcolor="#FFFFFF"> 
                      <td align="right" width="21%">�� �ࣺ </td>
                      <td width="79%"> <font color="#CC0000"> 
                        <?php echo $db->f('post') ?>
                        </font></td>
                    </tr>
                    <tr bgcolor="#FFFFFF"> 
                      <td align="right" width="21%">֤�����ͣ�</td>
                      <td width="79%"> <font color="#CC0000"> 
                        <?php
    if ($db->f('paper_name')==1) $ss="���֤";
    if ($db->f('paper_name')==2) $ss="ѧ��֤";
    if ($db->f('paper_name')==3) $ss="����֤";
    echo $ss;
    ?>
                        </font></td>
                    </tr>
                    <tr bgcolor="#FFFFFF"> 
                      <td align="right" width="21%">֤�����룺</td>
                      <td width="79%" bgcolor="#FFFFFF"> <font color="#CC0000"> 
                        <?php echo $db->f('paper_num') ?>
                        </font></td>
                    </tr>
                    <tr bgcolor="#FFFFFF"> 
                      <td width="22%" align="right">Ӫҵִ�ձ�ţ�</td>
                      <td width="78%"><font color="#CC0000">
                        <?php echo $db->f('zzbh') ?>
                        </font> </td>
                    </tr>
                    <tr bgcolor="#FFFFFF"> 
                      <td width="22%" align="right">�����У�</td>
                      <td width="78%"><font color="#CC0000">
                        <?php echo $db->f('khhh') ?>
                        </font> </td>
                    </tr>
                    <tr bgcolor="#FFFFFF"> 
                      <td width="22%" align="right">�����˻���</td>
                      <td width="78%"><font color="#CC0000">
                        <?php echo $db->f('khzh') ?>
                        </font> </td>
                    </tr>
                    <tr bgcolor="#FFFFFF"> 
                      <td width="21%" align="right">ע��ʱ�䣺</td>
                      <td width="79%"> <font color="#CC0000"> 
                        <?php echo $db->f('reg_date'); ?>
                        </font></td>
                    </tr>
                    <tr bgcolor="#FFFFFF"> 
                      <td width="21%" align="right">����¼ʱ�䣺</td>
                      <td width="79%"> <font color="#CC0000"> 
                        <?php echo $db->f('last_date'); ?>
                        </font></td>
                    </tr>
                    <tr bgcolor="#FFFFFF"> 
                      <td width="21%" align="right">���ʴ�����</td>
                      <td width="79%"> <font color="#CC0000"> 
                        <?php echo $db->f('times');?>
                        </font></td>
                    </tr>
                    <tr bgcolor="#FFFFFF"> 
                      <td width="21%" align="right">�� ע��</td>
                      <td width="79%"> <font color="#CC0000"> 
                        <?php echo $db->f('attrib') ?>
                        </font></td>
                    </tr>
                  </table>
                  </td>
                </tr>
              </table>
            
          </td>
        </tr>
      </table>
      <?php
}
else
 echo "<br><br>�Բ�����������û�������!<br><br>";
?>
    </td>
  </tr>
</table>
<br>
<?php include "conf/footer.php"; ?>
</body>
</html>
