<table align=center border=0 cellpadding=0 cellspacing=0 width=750>
  <tr> 
    <td background=images/bg.gif height=2><img height=3 src="images/bg.gif" width=6></td>
  </tr>
</table><BR>
<table width="750" border="0" cellspacing="4" cellpadding="0" align="center">
<tr align="center">
<td><a href="index.php" class="clink03">回到页首</a> | <a href="buycar.php" class="clink03">购物车</a> | 
<a href="buystore.php" class="clink03">收藏夹</a> | 
<a href="bank.php" class="clink03">收银台</a> | <a href="dingdang.php" class="clink03">订单查询</a> | 
<a href="service.php" class="clink03">客服中心</a> | <a href="contact.php"  class="clink03">联系方式</a></td>
</tr><tr align="center"><td>&nbsp;</td></tr><tr align="center">
    <td style="line-height:150%">Copyright&copy;2002　版权所有　<a href="mailto:<?php echo $siteemail ?>" target=_blank class="clink03"> 
      <?php echo $sitecopyright ?>
      </a> 程序开发:<a href="mailto:wyx726@126.com" target=_blank class="clink03">北京工业大学</a> 
      <BR>
      地址: 
      <?php echo $siteadd ?>
      　　电话: 
      <?php echo $sitetel ?>
      <br>
      E_mail:<a href="mailto:<?php echo $siteemail ?>" class="clink03"> 
      <?php echo $siteemail ?>
      </a></td></tr></table>
<?php
if ($stat) echo "<script language=\"JavaScript\" src=\"stat/include/countjs.php?style=$stat_type\"></script>\n";
?>