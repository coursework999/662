<table width="750"  border="0"  align="center" cellspacing="0">
  <tr> 
    <td align="right" colspan="3" bgcolor="#E1ECff"> <a href="index.php" >�̳���ҳ</a> 
      | <a href="register1.php">�û�ע��</a> | <a href="login.php">���ٵ�¼</a> | <a href="modify.php">�����޸�</a> 
      | <a href="logout.php">�˳�ϵͳ</a> | <a href="service.php">�ͷ�����</a> 
      <?php
if ($guestbook)
  echo ' | <a href="guestbook/" target="_blank"><font color=blue>�ͻ�����</font></a> ';
if ($bbs_url)
  echo " | <a href=\"$bbs_url\" target=\"_blank\"><font color=blue>$bbs_name</font></a> ";
?>
      &nbsp; </td>
  </tr>
  <tr> 
    <td align="right" width="180"> <a href="<?php echo $siteurl ?>" target="_blank"><img src="images/logo.gif" border="0" width="200" height="70"></a></td>
    <td align="right" width="468"> 
      <?php include "ad.php"; ?>
    </td>
    <td width="100" valign="middle"> 
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td align="center" height="18"><a href="#" class="clink03" title="�����ղ�" onClick="window.external.AddFavorite('<?php echo $siteurl; ?>', '<?php echo $sitename; ?>')"><img src="images/bookmark.gif" width="15" height="13" border="0" align="absmiddle">�����ղ�</a></td>
        </tr>
        <tr> 
          <td align="center" height="18"><a href="#" class="clink03" title="��Ϊ��ҳ" onClick="this.style.behavior='url(#default#homepage)';this.setHomePage('<?php echo $siteurl; ?>');"><img src="images/home.gif" width="16" height="16" border="0" align="absmiddle">��Ϊ��ҳ</a></td>
        </tr>
        <tr> 
          <td align="center" height="18"><a href="mailto:<?php echo $siteemail; ?>" class="clink03" title="������Mail"><img src="images/email.gif" width="15" height="15" border="0" align="absmiddle">����Mail</a></td>
        </tr>
      </table>
    </td>
  </tr>
  <tr> 
    <td bgcolor="#ffffff" id="clock">&nbsp; </td>
    <td align="right" bgcolor="#ffffff" colspan="2"><a href="buycar.php"><img src="images/gwc.gif" width="72" height="19" border="0"></a> 
      &nbsp;&nbsp;<a href="buystore.php"><img src="images/scj.gif" border="0"></a> 
      &nbsp;&nbsp;<a href="bank.php"><img src="images/syt.gif" width="72" height="21" border="0"></a> 
      &nbsp;&nbsp;<a href="dingdang.php"><img src="images/cy.gif" width="84" height="21" border="0"></a>&nbsp;</td>
  </tr>
</table>
<table width="750" border="1" cellpadding="3" cellspacing="1" bgcolor="#000000" bordercolor="#FFFFFF" align="center">
  <tr>
    <td bgcolor="#FEFADA"> 
      <table width="750" align="center" bgcolor="#FEFADA" cellspacing="0" cellpadding="0">
        <form name="formsearch" method="post" action="index_s.php" onSubmit="return chk();">
          <tr> 
            <td>&nbsp;&nbsp;<a href="index.php" class="title"><font color=blue>�� ҳ</font></a> &nbsp;&nbsp;<a href="news.php" class="title"><font color=blue>��ҵ��̬</font></a>&nbsp;&nbsp; 
              <?php
  $db->query("select * from $class_t where up_id=0");
  $tmp1="";
  while($db->next_record())
   {
    echo "<a href='index.php?up_id=".$db->f('id')."' class='title'>".$db->f('name')."</a>&nbsp;&nbsp;&nbsp;&nbsp;";
    $tmp1.="<option value=\"".$db->f('id')."\">".$db->f('name')."</option>";
	}	
  ?>
            </td>
            <td width="270" > 
              <script language=JavaScript>
function chk()
{
if(document.formsearch.key.value=="")
{
   window.alert("����д��Ʒ�����ؼ���!");
   document.formsearch.key.focus();
   return false; 
}
}   
</script>
              ��Ʒ����: 
              <input class=think name=key size=12  type=text >
              <select name="sf">
                <option value="0" selected>���з���</option>
                <?php echo $tmp1 ?>
              </select>
              <input type="submit" name="submit" value="GO">
            </td>
          </tr>
        </form>
      </table>
    </td>
  </tr>
</table>
<script language="Javascript1.2">
<!--
function show() {
  if(!document.layers && !document.all) return;
  var d = new Date();
  var iYear = d.getYear()
  var iMonth = d.getMonth()
  var iDay = d.getDate()
  var sWeek = d.getDay()
  var sHour  = d.getHours()
  var sMinute = d.getMinutes()
  var sSecond = d.getSeconds()
  if(sWeek == 0) sWeek = "<font color=red>������</font>";
  if(sWeek == 1) sWeek = "����һ";
  if(sWeek == 2) sWeek = "���ڶ�";
  if(sWeek == 3) sWeek = "������";
  if(sWeek == 4) sWeek = "������";
  if(sWeek == 5) sWeek = "������";
  if(sWeek == 6) sWeek = "<font color=red>������</font>";
  if(sHour <= 9) sHour = "0" + sHour;
  if(sMinute <= 9) sMinute = "0" + sMinute;
  if(sSecond <= 9) sSecond = "0" + sSecond;
  sClock = "&nbsp;&nbsp;" + iYear + "��" + (iMonth + 1) + "��" + iDay + "�� " + sWeek
    + " " + sHour + ":" + sMinute + ":" + sSecond;
  if(document.layers) {
    document.layers.clock.document.write(sClock);
    document.layers.clock.document.close();
  }
  else if(document.all)
    clock.innerHTML = sClock;
  setTimeout("show()", 1000);
}
show();
//-->
</script>
