<?php
require "conf/config.php";
if ($u == "") {
    echo "��������!";
    exit();
}
if ($user_reg_flag == 0) {
    echo "����ע�����û� <BR><BR>�Բ���ϵͳ�Ѿ��ر������û�ע�Ṧ�ܣ�����������͹���Ա��ϵ��";
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


<table width="750" border="0" align="center">
<tr align="center">
<td><img src="images/ze2.gif" width="195" height="35">

<!-- script code -->
<!--
<script language=JavaScript>
function check() {
    if (document.formlogin.u_pass.value.length < 4 || document.formlogin.u_pass.value.length > 16) {
        document.formlogin.u_pass.focus();
        window.alert("����ӦΪ4-16λ���ֻ���ĸ!");
        return false;
    }

    if (document.formlogin.u_pass.value != document.formlogin.u_pass2.value) {
        document.formlogin.u_pass2.focus();
        window.alert("������������Ӧ����ͬ!");
        return false;
    }
    if (document.formlogin.email.value == "" || document.formlogin.email.value.length < 1)            //�ж������Ƿ�Ϊ��
    {
        alert("����������!");
        document.formlogin.email.select();
        document.formlogin.email.focus();
        return (false);
    }

    var checkOKeemail = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-_@.";           //�ж��������Ƿ��зǷ��ַ�
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

    if (document.formlogin.email.value.length < 6 || document.formlogin.email.value.length > 60) //�ж����䳤���Ƿ�Ϸ�
    {
        allValideemail = false;
    }

    if (!allValideemail)                                                   //�ж��������Ƿ��зǷ��ַ�
    {
        alert("������� \"�����ʼ���ַ\" ��Ч,��ע��Email��ַ�ĳ��ȼ��Ƿ������˷Ƿ��ַ�!");
        document.formlogin.email.select();
        document.formlogin.email.focus();
        return (false);
    }

    eemailvalue = document.formlogin.email.value;
    if (eemailvalue.length > 0) {
        i = eemailvalue.indexOf("@");
        if (i == -1) {
            window.alert("�Բ���!������ĵ����ʼ���ַ�Ǵ����,��\"@\"��û��!");
            document.formlogin.email.select();
            document.formlogin.email.focus();
            return false
        }
        ii = eemailvalue.indexOf(".")
        if (ii == -1) {
            window.alert("�Բ���!������ĵ����ʼ���ַ�Ǵ���ģ���\".\"��û��!");
            document.formlogin.email.select();
            document.formlogin.email.focus();
            return false
        }
    }

    if (document.formlogin.email.value.indexOf('@') == -1 || document.formlogin.email.value.indexOf('@') == 0 || document.formlogin.email.value.indexOf('@') == document.formlogin.email.value.length - 1) {
        alert("���ĵ����������ֲ��ԣ�@Ӧ������ȷ��λ��!");
        document.formlogin.email.select();
        document.formlogin.email.focus();
        return (false);
    }
    if (document.formlogin.name.value == "") {
        document.formlogin.name.focus();
        window.alert("�û������ܿգ������20���ַ�!");
        return false;
    }
    if (document.formlogin.sex.value == 0) {
        document.formlogin.sex.focus();
        window.alert("��ѡ���Ա�!");
        return false;
    }
    if (document.formlogin.province.value == "") {
        document.formlogin.province.focus();
        window.alert("��ѡ������ʡ��!");
        return false;
    }
    /*if (document.formlogin.city.value=="")
    {
        document.formlogin.city.focus();
        window.alert("��ѡ�����ڳ���!");
        return false;
    }*/
    if (document.formlogin.tel.value == "") {
        document.formlogin.tel.focus();
        window.alert("����д��ϵ�绰!");
        return false;
    }
    if (document.formlogin.address.value == "") {
        document.formlogin.address.focus();
        window.alert("����д��ϵ��ַ!");
        return false;
    }
    if (document.formlogin.post.value.length < 6 || isNaN(document.formlogin.post.value)) {
        document.formlogin.post.focus();
        window.alert("����ȷ��д�ʱ�!");
        return false;
    }
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
                    alert('Ϊ�˹���˳������������ʵ��������');
                    return false;
                }

            }
        }
    }
    return true;
}
</script>
-->
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
                                    echo "<b><font color=#cc0033> dear " . $u . "��please continue your profile��</font></b>";
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td width="22%" align="right"> password��</td>
                                <td width="78%">
                                    <input type="password" name="u_pass" class="think" maxlength="16" size="12">
                                    <font color="#CC0000">*</font>��4-16 numbers and characters��
                                </td>
                            </tr>
                            <tr>
                                <td width="22%" align="right">comfirm password��</td>
                                <td width="78%">
                                    <input type="password" name="u_pass2" class="think" maxlength="16" size="12">
                                    <font color="#CC0000">*</font></td>
                            </tr>
                            <tr>
                                <td width="22%" align="right">Email��</td>
                                <td width="78%">
                                    <input type="text" name="email" class="think" maxlength="60" size="30">
                                    <font color="#CC0000">*</font></td>
                            </tr>
                            <tr>
                                <td width="22%" align="right">name��</td>
                                <td width="78%">
                                    <input type="text" name="name" class="think" maxlength="20" size="12"
                                           Onchange="JavaScript:if(!checkName(this.value)) return false;">
                                    <font color="#CC0000">*</font></td>
                            </tr>
                            <tr>
                                <td width="22%" align="right"> gender ��</td>
                                <td width="78%">
                                    <select name="sex">
                                        <option value="0" selected>choose</option>
                                        <option value="1">male</option>
                                        <option value="2">female</option>
                                    </select>
                                    <font color="#CC0000">*</font></td>
                            </tr>
                            <tr>
                                <td width="22%" align="right">state��</td>
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
                                <td width="22%" align="right">city��</td>
                                <td width="78%">
                                    <select id=city name=city class="think">
                                    </select>
                                    <script language=javascript>
                                        ctychg(document.formlogin.city.value, 0);
                                    </script>
                                    <font color="#CC0000">*</font></td>
                            </tr>
                            <tr>
                                <td width="22%" align="right">telephone��</td>
                                <td width="78%">
                                    <input type="text" name="tel" class="think" maxlength="40" size="20">
                                    <font color="#CC0000">*</font></td>
                            </tr>
                            <tr>
                                <td width="22%" align="right">address��</td>
                                <td width="78%">
                                    <input type="text" name="address" class="think" maxlength="100" size="40">
                                    <font color="#CC0000">*</font></td>
                            </tr>
                            <tr>
                                <td width="22%" align="right">zip code��</td>
                                <td width="78%">
                                    <input type="text" name="post" class="think" maxlength="6" size="8">
                                    <font color="#CC0000">*</font></td>
                            </tr>
                            <tr>
                                <td width="22%" align="right">id number��</td>
                                <td width="78%">
                                    <input type="text" name="paper_num" class="think" maxlength="25" size="20">
                                </td>
                            </tr>
                            <tr align="center">
                                <td colspan="2" height="43">
                                    <input type="hidden" name="u" value="<?php echo $u ?>">
                                    <input type="submit" name="Submit" value=" register " class=stbtm2>
                                    ����
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
</body>
</html>
