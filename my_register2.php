<?php
require "conf/config.php";
if ($u == "") {
    echo "Error!";
    exit();
}
if ($user_reg_flag == 0) {
    echo "Cannot register new user <BR><BR>Sorry, registration has shut down, please contact administrator.";
    exit();
}
?>

<html>
<head>
    <title><?php echo $sitename ?> register</title>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312">
    <?php echo $http_head; ?>
    <link rel="stylesheet" href="conf/style.css" type="text/css">
</head>
<body>

<?php include "conf/header.php" ?>
<table width="750" border="0" align="center">
<tr align="center">
<td><img src="images/ze2.gif" width="195" height="35">

<!-- script code -->

<script language=JavaScript>
prvarr = new Array(51);
ctylst = new Array(1000);
ss = new Array(3);
prvcnt = 31;
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
prvarr[32] = new prv(18, 'New York');
prvarr[33] = new prv(19, 'North Carolina');
prvarr[34] = new prv(20, 'North Dakota');
prvarr[35] = new prv(21, 'Ohio');
prvarr[36] = new prv(22, 'Oklahoma');
prvarr[37] = new prv(23, 'Oregon');
prvarr[38] = new prv(24, 'Pennsylvania');
prvarr[39] = new prv(25, 'Rhode Island');
prvarr[40] = new prv(26, 'South Carolina');
prvarr[41] = new prv(27, 'South Dakota');
prvarr[42] = new prv(28, 'Tennesse');
prvarr[43] = new prv(29, 'Texas');
prvarr[44] = new prv(30, 'Utah');
prvarr[45] = new prv(31, 'Vermont');
prvarr[46] = new prv(26, 'Virginia');
prvarr[47] = new prv(27, 'Washington');
prvarr[48] = new prv(28, 'West Virginia');
prvarr[49] = new prv(29, 'Wisconsin');
prvarr[50] = new prv(30, 'Wyoming');


ctycnt = 181;
function prvcty(pid, cid, name) {
    this.pid = pid;
    this.cid = cid;
    this.name = name;
}
function prv(id, name) {
    this.id = id;
    this.name = name;
}

function ctychg(n, k) {
    lth = document.formlogin.city.length
    for (i = 0; i <= lth; i++) {
        document.formlogin.city.remove(0);
    }

    for (j = 1; j <= ctycnt; j++) {

        a = n.substring(0, n.indexOf(","));
        if (ctylst[j].pid == a) {
            var oOption = document.createElement("OPTION");

            oOption.text = ctylst[j].name;
            oOption.value = ctylst[j].name;
            document.formlogin.city.add(oOption);
            if (ctylst[j].cid == k) {
                oOption.selected = 1;
                cityname = ctylst[j].name;
            }
            oOption.empty;
        }
    }
}


function check() {
    var pass = document.formlogin.u_pass.value;
    var lowercase = 0;
    var uppercase = 0;
    var number = 0;
    if(pass.length==0){
        document.formlogin.u_pass.focus();
        window.alert("Password cannot be null!");
        return false;
    } else if(pass.length < 4 || pass.length > 16) {
        document.formlogin.u_pass.focus();
        window.alert("Password should be 4-16 numbers or characters!");
        return false;
    } else {
        for(var i = 0; i < pass.length; i++) {
            var asciiNumber = pass.substr(i, 1).charCodeAt();
            if(asciiNumber >= 48 && asciiNumber <= 57) {
                number += 1;
            }
            if(asciiNumber >= 65 && asciiNumber <= 90) {
                uppercase += 1;
            }

        }
        if(0==uppercase) {
            document.formlogin.u_pass.focus();
            window.alert("Password should include at least 1 Uppercase character!");
            return false;
        }
        if(0==number) {
            document.formlogin.u_pass.focus();
            window.alert("Password should include at least 1 number!");
            return false;
        }
    }



    if (document.formlogin.u_pass.value != document.formlogin.u_pass2.value) {
        document.formlogin.u_pass2.focus();
        window.alert("Two passwords do not match!");
        return false;
    }
    if (document.formlogin.email.value == "" || document.formlogin.email.value.length < 1)            //判断信箱是否为空
    {
        alert("Please input email!");
        document.formlogin.email.select();
        document.formlogin.email.focus();
        return (false);
    }

    var checkOKeemail = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-_@.";           //判断信箱中是否有非法字符
    var checkStreemail = document.formlogin.email.value;
    var allValideemail = true;
    for (i = 0; i < checkStreemail.length; i++) {
        ch = checkStreemail.charAt(i);
        for (j = 0; j < checkOKeemail.length; j++)
            if (ch == checkOKeemail.charAt(j))
                break;
        if (j == checkOKeemail.length) {
            allValideemail = false;
            break;
        }
    }

    if (document.formlogin.email.value.length < 6 || document.formlogin.email.value.length > 60) //判断信箱长度是否合法
    {
        allValideemail = false;
    }

    if (!allValideemail)                                                   //判断信箱中是否有非法字符
    {
        alert("Your input \"Email Address\" is invalid, Please pay attention to the length and illegal characters!");
        document.formlogin.email.select();
        document.formlogin.email.focus();
        return (false);
    }

    eemailvalue = document.formlogin.email.value;
    if (eemailvalue.length > 0) {
        i = eemailvalue.indexOf("@");
        if (i == -1) {
            window.alert("Sorry, your input email is not a valid one,even without \"@\"!");
            document.formlogin.email.select();
            document.formlogin.email.focus();
            return false
        }
        ii = eemailvalue.indexOf(".")
        if (ii == -1) {
            window.alert("Sorry, your input email is not a valid one,even without \".\"!");
            document.formlogin.email.select();
            document.formlogin.email.focus();
            return false
        }
    }

    if (document.formlogin.name.value == "") {
        document.formlogin.name.focus();
        window.alert("Username cannot be empty, and at most 20 characters!");
        return false;
    }
    if (document.formlogin.sex.value == 0) {
        document.formlogin.sex.focus();
        window.alert("Please select gender!");
        return false;
    }
    if (document.formlogin.province.value == "") {
        document.formlogin.province.focus();
        window.alert("Please select state!");
        return false;
    }

    if (document.formlogin.tel.value == "") {
        document.formlogin.tel.focus();
        window.alert("Please input your telephone number!");
        return false;
    }/*
    if (document.formlogin.address.value == "") {
        document.formlogin.address.focus();
        window.alert("Please input your address!");
        return false;
    }
    if (document.formlogin.post.value.length < 6 || isNaN(document.formlogin.post.value)) {
        document.formlogin.post.focus();
        window.alert("Post code is invalid!");
        return false;
    }*/
    document.formlogin.Submit.disabled = true;
    document.formlogin.Submit2.disabled = true;
}
function checkName() {
    var args = checkName.arguments
    var strWord;
    var s;
    var lStringLength;
    var i;
    var bReturn;

    if (args.length > 0) {
        strWord = args[0];
        lStringLength = strWord.length;
        if (lStringLength > 0) {
            for (i = 0; i < lStringLength; i++) {
                s = strWord.charCodeAt(i);
                bReturn = true;
                if (s < 255)
                    bReturn = false;

                if (!bReturn) {
                    alert('Please input your reals name！');
                    return false;
                }

            }
        }
    }
    return true;
}
</script>
</td>
</tr>


<!--content -->
<tr align="center">
    <td>
        <table width="630" border="0">
            <tr>
                <td height="18" class="p14">
                    <table border=0 cellpadding=0 cellspacing=0 width="100%">
                        <tbody>
                        <tr align="left">
                            <th bgcolor=#ffffff colspan=4 height=22 valign=top><b><font color="#CC0000" class="p14">Info </font></b><font color="#CC0000" class="p14"><span class="p9"><font
                                    color="#666666">(it is important for delivery)</font></span>
                            </font></th>
                        </tr>
                        <tr bgcolor=#cc0000>
                            <td colspan=4 height=2 valign=top></td>
                        </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr align="center">
                <td height="18">
                    <form name="formlogin" method="post" action="my_register3.php" onSubmit="return(check());">
                        <table width="67%" border="0">
                            <tr>
                                <td colspan="2">
                                    <?php
                                    echo "<b><font color=#cc0033> dear " . $u . "，please continue your profile。</font></b>";
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td width="22%" align="right"> password：</td>
                                <td width="78%">
                                    <input type="password" name="u_pass" class="think" maxlength="16" size="12">
                                    <font color="#CC0000">*</font>（4-16 numbers and characters,at least one uppercase character and one number）
                                </td>
                            </tr>
                            <tr>
                                <td width="22%" align="right">comfirm password：</td>
                                <td width="78%">
                                    <input type="password" name="u_pass2" class="think" maxlength="16" size="12">
                                    <font color="#CC0000">*</font></td>
                            </tr>
                            <tr>
                                <td width="22%" align="right">Email：</td>
                                <td width="78%">
                                    <input type="text" name="email" class="think" maxlength="60" size="30">
                                    <font color="#CC0000">*</font></td>
                            </tr>
                            <tr>
                                <td width="22%" align="right">name：</td>
                                <td width="78%">
                                    <input type="text" name="name" class="think" maxlength="20" size="12"
                                           Onchange="JavaScript:if(!checkName(this.value)) return false;">
                                    <font color="#CC0000">*</font></td>
                            </tr>
                            <tr>
                                <td width="22%" align="right"> gender ：</td>
                                <td width="78%">
                                    <select name="sex">
                                        <option value="0" selected>choose</option>
                                        <option value="1">male</option>
                                        <option value="2">female</option>
                                    </select>
                                    <font color="#CC0000">*</font></td>
                            </tr>
                            <tr>
                                <td width="22%" align="right">state：</td>
                                <td width="78%">
                                    <select name=province
                                            onChange="ctychg(document.formlogin.province.value)"
                                            class="think">
                                        <script language=javascript>
                                            document.write("<option selected>");
                                            document.write("state");
                                            document.write("</option>");
                                            for (i = 1; i <= prvcnt; i++) {
                                                document.write("<option value=");
                                                document.write(prvarr[i].id + "," + prvarr[i].name);
                                                document.write(">")
                                                document.write(prvarr[i].name);
                                                document.write("</option>");
                                            }
                                        </script>
                                    </select>
                                    <font color="#CC0000">*</font></td>
                            </tr>
                            <tr>
                                <td width="22%" align="right">city：</td>
                                <td width="78%">
                                    <input type="text" name="tel" class="think" maxlength="40" size="20">
                                    <font color="#CC0000">*</font></td>
                            </tr>
                            <tr>
                                <td width="22%" align="right">telephone：</td>
                                <td width="78%">
                                    <input type="text" name="tel" class="think" maxlength="40" size="20">
                                    <font color="#CC0000">*</font></td>
                            </tr>
                            <tr>
                                <td width="22%" align="right">address：</td>
                                <td width="78%">
                                    <input type="text" name="address" class="think" maxlength="100" size="40">
                                </td>
                            </tr>
                            <tr>
                                <td width="22%" align="right">zip code：</td>
                                <td width="78%">
                                    <input type="text" name="post" class="think" maxlength="6" size="8">
                                    </td>
                            </tr>
                            <tr>
                                <td width="22%" align="right">SSN：</td>
                                <td width="78%">
                                    <input type="text" name="paper_num" class="think" maxlength="25" size="20">
                                </td>
                            </tr>
                            <tr align="center">
                                <td colspan="2" height="43">
                                    <input type="hidden" name="u" value="<?php echo $u ?>">
                                    <input type="submit" name="Submit" value=" register " class=stbtm2>
                                    　　
                                    <input type="reset" name="Submit2" value=" clear " class=stbtm2>
                                </td>
                            </tr>
                        </table>
                    </form>
                </td>
            </tr>
        </table>
    </td>
</tr>

</table>
<br>
<?php include "conf/footer.php"; ?>
</body>
</html>
