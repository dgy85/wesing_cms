<?php tpl("admin_header") ?>
<!--文章详情页-->
<body>
<div class="page-content">
    <div class="page-header">
        <span class="bigger-150">
            <?php  echo $list['art_title']?>
        </span>
    </div><!-- /.page-header -->
    <div class="row">
        <div class="col-sm-6">
            <p>
                <?php  if (is_array($list)) echo $list['art_content']?>

            </p>
        </div>
    </div>
</div>
<script>
    seajs.use('apps/admin.list.js')
</script>
</body>
</html>
