<?php include "js_select.php" ?>
<table width="750" border="0" bgcolor="#eeeeee" align="center">
    <tr>
        <td align="right" style="line-height:150%"><a href="index.php" class="clink03">��վ��ҳ</a>
            | <a href="admin.php" class="clink03">����Ա��ҳ</a> | <a href="admin_class.php" class="clink03">��Ʒ������</a>
            | <a href="admin_goods.php" class="clink03">��Ʒ����</a> | <a href="admin_news.php" class="clink03">���Ź���</a>
            | <a href="admin_dingdang.php" class="clink03">��������</a> | <a href="admin_user.php" class="clink03">��Ա����</a>
            | <a href="admin_ad.php" class="clink03">������</a> | <a href="admin_vote.php" class="clink03">�������</a>
            | <a href="admin_link.php" class="clink03">�������</a> | <a href="admin_mail_list.php" class="clink03">�ʼ��б�</a>
            <BR>
            �������ܣ�
            <a href="admin_new_goods.php" title="�����ϴ���Ʒ���ݿ�" class="clink03">�����ϴ���Ʒ</a> |
            <a href="admin_system.php" title="������վ��һЩ����" class="clink03">ϵͳ����</a>
            <?php
            if ($stat) echo " | <a href=\"$siteurl/stat/\" target=\"_blank\" class=\"clink03\">��վ����</a>";
            ?> | <a href="backup.php" title="Ϊ��ȷ�����ݿ�������ԣ��뾭���������ݿ�" class="clink03">�������ݿ�</a> | <a href="db_opti.php"
                                                                                                  title="�Ż����ݿ⣬���ִ���ٶ�"
                                                                                                  target="_blank"
                                                                                                  class="clink03">���ݿ��Ż�</a>
            | <a href="db_test.php" title="�������ݿ������ٶ�" target="_blank" class="clink03">���ݿ����</a>
            &nbsp;</td>
    </tr>
</table>