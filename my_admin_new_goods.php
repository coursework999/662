<?php
require "conf/config.php";
include "admin_check.php";
?>
<html>
<head>
<title><?php echo $sitename ?> -- New product bulk upload</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<?php echo $http_head; ?>
<link rel="stylesheet" href="conf/style.css" type="text/css">
</head>
<body bgcolor="#FFFFFF" text="#000000">
<?php include "conf/admin.php"; ?>
<?php include "js_setselect.php"; ?>
<table width="750" align="center">
  <tr align="center"> 
    <td bgcolor="#EFEFEF"> 
      <p class="p13"><br>
        Product Management</p>
      <script language="JavaScript">
function check()
{
 if (document.form1.up_id.value == "")
  {
    alert ("Please select product class!");
    document.form1.up_id.focus();
    return false;
  }
 if (document.form1.fgf.value == "")
  {
    alert ("please input separator between columns!");
    document.form1.fgf.focus();
    return false;
  }
 if (document.form1.upfile.value == "")
  {
    alert ("Select data file!");
    return false;
  }
 return confirm("are you sure to upload?");
 document.form1.Submit.disabled=true;
 document.form1.Submit2.disabled=true;
}
</script>
      <center>
        <?php
if ($usage==1)
{
$fp=fopen($upfile,"r");
while(!feof($fp))
{
$msg=@split($fgf,trim(fgets($fp,4096)));

$name=@addslashes($msg[0]);
$descript=@addslashes($msg[1]);
$price_m=@addslashes($msg[2]);
$price=@addslashes($msg[3]);

$str_sql = "insert into $goods_t
     	           values (null,$up_id,$class_id,'$name','$descript','',
     	           $price_m,$price,$state,'$date')";
$db->query($str_sql);
 }
fclose($fp);
echo 'Add products success, goinig back to product management page<meta http-equiv="refresh" content="2;URL=admin_goods.php?up_id='.$up_id.'&sf='.$class_id.'"><br><br>';
}
else
{
?>
		<form name="form1" method="post" action="" onSubmit="return check();" enctype="multipart/form-data">
          <table width="80%" border="1" cellspacing="0" cellpadding="2" bgcolor="#E1EAF4" align="center" bordercolor="#FFFFFF">
            <tr> 
              <td colspan="2" height="35" align="center"> <font color="#FF0000">*</font> 
                Required items </td>
            </tr>
            <tr> 
              <td width="16%" align="right">Product Class：</td>
              <td width="84%"><font color="#FF0000"> 
                <select name="up_id" onchange="sele(this.selectedIndex);">
                  <option selected>Select class</option>
                  <?php
          $db->query("select id,name from $class_t where up_id=0");
          while($db->next_record())
                 echo "<option value=".$db->f('id').">&nbsp;".$db->f('name')."</option>\n";
       ?>
                </select>
                * 　　Sub class：
                <select name="class_id">
                </select>
                <script language="JavaScript">
 
<?php
$db->query("select id from $class_t where up_id=0");
$n=0;
while($db->next_record())
{
   $db2->query("select id,name from $class_t where up_id=".$db->f('id'));
   echo "\n\nA".$n."=new Array(".$db2->num_rows().");";
   $m=0;
   while($db2->next_record())
	{
	  echo "\nA".$n."[".$db2->f('id')."]='".$db2->f('name')."';";
      $m++;
    }
  $n++;
}
?>

function sele(s)
{
		if(s!=0)
		{
			document.form1.class_id.options.length=0;
			A=eval("A"+(s-1));
			i=0;
			for(name in A) //访问该数组中的所有元素，name为下标，
			{
				document.form1.class_id.options.length++;
				document.form1.class_id.options[i].text=A[name];			
				document.form1.class_id.options[i].value=name;
				i++;
			}
			document.form1.class_id.selectedIndex=0;
		}
		else
		{
			document.form1.class_id.options.length=0;
		}
}

</script>
                </font></td>
            </tr>
            <tr> 
              <td colspan="2">　　　separator beteen colums：
                <input type="text" name="fgf" size="4" value=";" maxlength="6">
                <font color="#FF0000">*</font></td>
            </tr>
            <tr> 
              <td width="16%" align="right" height="37">Format of every line：</td>
              <td width="84%" height="37">Name;Introduction;Price;Membership price</td>
            </tr>
            <tr> 
              <td width="16%" align="right">Upload file：</td>
              <td width="84%"> 
                <input type="file" name="upfile" maxlength="40">
                <font color="#FF0000">*</font> </td>
            </tr>
            <tr> 
              <td width="16%" align="right">Product status：</td>
              <td width="84%"> 
                <input type="radio" name="state" value="0" checked>
                In stock
                <input type="radio" name="state" value="1">
                Out of stock </td>
            </tr>
            <tr> 
              <td width="16%" align="right">Release Date：</td>
              <td width="84%"> 
                <input type="text" name="date" value="<?php echo date("Y-m-d H:i:s"); ?>" maxlength="19" size="21">
              </td>
            </tr>
            <tr> 
              <td colspan="2" align="center"> 
                <input type="hidden" name="usage" value="1">
                <input type="submit" name="Submit" value="Submit" class="stbtm2">
                　 
                <input type="reset" name="Submit2" value="Reset" class="stbtm2">
              </td>
            </tr>
          </table>
        </form>
        <?php } ?>
   </center>
</td>
  </tr>
</table>
<br>
<?php include "conf/footer.php"; ?>
</body>
</html>
