<?php

require "conf/config.php";
session_start();


if ($u_name) {
    if (strpos($u_name, "'") || strpos($u_pass, "'")) {
        echo "There is something wrong with your login. Please login again. <a href='my_login.php'>[login]</a>";

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
                if ($url == $PHP_SELF || $url == "") $url = "my_index.php";
                $err = '<meta http-equiv="refresh" content="2;URL=' . $url . '">login successfully, go back to index......';
            }
        } else
            $err = "password incorrect, input your password again. <a href='my_login.php' class='title'>[login]</a>";
    } else
        $err = "username does not exist! <a href='my_login.php' class='title'>[login]</a>";
    $err .= "<br><br><input type=\"button\" value=\"go back to index\" onClick=\"JavaScript:window.location.href='my_index.php'\" class=\"stbtm\"  name=\"button3\">";
} /*else {
    $err = "user name is empty ! <a href='my_login.php' class = 'title' >[login]</a>";
}*/

echo $err;
?>


<form method="post" action="#">
    username:
    <input type="text" name="u_name"/>
    <br/>
    password:
    <input type="text" name="u_pass"/>

    <input type="submit" value = "login">
</form>