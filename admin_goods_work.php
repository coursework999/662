<?php
require "conf/config.php";
include "admin_check.php";

function up_img($file,$f_type)
{
	set_time_limit(1000);
	if (($file == "none") || ($file == "")) //����Ƿ�ѡ���ļ�
	  return ;
	if ($f_type!="image/pjpeg" && $f_type!="image/gif" && $f_type!="image/x-png") //��������ļ�����
	{
       echo "<center>����ѡ��������ļ����Ͳ��ԣ����������Ѿ���ֹ...</center>$f_type";
       exit();
	  return ;
	}
  $upload_dir="goods_img";
  $the_time = time ();
  $local_file = "$upload_dir/$the_time";
  if ( file_exists ( "$local_file".".jpg" ) || file_exists ( "$local_file".".gif" ) || file_exists ( "$local_file".".png" )) 
  {
   $seq = 1;
   while ( file_exists ( "$upload_dir/$the_time$seq".".jpg" ) || file_exists ( "$upload_dir/$the_time$seq".".gif" )  || file_exists ( "$upload_dir/$the_time$seq".".png" ))
    { $seq++; }
   $local_file = "$upload_dir/$the_time$seq";
  }
  if ($f_type=="image/pjpeg") $local_file="$local_file.jpg";
  if ($f_type=="image/gif") $local_file="$local_file.gif";
  if ($f_type=="image/x-png") $local_file="$local_file.png";
  copy($file,$local_file);
  return $local_file; //����ͼƬ���ļ���
}
?>
<html>
<head>
<title><?php echo $sitename ?> -- ��Ʒ����</title>
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
        ��Ʒ����</p>
      <script language="JavaScript">
function check()
{
 if (document.form1.class_id.value == "")
  {
    alert ("��ѡ����Ʒ���!");
    document.form1.class_id.focus();
    return false;
  }
 if (document.form1.name.value == "")
  {
    alert ("����д��Ʒ����!");
    document.form1.name.focus();
    return false;
  }
 if (document.form1.descript.value == "")
  {
    alert ("����д��Ʒ����!");
    document.form1.descript.focus();
    return false;
  }
 if (isNaN(document.form1.price_m.value) || document.form1.price_m.value <= 0)
  {
    alert ("����ȷ������Ʒ���г��۸�!");
    document.form1.price_m.focus();
    return false;
  }
 if (isNaN(document.form1.price.value) || document.form1.price.value <= 0)
  {
    alert ("����ȷ������Ʒ����վ�۸�!");
    document.form1.price.focus();
    return false;
  }
 document.form1.Submit.disabled=true;
 document.form1.Submit2.disabled=true;
}
</script>
      <center>
        <?php
if ($usage!=1)
{
  	switch ($action)
	{
		case "insert":
			echo "�����Ʒ";
			break;
		case "update":
			echo "�޸���Ʒ";
	}
          $db->query("select * from $goods_t where id=$id");
          $db->next_record();
		  if (!$up_id) $up_id=$db->f('up_id');
      	  if (!$class_id) $class_id=$db->f('class_id');
      	  $name=stripslashes($db->f('name'));
      	  $descript=stripslashes($db->f('descript'));
      	  $image=$db->f('image');
      	  $price_m=$db->f('price_m');
          $price=$db->f('price');
      	  $state=$db->f('state');
      	  $date=$db->f('date');
?>
        <form name="form1" method="post" action="" onSubmit="return check();" enctype="multipart/form-data">
          <table width="80%" border="1" cellspacing="0" cellpadding="2" bgcolor="#E1EAF4" align="center" bordercolor="#FFFFFF">
            <tr align="center"> 
              <td colspan="2" height="35"> <font color="#FF0000">*</font> ��ʾΪ������ 
              </td>
            </tr>
            <tr> 
              <td width="16%" align="right">��Ʒ���</td>
              <td width="84%"><font color="#FF0000"> 
                <select name="up_id" onchange="sele(this.selectedIndex);">
                  <option selected>��ѡ�����</option>
                  <?php
          $db->query("select id,name from $class_t where up_id=0");
          while($db->next_record())
                 echo "<option value=".$db->f('id').">&nbsp;".$db->f('name')."</option>\n";
       ?>
                </select>
                * ����������� 
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
			for(name in A) //���ʸ������е�����Ԫ�أ�nameΪ�±꣬
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

setSelect("form1","up_id","<?php echo $up_id ?>");
sele(form1.up_id.selectedIndex);
setSelect("form1","class_id","<?php echo $class_id ?>");
</script>
                </font></td>
            </tr>
            <tr> 
              <td width="16%" align="right">��Ʒ���ƣ�</td>
              <td width="84%"> 
                <input type="text" name="name" size="50" maxlength="60" value="<?php echo htmlspecialchars($name) ?>">
                <font color="#FF0000">*</font> </td>
            </tr>
            <tr> 
              <td width="16%" align="right">��Ʒ���ܣ�</td>
              <td width="84%"> 
                <textarea name="descript" cols="60" rows="6"><?php echo $descript ?></textarea>
                <font color="#FF0000">*</font></td>
            </tr>
            <tr> 
              <td width="16%" align="right">��Ʒͼ��</td>
              <td width="84%"> <a href="<?php echo $image ?>" class="clink03" target="_blank">
                <?php echo $image ?>
                </a>
<input type="hidden" name="image1" value="<?php echo $image ?>">
                <a href="<?php echo $image ?>" class="clink03" target="_blank"> 
                </a> </td>
            </tr>
            <tr>
              <td width="16%" align="right">�ϴ�ͼ��</td>
              <td width="84%">
                <input type="file" name="image" maxlength="40">
                ���ͣ�gif,jpg,png </td>
            </tr>
            <tr> 
              <td width="16%" align="right">�г��۸�</td>
              <td width="84%"> 
                <input type="text" name="price_m" value="<?php echo $price_m ?>" maxlength="10" size="12">
                <font color="#FF0000">*</font> (��λ��Ԫ)</td>
            </tr>
            <tr> 
              <td width="16%" align="right">��վ�۸�</td>
              <td width="84%"> 
                <input type="text" name="price" value="<?php echo $price ?>" size="12" maxlength="10">
                <font color="#FF0000">* </font>(��λ��Ԫ)</td>
            </tr>
            <tr> 
              <td width="16%" align="right">��Ʒ״̬��</td>
              <td width="84%"> 
                <input type="radio" name="state" value="0" <?php if ($state==0) echo "checked" ?>>
                �л��� 
                <input type="radio" name="state" value="1" <?php if ($state==1) echo "checked" ?>>
                ȱ�� </td>
            </tr>
            <tr> 
              <td width="16%" align="right">�������ڣ�</td>
              <td width="84%"> 
                <input type="text" name="date" value="<?php if ($action=="insert") echo date("Y-m-d H:i:s"); else echo $date; ?>" maxlength="19" size="21">
              </td>
            </tr>
            <tr align="center"> 
              <td colspan="2"> 
                <input type="hidden" name="action" value="<?php echo $action ?>">
                <input type="hidden" name="usage" value="1">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <input type="submit" name="Submit" value="�� ��" class="stbtm2">
                �� 
                <input type="reset" name="Submit2" value="�� ��" class="stbtm2">
              </td>
            </tr>
          </table>
        </form>
        <?php
}
else
{
$name=addslashes(trim($name));
$descript=addslashes(trim($descript));
$image_file=up_img($image,$image_type);
switch ($action)
{
	case "insert":		
     	$str_sql = "insert into $goods_t
     	           values (null,$up_id,$class_id,'$name','$descript','$image_file',
     	           $price_m,$price,$state,'$date')";
		break;
	case "update":
	      if ($image_file) $tmp="image='$image_file',";
		  $str_sql = "update $goods_t set up_id=$up_id,
		  class_id=$class_id,name='$name',descript='$descript',$tmp
     	          price_m=$price_m,price=$price,state=$state,date='$date'
     	          where id=$id";
}
$db->query($str_sql);
  	switch ($action)
	{
		case "insert":
			echo "�����Ʒ";
			break;
		case "update":
			echo "�޸���Ʒ";
	}
echo '�ɹ�,���ڷ�����Ʒ������ҳ<meta http-equiv="refresh" content="2;URL=admin_goods.php?up_id='.$up_id.'&sf='.$class_id.'"><br><br>';
}
?>
      </center>
</td>
  </tr>
</table>
<br>

<?php include "conf/footer.php"; ?>
</body>
</html>
