<table width="750"  border="0"  align="center" cellspacing="0">
  <tr> 
    <td align="right" colspan="3" bgcolor="#E1ECff"> <a href="index.php" >商城首页</a> 
      | <a href="register1.php">用户注册</a> | <a href="login.php">快速登录</a> | <a href="modify.php">资料修改</a> 
      | <a href="logout.php">退出系统</a> | <a href="service.php">客服中心</a> 
      <?php
if ($guestbook)
  echo ' | <a href="guestbook/" target="_blank"><font color=blue>客户留言</font></a> ';
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
          <td align="center" height="18"><a href="#" class="clink03" title="加入收藏" onClick="window.external.AddFavorite('<?php echo $siteurl; ?>', '<?php echo $sitename; ?>')"><img src="images/bookmark.gif" width="15" height="13" border="0" align="absmiddle">加入收藏</a></td>
        </tr>
        <tr> 
          <td align="center" height="18"><a href="#" class="clink03" title="设为首页" onClick="this.style.behavior='url(#default#homepage)';this.setHomePage('<?php echo $siteurl; ?>');"><img src="images/home.gif" width="16" height="16" border="0" align="absmiddle">设为首页</a></td>
        </tr>
        <tr> 
          <td align="center" height="18"><a href="mailto:<?php echo $siteemail; ?>" class="clink03" title="给我们Mail"><img src="images/email.gif" width="15" height="15" border="0" align="absmiddle">给我Mail</a></td>
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
            <td>&nbsp;&nbsp;<a href="index.php" class="title"><font color=blue>首 页</font></a> &nbsp;&nbsp;<a href="news.php" class="title"><font color=blue>行业动态</font></a>&nbsp;&nbsp; 
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
   window.alert("请填写商品搜索关键字!");
   document.formsearch.key.focus();
   return false; 
}
}   
</script>
              商品搜索: 
              <input class=think name=key size=12  type=text >
              <select name="sf">
                <option value="0" selected>所有分类</option>
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
  if(sWeek == 0) sWeek = "<font color=red>星期天</font>";
  if(sWeek == 1) sWeek = "星期一";
  if(sWeek == 2) sWeek = "星期二";
  if(sWeek == 3) sWeek = "星期三";
  if(sWeek == 4) sWeek = "星期四";
  if(sWeek == 5) sWeek = "星期五";
  if(sWeek == 6) sWeek = "<font color=red>星期六</font>";
  if(sHour <= 9) sHour = "0" + sHour;
  if(sMinute <= 9) sMinute = "0" + sMinute;
  if(sSecond <= 9) sSecond = "0" + sSecond;
  sClock = "&nbsp;&nbsp;" + iYear + "年" + (iMonth + 1) + "月" + iDay + "日 " + sWeek
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
