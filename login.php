<?php
require "conf/config.php";
session_start();

if ($u_name) {
    if (strpos($u_name, "'") || strpos($u_pass, "'")) {
        echo "您的登录方式有问题！请重新 <a href='login.php'>[登录]</a>";
        exit();
    }
    $db->query("select id,u_pass,action from $user_t where u_name='$u_name'");
    $db->next_record();
    if ($db->num_rows()) {
        if ($db->f('u_pass') == $u_pass) {
            if ($db->f('action') == "n")
                $err = "对不起，您的账号还没有激活，请先 <a href='mailto:$siteemail' class='title'>通知管理员</a>";
            else {
                session_register('login_id');
                session_register('login_name');
                $login_id = $db->f('id');
                $login_name = $u_name;
                setcookie("cookielogintime", $date_tmp, time() + 7200, "/");
                $db->query("update $user_t set last_date='$date_tmp',times=times+1
            where u_name='$u_name'");
                if ($url == $PHP_SELF || $url == "") $url = "index.php";
                $err = '<meta http-equiv="refresh" content="2;URL=' . $url . '">登录成功,正在返回......';
            }
        } else
            $err = "密码不正确，请重新 <a href='login.php' class='title'>[登录]</a>";
    } else
        $err = "用户名不存在，请重新 <a href='login.php' class='title'>[登录]</a>";
    $err .= "<br><br><input type=\"button\" value=\"返回首页\" onClick=\"JavaScript:window.location.href='index.php'\" class=\"stbtm\"  name=\"button3\">";
}
?>

<html>
<head>
    <title><?php echo $sitename ?> -- 用户登录</title>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312">
    <?php echo $http_head; ?>
    <link rel="stylesheet" href="conf/style.css" type="text/css">
</head>
<body bgcolor="#FFFFFF" text="#000000" <?php if ($err == "") echo 'onload="document.login.u_name.focus();"' ?>>
<?php include "conf/header.php" ?>
<table width="750" border="0" align="center" cellspacing="0" cellpadding="0">
    <tr align="center" bgcolor="#efefef">
        <td>
            <p>&nbsp; </p>
        <p>
            <?php
            if ($u_name)
                echo $err;
            else {
                ?>
      </p>
      <table align=center border=0 cellspacing=0 width=300>
          <tbody>
          <tr>
              <td height=30 align="center"><img height=35 src="images/denlu1.gif"
                                                width=170>
                  <script language="JavaScript">
                      function check() {
                          document.login.submit.disabled = true;
                          document.login.submit2.disabled = true;
                      }
                  </script>
              </td>
          </tr>
          <tr>
              <td align="center"><br>
                  <?php if (isset($login_name))
                      echo "亲爱的 <font color='#cc0000'>" . $login_name . "</font>，您好，您已经登录.";
                  ?>
                  <form action="" method=post name=login onSubmit="return(check());">
                      <table align=center border=0 cellpadding=2 cellspacing=5
                             width="80%">
                          <tbody>
                          <tr>
                              <td width="35%" align="right"> 用户名<b>：</b></td>
                              <td width="65%">
                                  <input class=think name=u_name size=15>
                              </td>
                          </tr>
                          <tr>
                              <td width="35%" align="right"> 密　码<b>：</b></td>
                              <td width="65%">
                                  <input class=think name=u_pass size=15
                                         type=password>
                              </td>
                          </tr>
                          <tr align="center">
                              <td colspan=2 height=27 width="65%">
                                  <input class=stbtm name=submit type=submit value=登录>
                                  <input class=stbtm name=submit2
                                         onClick="JavaScript:window.location.href='register1.php'" type=button value=注册>
                                  <input type="hidden" name="url" value="<?php echo $url ?>">
                              </td>
                          </tr>
                          <tr align="center">
                              <td colspan=2 height=27 width="65%"><img height=11
                                                                       src="images/forget.gif" width=11> &nbsp;我忘记了密码，<a
                                      href="password.php"><font
                                      color=#ce0929>请点击这儿！</font></a></td>
                          </tr>
                          </tbody>
                      </table>
                  </form>
              </td>
          </tr>
          <tr>
              <td height=10></td>
          </tr>
          <tr>
              <td></td>
          </tr>
          </tbody>
      </table>
                <?php } ?>
            <p>&nbsp;</p></td>
    </tr>
</table>
<br>
<?php include "conf/footer.php"; ?>
</body>
</html>
