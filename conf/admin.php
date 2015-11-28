<?php include "js_select.php" ?>
<table width="750" border="0" bgcolor="#eeeeee" align="center">
    <tr>
        <td align="left" style="line-height:150%"><a href="index.php" class="clink03">Home page</a>
            | <a href="admin.php" class="clink03">Administrator page</a> | <a href="admin_class.php" class="clink03">Class Management</a>
            | <a href="admin_goods.php" class="clink03">Product Management</a> | <a href="admin_news.php" class="clink03">News Management</a>
            | <a href="admin_dingdang.php" class="clink03">Order Management</a> | <a href="admin_user.php" class="clink03">Membership Management</a>
            | <a href="admin_ad.php" class="clink03">AD Management</a> | <a href="admin_vote.php" class="clink03">Survey Management</a>
            | <a href="admin_link.php" class="clink03">Friendship Management</a> | <a href="admin_mail_list.php" class="clink03">Email List</a>
            <BR>
            Additional Functions£º
            <a href="admin_new_goods.php" title="Bulk upload product into database" class="clink03">Bulk Upload Product</a> |
            <a href="admin_system.php" title="setup some params of the site" class="clink03">System params</a>
            <?php
            if ($stat) echo " |
            <a href=\"$siteurl/stat/\" target=\"_blank\" class=\"clink03\">Net Current</a>"; ?> |
            <a href="my_backup.php" title="In order to gurantee the integrity of Database, please backup database regularly" class="clink03">Database Backup</a> |
            <a href="my_recovery.php" title="recover database using sql file" class="clink03">Database Recovery</a> |
            <a href="db_opti.php" title="Database optimize" target="_blank" class="clink03">Database Optimization</a> |
            <a href="db_test.php" title="Test database connection speed" target="_blank" class="clink03">Database Test</a>
            &nbsp;</td>
    </tr>
</table>