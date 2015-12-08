<?php
require "conf/config.php";
include "chk.php";
?>
<html>
<head>
    <title><?php echo $sitename ?> -- Checkout</title>
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
    echo  "<br><input class=stbtm1 name='Go on shopping' onClick=\"window.location.href='index.php';\" type=button value='Go on shopping'>";
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
        <td align="center"><b><font class=p14 color=#cc0000>Shopping cart</font></b></td>
    </tr>
    <tr>
        <td>
            <table cellpadding=0 cellspacing=0 width=630>
                <tbody>

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
                                                size=2>Name</font></td>
                    <td width="15%" align="center" bgcolor="#e4e4e4">Price</td>
                    <td width="15%" align="center" bgcolor="#e4e4e4"><font color=#000000
                                                                           size=2>Membership price</font></td>
                    <td width="15%" align="center" bgcolor="#e4e4e4"><font color=#000000
                                                                           size=2>Count</font></td>
                    <td width="15%" align="center" bgcolor="#e4e4e4"><font color=#000000
                                                                           size=2>Sum</font></td>
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
                                                             size=2><strike>$<?php echo $db->f('price_m'); ?></strike> </font> </td>
                        <td width="15%" align="center"><b><font
                                color=#cc0000>$<?php echo $db->f('price'); ?></font></b></td>
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
                        <input class=stbtm2 name=changeOK1 onClick="JavaScript:window.location.href='my_buycar.php';" type=button value=Change>
                    </td>
                    <td>&nbsp;</td>
                    <td colspan="2">
                        <?php echo "SUM：<b><font color=red>$$price_all_format</font></b>";?>
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
<td align=left width="80%"><b><font class=p14 color=#cc0000>Your mailing information</font><font class=p14><span class="p9">(modifiable)：
                  <script language=javascript>

                      prvarr = new Array(51);
                      ctylst = new Array(1000);
                      ss = new Array(3);
                      prvcnt = 50;
                      prvarr[1] = new prv(1, 'Alabama');
                      prvarr[2] = new prv(2, 'Alaska');
                      prvarr[3] = new prv(3, 'Arizona');
                      prvarr[4] = new prv(4, 'Arkansas');
                      prvarr[5] = new prv(5, 'California');
                      prvarr[6] = new prv(6, 'Colorado');
                      prvarr[7] = new prv(7, 'Connecticut');
                      prvarr[8] = new prv(8, 'Delaware');
                      prvarr[9] = new prv(9, 'Florida');
                      prvarr[10] = new prv(10, 'Georgia');
                      prvarr[11] = new prv(11, 'Hawaii');
                      prvarr[12] = new prv(12, 'Idaho');
                      prvarr[13] = new prv(13, 'Illinois');
                      prvarr[14] = new prv(14, 'Indiana');
                      prvarr[15] = new prv(15, 'Iowa');
                      prvarr[16] = new prv(16, 'Kansas');
                      prvarr[17] = new prv(17, 'Kentucky');
                      prvarr[18] = new prv(18, 'Louisiana');
                      prvarr[19] = new prv(19, 'Maine');
                      prvarr[20] = new prv(20, 'Maryland');
                      prvarr[21] = new prv(21, 'Massachusetts');
                      prvarr[22] = new prv(22, 'Michigan');
                      prvarr[23] = new prv(23, 'Minnesota');
                      prvarr[24] = new prv(24, 'Mississippi');
                      prvarr[25] = new prv(25, 'Missouri');
                      prvarr[26] = new prv(26, 'Montana');
                      prvarr[27] = new prv(27, 'Nebraska');
                      prvarr[28] = new prv(28, 'Nevada');
                      prvarr[29] = new prv(29, 'New Hampshire');
                      prvarr[30] = new prv(30, 'New Jersey');
                      prvarr[31] = new prv(31, 'New Mexico');
                      prvarr[32] = new prv(32, 'New York');
                      prvarr[33] = new prv(33, 'North Carolina');
                      prvarr[34] = new prv(34, 'North Dakota');
                      prvarr[35] = new prv(35, 'Ohio');
                      prvarr[36] = new prv(36, 'Oklahoma');
                      prvarr[37] = new prv(37, 'Oregon');
                      prvarr[38] = new prv(38, 'Pennsylvania');
                      prvarr[39] = new prv(39, 'Rhode Island');
                      prvarr[40] = new prv(40, 'South Carolina');
                      prvarr[41] = new prv(41, 'South Dakota');
                      prvarr[42] = new prv(42, 'Tennesse');
                      prvarr[43] = new prv(43, 'Texas');
                      prvarr[44] = new prv(44, 'Utah');
                      prvarr[45] = new prv(45, 'Vermont');
                      prvarr[46] = new prv(46, 'Virginia');
                      prvarr[47] = new prv(47, 'Washington');
                      prvarr[48] = new prv(48, 'West Virginia');
                      prvarr[49] = new prv(49, 'Wisconsin');
                      prvarr[50] = new prv(50, 'Wyoming');

                      function prvcty(pid,cid,name)
                      {this.pid=pid;this.cid=cid;this.name=name;}
                      function prv(id,name)
                      {this.id=id;this.name=name;}
                  function check()
                  {
                      if (document.formlogin.name.value=="")
                      {
                          document.formlogin.name.focus();
                          window.alert("Username cannot be null, and at most 20 characters!");
                          return false;
                      }
                      if (document.formlogin.sex.value==0)
                      {
                          document.formlogin.sex.focus();
                          window.alert("Select gender!");
                          return false;
                      }
                      if (document.formlogin.email.value == "" || document.formlogin.email.value.length < 1)            
                      {
                          alert("Input email!");
                          document.formlogin.email.select();
                          document.formlogin.email.focus();
                          return (false);
                      }

                      var checkOKeemail = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-_@.";           
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

                      if (document.formlogin.email.value.length < 6 || document.formlogin.email.value.length >60) //the length of mail
                      {
                          allValideemail = false;
                      }

                      if (!allValideemail)                                                   //char in mail
                      {
                          alert("Your input \"Email Address\" is invalid, Please pay attention to the length and illegal characters!");
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
                              window.alert("Sorry, your input email is not a valid one,even without \"@\"!");
                              document.formlogin.email.select();
                              document.formlogin.email.focus();
                              return false
                          }
                          ii=eemailvalue.indexOf(".")
                          if(ii==-1)
                          {
                              window.alert("Sorry, your input email is not a valid one,even without \".\"!");
                              document.formlogin.email.select();
                              document.formlogin.email.focus();
                              return false
                          }
                      }

                      return confirm("    Are you sure the information you entered is correct? ");
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

        for (i=1;i<=prvcnt;i++)
        {

            if (prvarr[i].name=="<?php echo $db->f('province') ?>")
            {
                document.formlogin.province.value=prvarr[i].name;
            }
        }
        document.formlogin.city.value="<?php echo $db->f('city') ?>";
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
        lth=document.formlogin.province.value=0;
        //for (i=0;i<=lth;i++)
        //    document.formlogin.province.remove(0);
        //var oOption = document.createElement("OPTION");
        //oOption.text="Select States";
    /*    document.formlogin.province.add(oOption);
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
        }*/
        document.formlogin.province.value="Select States";
        document.formlogin.city.value="";
        document.formlogin.tel.value="";
        document.formlogin.address.value="";
        document.formlogin.post.value="";
        document.formlogin.pay[0].checked=true;
        document.formlogin.attrib.value="";
        document.formlogin.name.focus();
    }

</script>
<form name="formlogin" method="post" action="my_payment.php" onSubmit=return(check());>
    <table width="100%" border="0">
        <tr>
            <td width="14%" align="center" height="18">Name：</td>
            <td width="86%" height="18">
                <input type="text" name="name" class="think" maxlength="20" size="12">
                <font color="#CC0000">*</font> </td>
        </tr>
        <tr>
            <td width="14%" align="center">&nbsp;</td>
            <td width="86%"><a href="javascript:new_user()"><font color=#cc0000><u>Create new address</u></font></a>&nbsp;

                &nbsp; <a href="javascript:my_info()"><font color="#cc0000"><u>Use my address</u></font></a>（Please enter you real name）</td>
        </tr>
        <tr>
            <td width="14%" align="center">Gender：</td>
            <td width="86%">
                <select name="sex">
                    <option value="0" selected>Select</option>
                    <option value="1">male</option>
                    <option value="2">female</option>
                </select>
            </td>
        </tr>
        <tr>
            <td width="14%" align="center">E-mail：</td>
            <td width="86%">
                <input type="text" name="email" class="think" maxlength="60" size="30">
                <font color="#CC0000">*</font></td>
        </tr>
        <tr>
            <td align="right">State： </td>
            <td>
                <select  name="province" class="think">
                    <script language=javascript>
                        document.write ("<option");
                        document.write (">")
                        document.write ("Select States");
                        document.write ("</option>");
                        for (i=1;i<=prvcnt;i++)
                        {
                            document.write ("<option ");
                            document.write ("value="+prvarr[i].name);
                            document.write (">");
                            document.write (prvarr[i].name);
                            document.write ("</option>");
                        }
                    </script>
                </select>
                <font color="#CC0000"> *</font></td>
        </tr>
        <tr>
            <td align="right">City： </td>
            <td>
                <input type="text" name="city" class="think" maxlength="40" size="20">
                <font color="#CC0000">*</font></td>
        </tr>
        <tr>
            <td width="14%" align="center">Tel：</td>
            <td width="86%">
                <input type="text" name="tel" class="think" maxlength="40" size="20">
                <font color="#CC0000">*</font></td>
        </tr>
        <tr>
            <td width="14%" align="center">Contact Address：</td>
            <td width="86%">
                <input type="text" name="address" class="think" maxlength="100" size="40">
                <font color="#CC0000">*</font></td>
        </tr>
        <tr>
            <td width="14%" align="center">Post code：</td>
            <td width="86%">
                <input type="text" name="post" class="think" maxlength="6" size="8">
                <font color="#CC0000">*</font></td>
        </tr>

        <tr>
            <td width="14%"><b>Delivery Method：</b></td>
            <td width="86%">&nbsp;</td>
        </tr>
        <tr>
            <td width="14%">&nbsp;</td>
            <td width="86%">　　　UPS <br>
                　　　Attention: All products bought at this websites will be delivered by UPS</td>
        </tr>
        <tr>
            <td width="14%">&nbsp;</td>
            <td width="86%">&nbsp;</td>
        </tr>



        <tr align="center">
            <td colspan="2" height="34">
                <input type="submit" name="Submit" value=" submit "  class=stbtm2>
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
