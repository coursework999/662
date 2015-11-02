<?php include "js_select.php" ?>
<table width="750" border="0" bgcolor="#eeeeee" align="center">
    <tr>
        <td align="right" style="line-height:150%"><a href="index.php" class="clink03">网站首页</a>
            | <a href="admin.php" class="clink03">管理员首页</a> | <a href="admin_class.php" class="clink03">商品类别管理</a>
            | <a href="admin_goods.php" class="clink03">商品管理</a> | <a href="admin_news.php" class="clink03">新闻管理</a>
            | <a href="admin_dingdang.php" class="clink03">订单管理</a> | <a href="admin_user.php" class="clink03">会员管理</a>
            | <a href="admin_ad.php" class="clink03">广告管理</a> | <a href="admin_vote.php" class="clink03">调查管理</a>
            | <a href="admin_link.php" class="clink03">友情管理</a> | <a href="admin_mail_list.php" class="clink03">邮件列表</a>
            <BR>
            辅助功能：
            <a href="admin_new_goods.php" title="批量上传产品数据库" class="clink03">批量上传产品</a> |
            <a href="admin_system.php" title="设置网站的一些参数" class="clink03">系统参数</a>
            <?php
            if ($stat) echo " | <a href=\"$siteurl/stat/\" target=\"_blank\" class=\"clink03\">网站流量</a>";
            ?> | <a href="backup.php" title="为了确保数据库的完整性，请经常备份数据库" class="clink03">备份数据库</a> | <a href="db_opti.php"
                                                                                                  title="优化数据库，提高执行速度"
                                                                                                  target="_blank"
                                                                                                  class="clink03">数据库优化</a>
            | <a href="db_test.php" title="测试数据库连接速度" target="_blank" class="clink03">数据库测试</a>
            &nbsp;</td>
    </tr>
</table>