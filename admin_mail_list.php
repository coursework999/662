<?php
require "conf/config.php";
include "admin_check.php";
?>
<html>
<head>
<title><?php echo $sitename ?> -- �ʼ��б�</title>
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
        �����ʼ��б�
        <script language="JavaScript">
function check()
{
if (document.form1.from.value == ""){
       alert("����д������!");
       document.form1.from.focus();
      return false;}
if (document.form1.subject.value == ""){
       alert("����д����!");
       document.form1.subject.focus();
      return false;}
if (document.form1.body.value == ""){
       alert("����д����!");
       document.form1.body.focus();
      return false;}
return confirm("ȷ��Ҫ������?");
}
</script>
        <br>
      </p>
      <?php
# ����û��Ѿ�����"Send"��ť" 
if ($send)
{
 if ($mf=="html")
  {
     # ����ֽ��� 
    $boundary = uniqid("");
     # ȷ���ϴ��ļ���MIME���� 
    if ($attachment_type) $mimeType = $attachment_type;
     # ��������û��ָ���ļ���MIME���ͣ�
    # ���ǿ��԰�����Ϊ"application/unknown". 
    else $mimeType =  "text/html";
    # ȷ���ļ������� 
/*  $fileName = $attachment_name;
     # ���ļ� 
    $fp = fopen($attachment,  "r");
     # �������ļ�����һ������ 
    $read = fread($fp, filesize($attachment));
     # �ã����ڱ���$read�б�����ǰ��������ļ����ݵ��ı��顣
# ��������Ҫ������ı���ת�����ʼ�������Զ����ĸ�ʽ
#  ������base64������������
    $body = base64_encode($body);
     # ����������һ����base64��������ĳ��ַ�����
# ��һ������Ҫ��������ַ����г���ÿ��76���ַ���ɵ�С��
    $body = chunk_split($body);
*/
   # �����ʼ�ͷ 
    $headers =  "From: $from
Content-type: $mimeType; boundary=\"$boundary\"";
     # �������ǿ��Խ����ʼ������� 
  }
 if ($mf=="text") $headers="From: $from";

$db->query("select email from $user_t");
while($db->next_record())  
 mail($db->f('email'), $subject, $body,$headers);  
echo "<br><br>�����ʼ����ͳɹ���";
}
else
{
?>
      <form name="form1" method="post" action="" onSubmit="return check()">
        <table align=center bgcolor=#ffe6bf border=1 bordercolor=#d5ab7d 
      bordercolordark=#fff0d9 cellpadding=2 cellspacing=0 width="90%">
          <tbody> 
          <tr bgcolor=#ffd18c> 
            <td align=middle height="19" width="19%">��Ŀ</td>
            <td height="19" width="81%">��д</td>
          </tr>
          <tr> 
            <td align=right width="19%">�����ˣ�</td>
            <td width="81%"> 
              <input class="ks" name=from value="<?php echo $siteemail ?>">
            </td>
          </tr>
          <tr> 
            <td align=right width="19%">�ռ��ˣ�</td>
            <td width="81%"><font color="#0000FF">��վ���е�ע���Ա(ע���û���<?php
			  $db->query("select null from $user_t");
  echo $db->num_rows(); ?>)</font></td>
          </tr>
          <tr> 
            <td align=right width="19%">�� �⣺</td>
            <td width="81%"> 
              <input class="ks" name=subject>
            </td>
          </tr>
          <tr> 
            <td align=right width="19%" height="34">�ʼ���ʽ��</td>
            <td width="81%" height="34"> 
              <input type="radio" name="mf" value="html" checked>
              html��ʽ �� 
              <input type="radio" name="mf" value="text">
              text��ʽ </td>
          </tr>
          <tr> 
            <td align=right width="19%" height="34">�� �ݣ�</td>
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
              <input class="stbtm" name=send type=submit  value="�������͡�">
              ���� 
              <input class=stbtm name=Reset type=reset value="���ء��">
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
