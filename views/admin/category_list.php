<?php tpl("admin_header") ?>
<body>
<div class="page-content">
    <div class="page-header">
        <span class="bigger-150">
            分类列表 / <?php echo anchor('category/add','新增')?>
        </span>
    </div><!-- /.page-header -->

    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <div class="row">
                <div class="col-xs-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="center">
                                    <label>
                                        <input type="checkbox" class="ace"/>
                                        <span class="lbl"></span>
                                    </label>
                                </th>
                                <th>分类名称</th>
                                <th class="hidden-sm hidden-xs">列表图片</th>
                                <th class="hidden-sm hidden-xs">分类大图</th>
                                <th class="hidden-sm hidden-xs">排序</th>
                                <th class="hidden-sm">操作</th>
                            </tr>
                            </thead>

                            <tbody>
                                <?php if (is_array($list)) foreach ($list as $_cateitem):?>
                                    <tr>
                                        <td class="center">
                                            <label>
                                                <input type="checkbox" class="ace" _itemId="<?php echo $_cateitem['cate_id']?>"/>
                                                <span class="lbl"></span>
                                            </label>
                                        </td>
                                        <td><?php echo $_cateitem['cate_name']?></td>
                                        <td class="hidden-sm hidden-xs">
                                            <?php printf('<a href="%s" target="_blank">%s</a>',$_cateitem['cate_thub'],$_cateitem['cate_thub'])?>
                                        </td>
                                        <td class="hidden-sm hidden-xs">
                                            <?php printf('<a href="%s" target="_blank">%s</a>',$_cateitem['cate_metaimage'],$_cateitem['cate_metaimage'])?>
                                        </td>
                                        <td class="hidden-sm hidden-xs"><?php echo $_cateitem['cate_sort']?></td>
                                        <td>
                                            <?php echo actLink($_cateitem['cate_id'],array('base'=>'category'))?>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                        <?php pagenation('category/index',$page,$totalpage)?>
                    </div><!-- /.table-responsive -->
                </div><!-- /span -->
            </div><!-- /row -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.page-content -->
<script>
    seajs.use('apps/admin.list.js')
</script>
</body>
</html>
