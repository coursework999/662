<?php
require "conf/config.php";
include "admin_check.php";
?>
<html>
<head>
<title><?php echo $sitename ?> -- 浏览会员</title>
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
                  您的详细信息：</font></b></font></th>
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
                      <td align="right" width="21%">会员用户名：</td>
                      <td width="79%"> <font color="#CC0000"> 
                        <?php echo $db->f('u_name') ?>
                        </font></td>
                    </tr>
                    <tr bgcolor="#FFFFFF"> 
                      <td align="right" height="27" width="21%">密码：</td>
                      <td height="27" width="79%"> <font color="#CC0000"> 
                        <?php echo $db->f('u_pass') ?>
                        </font></td>
                    </tr>
                    <tr bgcolor="#FFFFFF"> 
                      <td align="right" width="21%">您的Email：</td>
                      <td width="79%"> <font color="#CC0000"> 
                        <?php echo "<a href='mailto:".$db->f('email')."' class='clink03'>".$db->f('email')."</a>"; ?>
                        </font></td>
                    </tr>
                    <tr bgcolor="#FFFFFF"> 
                      <td align="right" width="21%">真实姓名：</td>
                      <td width="79%"> <font color="#CC0000"> 
                        <?php echo $db->f('name') ?>
                        </font></td>
                    </tr>
                    <tr bgcolor="#FFFFFF"> 
                      <td width="21%" align="right">性　别： </td>
                      <td width="79%"> <font color="#CC0000"> 
                        <?php if ($db->f('sex')==1) echo "男"; else echo "女"; ?>
                        </font></td>
                    </tr>
                    <tr bgcolor="#FFFFFF"> 
                      <td align="right" width="21%">所在省份： </td>
                      <td width="79%"> <font color="#CC0000"> 
                        <?php echo $db->f('province') ?>
                        </font></td>
                    </tr>
                    <tr bgcolor="#FFFFFF"> 
                      <td align="right" width="21%">所在城市： </td>
                      <td width="79%"> <font color="#CC0000"> 
                        <?php echo $db->f('city') ?>
                        </font></td>
                    </tr>
                    <tr bgcolor="#FFFFFF"> 
                      <td align="right" width="21%">联系电话： </td>
                      <td width="79%"> <font color="#CC0000"> 
                        <?php echo $db->f('tel') ?>
                        </font></td>
                    </tr>
                    <tr bgcolor="#FFFFFF"> 
                      <td align="right" width="21%">联系地址： </td>
                      <td width="79%"> <font color="#CC0000"> 
                        <?php echo $db->f('address') ?>
                        </font></td>
                    </tr>
                    <tr bgcolor="#FFFFFF"> 
                      <td align="right" width="21%">邮 编： </td>
                      <td width="79%"> <font color="#CC0000"> 
                        <?php echo $db->f('post') ?>
                        </font></td>
                    </tr>
                    <tr bgcolor="#FFFFFF"> 
                      <td align="right" width="21%">证件类型：</td>
                      <td width="79%"> <font color="#CC0000"> 
                        <?php
    if ($db->f('paper_name')==1) $ss="身份证";
    if ($db->f('paper_name')==2) $ss="学生证";
    if ($db->f('paper_name')==3) $ss="军人证";
    echo $ss;
    ?>
                        </font></td>
                    </tr>
                    <tr bgcolor="#FFFFFF"> 
                      <td align="right" width="21%">证件号码：</td>
                      <td width="79%" bgcolor="#FFFFFF"> <font color="#CC0000"> 
                        <?php echo $db->f('paper_num') ?>
                        </font></td>
                    </tr>
                    <tr bgcolor="#FFFFFF"> 
                      <td width="22%" align="right">营业执照编号：</td>
                      <td width="78%"><font color="#CC0000">
                        <?php echo $db->f('zzbh') ?>
                        </font> </td>
                    </tr>
                    <tr bgcolor="#FFFFFF"> 
                      <td width="22%" align="right">开户行：</td>
                      <td width="78%"><font color="#CC0000">
                        <?php echo $db->f('khhh') ?>
                        </font> </td>
                    </tr>
                    <tr bgcolor="#FFFFFF"> 
                      <td width="22%" align="right">开户账户：</td>
                      <td width="78%"><font color="#CC0000">
                        <?php echo $db->f('khzh') ?>
                        </font> </td>
                    </tr>
                    <tr bgcolor="#FFFFFF"> 
                      <td width="21%" align="right">注册时间：</td>
                      <td width="79%"> <font color="#CC0000"> 
                        <?php echo $db->f('reg_date'); ?>
                        </font></td>
                    </tr>
                    <tr bgcolor="#FFFFFF"> 
                      <td width="21%" align="right">最后登录时间：</td>
                      <td width="79%"> <font color="#CC0000"> 
                        <?php echo $db->f('last_date'); ?>
                        </font></td>
                    </tr>
                    <tr bgcolor="#FFFFFF"> 
                      <td width="21%" align="right">访问次数：</td>
                      <td width="79%"> <font color="#CC0000"> 
                        <?php echo $db->f('times');?>
                        </font></td>
                    </tr>
                    <tr bgcolor="#FFFFFF"> 
                      <td width="21%" align="right">备 注：</td>
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
 echo "<br><br>对不起，您浏览的用户不存在!<br><br>";
?>
    </td>
  </tr>
</table>
<br>
<?php include "conf/footer.php"; ?>
</body>
</html>
