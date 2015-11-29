<table width="750"  border="0"  align="center" cellspacing="0">
  <tr> 
    <td align="right" colspan="3" bgcolor="#E1ECff"> <a href="my_index.php" >Homepage</a>
      | <a href="my_register1.php">User Registration</a> | <a href="my_login.php">Login</a> | <a href="my_modify.php">Modify Profile</a>
      | <a href="my_logout.php"><font color="red">Logout</font></a>
      &nbsp; </td>
  </tr>
  <tr> 
    <td align="right" width="280"> <a href="<?php echo $siteurl ?>" target="_blank"><img src="images/logo.jpg" border="0" width="400" height="90"></a></td>
    <td align="right" width="368">
      <?php include "ad.php"; ?>
    </td>
    <td width="150" valign="middle">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td align="center" height="18"><a href="#" class="clink03" title="add" onClick="window.external.AddFavorite('<?php echo $siteurl; ?>', '<?php echo $sitename; ?>')"><img src="images/bookmark.gif" width="15" height="13" border="0" align="absmiddle">Add Favorite</a></td>
        </tr>
        <tr> 
          <td align="center" height="18"><a href="#" class="clink03" title="setHomePage" onClick="this.style.behavior='url(#default#homepage)';this.setHomePage('<?php echo $siteurl; ?>');"><img src="images/home.gif" width="16" height="16" border="0" align="absmiddle">Set Homepage</a></td>
        </tr>
        <tr> 
          <td align="center" height="18"><a href="mailto:<?php echo $siteemail; ?>" class="clink03" title="Mail to us"><img src="images/email.gif" width="15" height="15" border="0" align="absmiddle">Mail To Me</a></td>
        </tr>
      </table>
    </td>
  </tr>
  <tr> 
    <td bgcolor="#ffffff" id="clock">&nbsp; </td>
    <td align="right" bgcolor="#ffffff" colspan="2"><a href="my_buycar.php">Shopping Cart</a>
      &nbsp;&nbsp;<a href="my_buystore.php">Wish List</a>
      &nbsp;&nbsp;<a href="my_bank.php">Payment</a>
      &nbsp;&nbsp;<a href="my_dingdang.php">Orders</a>&nbsp;</td>
  </tr>
</table>
<table width="750" border="1" cellpadding="3" cellspacing="1" bgcolor="#000000" bordercolor="#FFFFFF" align="center">
  <tr>
    <td bgcolor="#FEFADA"> 
      <table width="750" align="center" bgcolor="#FEFADA" cellspacing="0" cellpadding="0">
        <form name="formsearch" method="post" action="index_s.php" onSubmit="return chk();">
          <tr> 
            <td>&nbsp;&nbsp;
              <?php
  $db->query("select * from $class_t where up_id=0");
  $tmp1="";
  while($db->next_record())
   {
    echo "<a href='my_index.php?up_id=".$db->f('id')."' class='title'>".$db->f('name')."</a>&nbsp;&nbsp;&nbsp;&nbsp;";
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
   window.alert("Please input keywords of products!");
   document.formsearch.key.focus();
   return false; 
}
}   
</script>
              Product Search:
              <input class=think name=key size=12  type=text >
              <select name="sf">
                <option value="0" selected>All Categories</option>
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
<script language="Javascript">
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
