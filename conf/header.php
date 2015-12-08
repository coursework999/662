
<!-- Header of custom page -->

<table width="750"  border="0"  align="center" cellspacing="0">
  <tr> 
    <td align="right" colspan="3" bgcolor="#E1ECff"> <a href="my_index.php" >Homepage</a>
      | <a href="my_register1.php">User Registration</a> | <a href="my_login.php">User Login</a>
      | <a href="my_modify.php">Modify Profile</a> | <a href="my_admin.php">Admin Entry</a>
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
      &nbsp;&nbsp;<a href="my_buystore.php">Favoriate</a>
      &nbsp;&nbsp;<a href="my_bank.php">Checkout</a>
      &nbsp;&nbsp;<a href="my_dingdang.php">Orders</a>&nbsp;</td>
  </tr>
</table>
<table width="750" border="1" cellpadding="3" cellspacing="1" bgcolor="#000000" bordercolor="#FFFFFF" align="center">
  <tr>
    <td bgcolor="#FEFADA"> 
      <table width="750" align="center" bgcolor="#FEFADA" cellspacing="0" cellpadding="0">
        <form name="formsearch" method="post" action="my_index_s.php" onSubmit="return chk();">
          <tr> 
            <td>&nbsp;&nbsp;
              <?php
  $db->query("select * from $class_t where up_id=0");
  $tmp1="";
  while($db->next_record())
   {
    echo "<a href='my_index.php?category_num=".$db->f('id')."' class='title'>".$db->f('name')."</a>&nbsp;&nbsp;&nbsp;&nbsp;";
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

