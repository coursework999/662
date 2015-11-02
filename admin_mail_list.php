<?php
require "conf/config.php";
include "admin_check.php";
?>
<html>
<head>
<title><?php echo $sitename ?> -- 邮件列表</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<?php echo $http_head; ?>
<link rel="stylesheet" href="conf/style.css" type="text/css">
</head>
<body bgcolor="#FFFFFF" text="#000000">
<?php include "conf/admin.php"; ?>
<table width="750" align="center">
  <tr align="center"> 
    <td bgcolor="#EFEFEF"> 
      <p class="p13"><br>
        发送邮件列表
        <script language="JavaScript">
function check()
{
if (document.form1.from.value == ""){
       alert("请填写发件人!");
       document.form1.from.focus();
      return false;}
if (document.form1.subject.value == ""){
       alert("请填写主题!");
       document.form1.subject.focus();
      return false;}
if (document.form1.body.value == ""){
       alert("请填写内容!");
       document.form1.body.focus();
      return false;}
return confirm("确定要发送吗?");
}
</script>
        <br>
      </p>
      <?php
# 如果用户已经按了"Send"按钮" 
if ($send)
{
 if ($mf=="html")
  {
     # 定义分界线 
    $boundary = uniqid("");
     # 确定上传文件的MIME类型 
    if ($attachment_type) $mimeType = $attachment_type;
     # 如果浏览器没有指定文件的MIME类型，
    # 我们可以把它设为"application/unknown". 
    else $mimeType =  "text/html";
    # 确定文件的名字 
/*  $fileName = $attachment_name;
     # 打开文件 
    $fp = fopen($attachment,  "r");
     # 把整个文件读入一个变量 
    $read = fread($fp, filesize($attachment));
     # 好，现在变量$read中保存的是包含整个文件内容的文本块。
# 现在我们要把这个文本块转换成邮件程序可以读懂的格式
#  我们用base64方法把它编码
    $body = base64_encode($body);
     # 现在我们有一个用base64方法编码的长字符串。
# 下一件事是要把这个长字符串切成由每行76个字符组成的小块
    $body = chunk_split($body);
*/
   # 生成邮件头 
    $headers =  "From: $from
Content-type: $mimeType; boundary=\"$boundary\"";
     # 现在我们可以建立邮件的主体 
  }
 if ($mf=="text") $headers="From: $from";

$db->query("select email from $user_t");
while($db->next_record())  
 mail($db->f('email'), $subject, $body,$headers);  
echo "<br><br>所有邮件发送成功！";
}
else
{
?>
      <form name="form1" method="post" action="" onSubmit="return check()">
        <table align=center bgcolor=#ffe6bf border=1 bordercolor=#d5ab7d 
      bordercolordark=#fff0d9 cellpadding=2 cellspacing=0 width="90%">
          <tbody> 
          <tr bgcolor=#ffd18c> 
            <td align=middle height="19" width="19%">项目</td>
            <td height="19" width="81%">填写</td>
          </tr>
          <tr> 
            <td align=right width="19%">发件人：</td>
            <td width="81%"> 
              <input class="ks" name=from value="<?php echo $siteemail ?>">
            </td>
          </tr>
          <tr> 
            <td align=right width="19%">收件人：</td>
            <td width="81%"><font color="#0000FF">网站所有的注册会员(注册用户：<?php
			  $db->query("select null from $user_t");
  echo $db->num_rows(); ?>)</font></td>
          </tr>
          <tr> 
            <td align=right width="19%">主 题：</td>
            <td width="81%"> 
              <input class="ks" name=subject>
            </td>
          </tr>
          <tr> 
            <td align=right width="19%" height="34">邮件格式：</td>
            <td width="81%" height="34"> 
              <input type="radio" name="mf" value="html" checked>
              html格式 　 
              <input type="radio" name="mf" value="text">
              text格式 </td>
          </tr>
          <tr> 
            <td align=right width="19%" height="34">内 容：</td>
            <td width="81%" height="34"> 
              <textarea name="body" cols="50" rows="6"></textarea>
            </td>
          </tr>
          <tr> 
            <td width="19%" height="2">&nbsp;</td>
            <td width="81%" height="2">&nbsp;</td>
          </tr>
          <tr bgcolor=#ffd18c> 
            <td colspan=2 align="center"> <br>
              <input class="stbtm" name=send type=submit  value="　发　送　">
              　　 
              <input class=stbtm name=Reset type=reset value="　重　填　">
            </td>
          </tr>
          </tbody> 
        </table>
      </form>
      <?php } ?>
      <p class="p13">&nbsp;</p>
      </td>
  </tr>
</table>
<br>
<?php include "conf/footer.php"; ?>
</body>
</html>
