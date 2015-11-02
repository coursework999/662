<?php
require "conf/config.php";
session_start();
?>
<html>
<head>
<title><?php echo $sitename ?> -- 客户中心</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<?php echo $http_head; ?>
<link rel="stylesheet" href="conf/style.css" type="text/css">
</head>
<body bgcolor="#FFFFFF" text="#000000">
<?php include "conf/header.php" ?>
<table width="750" border="0" align="center" cellspacing="0" cellpadding="0">
  <tr align="center" bgcolor="#efefef"> 
    <td class="p14"> <br>
      <table cellspacing=0 cellpadding=0 width="90%" border=0>
        <tbody> 
        <tr> 
          <td> 
            <table cellspacing=0 cellpadding=0 width="100%" border=0>
              <tbody> 
              <tr> 
                <td><a class="clink03"  name=Top></a><font 
                  style="FONT-SIZE: 16px; FONT-FAMILY: 宋体"><font 
                  style="FONT-SIZE: 16px; FONT-FAMILY: 宋体">客户帮助中心</font></font></td>
                <td><a class="clink03"  href="contact.php"><font 
                  style="FONT-SIZE: 16px; FONT-FAMILY: 宋体" 
                  color=red>联系我们</font></a></td>
              </tr>
              </tbody>
            </table>
            <hr>
            <table width="100%" align=center>
              <tbody> 
              <tr> 
                <td> 
                  <ol>
                    <li><font style="FONT-SIZE: 12px; FONT-FAMILY: 宋体"><a class="clink03"  
                    href="#Answer1">如何查询订单处理情况？ 
                      </a><br>
                      <br>
                      </font>
                    <li><font style="FONT-SIZE: 12px; FONT-FAMILY: 宋体"><a class="clink03"  
                    href="#Answer2">怎样才算订购成功？ 
                      </a><br>
                      <br>
                      </font>
                    <li><font style="FONT-SIZE: 12px; FONT-FAMILY: 宋体"><a class="clink03"  
                    href="#Answer3">我该怎么付款？ 
                      </a><br>
                      <br>
                      </font>
                    <li><font style="FONT-SIZE: 12px; FONT-FAMILY: 宋体"><a class="clink03"  
                    href="#Answer4">我想给朋友送礼物，可是我远在他乡，你们可以帮送货吗？ 
                      </a><br>
                      <br>
                      </font>
                    <li><font style="FONT-SIZE: 12px; FONT-FAMILY: 宋体"><a class="clink03"  
                    href="#Answer5">售后服务如何？ 
                      </a><br>
                      <br>
                      </font>
                    <li><font style="FONT-SIZE: 12px; FONT-FAMILY: 宋体"><a class="clink03"  
                    href="#Answer6">有哪几种订单状态？ 
                      </a><br>
                      <br>
                      </font>
                    <li><font style="FONT-SIZE: 12px; FONT-FAMILY: 宋体"><a class="clink03"  
                    href="#Answer7">下订单后多长时间款未到订单将被取消？ 
                      </a><br>
                      <br>
                      </font>
                    <li><font style="FONT-SIZE: 12px; FONT-FAMILY: 宋体"><a class="clink03"  
                    href="#Answer8">我是否可以将几张订单合并以节省配送费？ 
                      </a><br>
                      <br>
                      </font>
                    <li><font style="FONT-SIZE: 12px; FONT-FAMILY: 宋体"><a class="clink03"  
                    href="#Answer9">在什么情况下我的订单可能被处理成无效或者按退货处理？ 
                      </a><br>
                      <br>
                      </font>
                    <li><font style="FONT-SIZE: 12px; FONT-FAMILY: 宋体"><a class="clink03"  
                    href="#Answer10">我查询订单显示“已发货”状态，可为何我到现在都没收到货物？ 
                      </a><br>
                      <br>
                      </font>
                    <li><font style="FONT-SIZE: 12px; FONT-FAMILY: 宋体"><a class="clink03"  
                    href="#Answer11">为什么款已汇出好长时间，可是还没有接到发货通知？ 
                      </a><br>
                      <br>
                      </font>
                    <li><font style="FONT-SIZE: 12px; FONT-FAMILY: 宋体"><a class="clink03"  
                    href="#Answer12">如果我发现收到的物品与订购的不一致怎么办？ 
                      </a><br>
                      <br>
                      </font>
                    <li><font style="FONT-SIZE: 12px; FONT-FAMILY: 宋体"><a class="clink03"  
                    href="#Answer13">一般在什么情况下，我们会主动与您联系？ 
                      </a><br>
                      <br>
                      </font>
                    <li><font style="FONT-SIZE: 12px; FONT-FAMILY: 宋体"><a class="clink03"  
                    href="#Answer14">我可以开发票吗？ 
                      </a><br>
                      </font></li>
                  </ol>
                </td>
              </tr>
              </tbody>
            </table>
            <a class="clink03"  
            name=Answer1></a> 
            <table width="90%" align=center>
              <tbody> 
              <tr> 
                <td bgcolor=#6297e5><font 
                  style="FONT-SIZE: 12px; COLOR: #000000; FONT-FAMILY: 宋体"><b>1. 
                  如何查询订单处理情况？</b> </font></td>
              </tr>
              </tbody>
            </table>
            <table width="85%" align=center>
              <tbody> 
              <tr> 
                <td><font style="FONT-SIZE: 12px; FONT-FAMILY: 宋体">&nbsp;&nbsp;&nbsp;&nbsp;您以会员身份登录后，可以点击“订单查询”里进行查询。 
                  <br>
                  </font>
                  <p align=right><font style="FONT-SIZE: 12px; FONT-FAMILY: 宋体"><a class="clink03"  
                  href="#Top">TOP</a> </font></p>
                </td>
              </tr>
              </tbody>
            </table>
            <a class="clink03"  name=Answer2></a> 
            <table width="90%" align=center>
              <tbody> 
              <tr> 
                <td bgcolor=#6297e5><font 
                  style="FONT-SIZE: 12px; COLOR: #000000; FONT-FAMILY: 宋体"><b>2. 
                  怎样才算订购成功？</b> </font></td>
              </tr>
              </tbody>
            </table>
            <table width="85%" align=center>
              <tbody> 
              <tr> 
                <td><font style="FONT-SIZE: 12px; FONT-FAMILY: 宋体">&nbsp;&nbsp;&nbsp;&nbsp;当系统给您一个订单确认信后，或者说您进入“订单查询”查到了您的订单，这时您就算订购成功了。<br>
                  </font>
                  <p align=right><font style="FONT-SIZE: 12px; FONT-FAMILY: 宋体"><a class="clink03"  
                  href="#Top">TOP</a> </font></p>
                </td>
              </tr>
              </tbody>
            </table>
            <a class="clink03"  name=Answer3></a> 
            <table width="90%" align=center>
              <tbody> 
              <tr> 
                <td bgcolor=#6297e5><font 
                  style="FONT-SIZE: 12px; COLOR: #000000; FONT-FAMILY: 宋体"><b>3. 
                  我该怎么付款？</b> </font></td>
              </tr>
              </tbody>
            </table>
            <table width="85%" align=center>
              <tbody> 
              <tr> 
                <td><font style="FONT-SIZE: 12px; FONT-FAMILY: 宋体">&nbsp;&nbsp;&nbsp;&nbsp;我们暂时只提供银行汇款<br>
                  </font>
                  <p align=right><font style="FONT-SIZE: 12px; FONT-FAMILY: 宋体"><a class="clink03"  
                  href="#Top">TOP</a> </font></p>
                </td>
              </tr>
              </tbody>
            </table>
            <a class="clink03"  name=Answer4></a> 
            <table width="90%" align=center>
              <tbody> 
              <tr> 
                <td bgcolor=#6297e5><font 
                  style="FONT-SIZE: 12px; COLOR: #000000; FONT-FAMILY: 宋体"><b>4. 
                  我想给朋友送礼物，可是我远在他乡，你们可以帮送货吗？</b> </font></td>
              </tr>
              </tbody>
            </table>
            <table width="85%" align=center>
              <tbody> 
              <tr> 
                <td><font style="FONT-SIZE: 12px; FONT-FAMILY: 宋体">&nbsp;&nbsp;&nbsp;&nbsp;可以的，只要您把送货地址填写您朋友的住址，我们就可以把您订购的商品送到您朋友手上。 
                  <br>
                  </font>
                  <p align=right><font style="FONT-SIZE: 12px; FONT-FAMILY: 宋体"><a class="clink03"  
                  href="#Top">TOP</a> </font></p>
                </td>
              </tr>
              </tbody>
            </table>
            <a class="clink03"  name=Answer5></a> 
            <table width="90%" align=center>
              <tbody> 
              <tr> 
                <td bgcolor=#6297e5><font 
                  style="FONT-SIZE: 12px; COLOR: #000000; FONT-FAMILY: 宋体"><b>5. 
                  售后服务如何？</b> </font></td>
              </tr>
              </tbody>
            </table>
            <table width="85%" align=center>
              <tbody> 
              <tr> 
                <td><font style="FONT-SIZE: 12px; FONT-FAMILY: 宋体">&nbsp;&nbsp;&nbsp;&nbsp;我们的商品都是由实力雄厚的厂家直接提供，信誉、质量和售后服务都大可放心。 
                  <br>
                  </font>
                  <p align=right><font style="FONT-SIZE: 12px; FONT-FAMILY: 宋体"><a class="clink03"  
                  href="#Top">TOP</a> </font></p>
                </td>
              </tr>
              </tbody>
            </table>
            <a class="clink03"  name=Answer6></a> 
            <table width="90%" align=center>
              <tbody> 
              <tr> 
                <td bgcolor=#6297e5><font 
                  style="FONT-SIZE: 12px; COLOR: #000000; FONT-FAMILY: 宋体"><b>6. 
                  有哪几种订单状态?</b> </font></td>
              </tr>
              </tbody>
            </table>
            <table width="85%" align=center>
              <tbody> 
              <tr> 
                <td><font style="FONT-SIZE: 12px; FONT-FAMILY: 宋体">&nbsp;&nbsp;&nbsp;&nbsp;1.付款状态：未付款，当您刚产生订单时。2.付款状态：己付款，当您的款我们已经收到，管理员会修改付款状态。4.发货状态：未发货，当您的款未到时。4.发货状态：己发货，我们发货后，您可以查到发货状态<br>
                  </font>
                  <p align=right><font style="FONT-SIZE: 12px; FONT-FAMILY: 宋体"><a class="clink03"  
                  href="#Top">TOP</a></font></p>
                </td>
              </tr>
              </tbody>
            </table>
            <a class="clink03"  
            name=Answer7></a> 
            <table width="90%" align=center>
              <tbody> 
              <tr> 
                <td bgcolor=#6297e5><font 
                  style="FONT-SIZE: 12px; COLOR: #000000; FONT-FAMILY: 宋体"><b>7. 
                  下订单后多长时间款未到订单将被取消?</b> </font></td>
              </tr>
              </tbody>
            </table>
            <table width="85%" align=center>
              <tbody> 
              <tr> 
                <td><font style="FONT-SIZE: 12px; FONT-FAMILY: 宋体">&nbsp;&nbsp;&nbsp;&nbsp;每种付款方式的最长等待时间为：银行汇款：48小时（2）<br>
                  </font>
                  <p align=right><font style="FONT-SIZE: 12px; FONT-FAMILY: 宋体"><a class="clink03"  
                  href="#Top">TOP</a></font></p>
                </td>
              </tr>
              </tbody>
            </table>
            <a class="clink03"  
            name=Answer8></a> 
            <table width="90%" align=center>
              <tbody> 
              <tr> 
                <td bgcolor=#6297e5><font 
                  style="FONT-SIZE: 12px; COLOR: #000000; FONT-FAMILY: 宋体"><b>8. 
                  我是否可以将几张订单合并以节省配送费？</b> </font></td>
              </tr>
              </tbody>
            </table>
            <table width="85%" align=center>
              <tbody> 
              <tr> 
                <td><font style="FONT-SIZE: 12px; FONT-FAMILY: 宋体">&nbsp;&nbsp;&nbsp;&nbsp;由于目前无法在订单上添加商品，为了节省您的配送费，我们建议客户把想要买的物品尽量放在一张单上。 
                  送货方式为送货上门的订单，如果前一张订单处于“有效订单 未发货”或“待核对”状态，请您及时通过email通知客户服务中心，我们会为您合并订单，这样您可以节省一份配送费。请原谅下列订单无法进行合并：（1） 
                  如果第一份订单处于"已发货"状态，那么就无法将订单合并了。<br>
                  </font>
                  <p align=right><font style="FONT-SIZE: 12px; FONT-FAMILY: 宋体"><a class="clink03"  
                  href="#Top">TOP</a></font></p>
                </td>
              </tr>
              </tbody>
            </table>
            <a class="clink03"  
            name=Answer9></a> 
            <table width="90%" align=center>
              <tbody> 
              <tr> 
                <td bgcolor=#6297e5><font 
                  style="FONT-SIZE: 12px; COLOR: #000000; FONT-FAMILY: 宋体"><b>9. 
                  在什么情况下我的订单可能被处理成无效或者按退货处理？</b> </font></td>
              </tr>
              </tbody>
            </table>
            <table width="85%" align=center>
              <tbody> 
              <tr> 
                <td><font style="FONT-SIZE: 12px; FONT-FAMILY: 宋体">&nbsp;&nbsp;&nbsp;&nbsp;1. 
                  订单地址、电话、email地址、邮编等信息错误或不详。为了保证货物及时、准确地送到您的手中，请您留下准确信息。 2. 送货方式为送货上门的订单，如果五天之内与收货人联系不上，会给您发一封email至注册邮箱。如果email发出后24小时内您还未与我们联系，该订单将按退货处理。如果您留的地址固定在某个时间段后才有人，请您在下订单时在“备注”中注明。 
                  3. 付款/送货方式选择错误。如果收货地址不属于配送范围之外，请不要选择送货上门/货到付款，否则此订单将有可能被视为无效订单。 
                  <br>
                  </font>
                  <p align=right><font style="FONT-SIZE: 12px; FONT-FAMILY: 宋体"><a class="clink03"  
                  href="#Top">TOP</a></font></p>
                </td>
              </tr>
              </tbody>
            </table>
            <a class="clink03"  
            name=Answer10></a> 
            <table width="90%" align=center>
              <tbody> 
              <tr> 
                <td bgcolor=#6297e5><font 
                  style="FONT-SIZE: 12px; COLOR: #000000; FONT-FAMILY: 宋体"><b>10. 
                  我查询订单显示“已发货”状态，可为何我到现在都没收到货物？</b> </font></td>
              </tr>
              </tbody>
            </table>
            <table width="85%" align=center>
              <tbody> 
              <tr> 
                <td><font style="FONT-SIZE: 12px; FONT-FAMILY: 宋体">&nbsp;&nbsp;&nbsp;&nbsp;如果您留的是公司地址，配送人员会默认您周末不上班。如果您周末上班，请您在备注里注明。订单一经打出，很快会交给配送公司，这时便处于已发货状态；配送公司再根据实际情况，安排配送。我们将发一封确认发货的电子邮件给您，如果您选择的是送货上门送货方式，正常情况下货物将在承诺时间内到达您的手中。如果您选择的是其它送货方式，我们将在订单打出后24小时内为您寄出货物。 
                  <br>
                  </font>
                  <p align=right><font style="FONT-SIZE: 12px; FONT-FAMILY: 宋体"><a class="clink03"  
                  href="#Top">TOP</a></font></p>
                </td>
              </tr>
              </tbody>
            </table>
            <a class="clink03"  
            name=Answer11></a> 
            <table width="90%" align=center>
              <tbody> 
              <tr> 
                <td bgcolor=#6297e5><font 
                  style="FONT-SIZE: 12px; COLOR: #000000; FONT-FAMILY: 宋体"><b>11. 
                  为什么款已汇出好长时间，可是还没有接到发货通知？</b> </font></td>
              </tr>
              </tbody>
            </table>
            <table width="85%" align=center>
              <tbody> 
              <tr> 
                <td><font 
                  style="FONT-SIZE: 12px; FONT-FAMILY: 宋体">&nbsp;&nbsp;&nbsp;&nbsp;1. 
                  请您先去网上进行订单查询，通常情况下，我们是在订单款到后24小时内发货，系统会在发货后发邮件至收货人电子邮箱通知收货人，有可能因为您留下的收货人电子邮箱有误，或者出现技术原因而导致邮件晚到、退回甚至丢失。 
                  2. 如果经查询订单处于处理情况为“未发货”， 请您检查一下您的邮箱，有可能因为汇款金额与订单总金额不一致或者邮编、地址、收货人等邮寄信息不详，出现这种情况时，我们会主动与您Email联系。 
                  3. 查不到您的订单：（1）您在提交订单时失误，没有成功地下成订单；（2）如果您没有在汇款人留言或者电汇用途上留下订单号、用户名等查询订单的详细信息，而且汇款人或付款人名称又与订单收货人名称不一致或者字迹难以辨认。这种情况下请您与我们联系并告之汇款单据号、汇款日期、金额、汇款人姓名及地址等详细信息，以便我们核实、确认。 
                  <a class="clink03"  
                  href="#Top">TOP</a></font></td>
              </tr>
              </tbody>
            </table>
            <a class="clink03"  
            name=Answer12></a> 
            <table width="90%" align=center>
              <tbody> 
              <tr> 
                <td bgcolor=#6297e5><font 
                  style="FONT-SIZE: 12px; COLOR: #000000; FONT-FAMILY: 宋体"><b>12. 
                  为什么款已汇出好长时间，可是还没有接到发货通知？</b> </font></td>
              </tr>
              </tbody>
            </table>
            <table width="85%" align=center>
              <tbody> 
              <tr> 
                <td><font style="FONT-SIZE: 12px; FONT-FAMILY: 宋体">&nbsp;&nbsp;&nbsp;&nbsp;请您先进行订单查询，看是否因为自己误操作造成的订单货物与自己想订购的物品不一致。对于选择送货上门/货到付款的订单，如果您发现收到的货物与发货单上货物清单不符，您可以当时拒绝接收，请配送人员退回库房重新配送并按照您的要求送货。对于选择其它配送方式的订单，请客户发现后速与我们email或电话联系，我们会及时为您解决问题。 
                  <br>
                  </font>
                  <p align=right><font style="FONT-SIZE: 12px; FONT-FAMILY: 宋体"><a class="clink03"  
                  href="#Top">TOP</a></font></p>
                </td>
              </tr>
              </tbody>
            </table>
            <a class="clink03"  
            name=Answer13></a> 
            <table width="90%" align=center>
              <tbody> 
              <tr> 
                <td bgcolor=#6297e5><font 
                  style="FONT-SIZE: 12px; COLOR: #000000; FONT-FAMILY: 宋体"><b>13. 
                  一般在什么情况下，我们会主动与您联系？</b> </font></td>
              </tr>
              </tbody>
            </table>
            <table width="85%" align=center>
              <tbody> 
              <tr> 
                <td><font style="FONT-SIZE: 12px; FONT-FAMILY: 宋体">&nbsp;&nbsp;&nbsp;&nbsp;1、 
                  订单成功后会给您发一封订单信息确认函。 2、 货物发出后email通知您查收产品。 3、 缺货登记来货后会发email通知您。 
                  4、 如果订单地址、联系方法有误并且无法联系上您，我们会与您email联系。24小时内无答复则视同全部拒收处理。 5、 
                  暂时无货，会告知您稍等几日。 6、 对于选择邮局汇款或信用卡支付的客户，如果超时款未到，系统会自动取消订单并发email至收货人电子邮箱。 
                  7、 如果汇款金额与订单总金额不一致或者邮编、地址、收货人等邮寄信息不详， 我们会主动与您Email联系. <br>
                  </font>
                  <p align=right><font style="FONT-SIZE: 12px; FONT-FAMILY: 宋体"><a class="clink03"  
                  href="#Top">TOP</a> </font></p>
              </tr>
              </tbody>
            </table>
            <a class="clink03"  name=Answer14></a> 
            <table width="90%" align=center>
              <tbody> 
              <tr> 
                <td bgcolor=#6297e5><font 
                  style="FONT-SIZE: 12px; COLOR: #000000; FONT-FAMILY: 宋体"><b>14. 
                  我可以开发票吗？</b> </font></td>
              </tr>
              </tbody>
            </table>
            <table width="85%" align=center>
              <tbody> 
              <tr> 
                <td><font style="FONT-SIZE: 12px; FONT-FAMILY: 宋体">&nbsp;&nbsp;&nbsp;&nbsp;我们给您发货会连同发票一起发出。 
                  <br>
                  </font>
                  <p align=right><font style="FONT-SIZE: 12px; FONT-FAMILY: 宋体"><a class="clink03"  
                  href="#Top">TOP</a> </font></p>
                </td>
              </tr>
              </tbody>
            </table>
          </td>
        <tr> 
          <td align=right><br>
            <a class="clink03"  
            href="http://chinaifc.51.net/shop/default.php"></a></td>
        </tr>
        </tbody>
      </table>
      
    </td>
  </tr>
</table>
<br>
<?php include "conf/footer.php"; ?>
</body>
</html>
