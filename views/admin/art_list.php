<?php tpl("admin_header") ?>
<body>
<div class="page-content">
    <div class="page-header">
        <span class="bigger-150">
            内容列表 / <?php echo anchor('articles/add','新增')?>
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
                                <th>内容标题</th>
                                <th>所属分类</th>
                                <th class="hidden-sm hidden-xs">创建时间</th>
                                <th class="hidden-sm hidden-xs">创建人</th>
                                <th></th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php if(is_array($list)) foreach ($list as $_artItem):?>
                                <tr>
                                    <td class="center">
                                        <label>
                                            <input type="checkbox" class="ace" _aid="<?php echo $_artItem['art_id']?>"/>
                                            <span class="lbl"></span>
                                        </label>
                                    </td>
                                    <td><?php echo trimTitle($_artItem['art_title'])?></td>
                                    <td><?php echo trimTitle($_artItem['cate_name'])?></td>
                                    <td class="hidden-sm hidden-xs"><?php echo trimTitle($_artItem['art_ctime'])?></td>
                                    <td class="hidden-sm hidden-xs"><?php echo trimTitle($_artItem['uname'])?></td>
                                    <td>
                                        <?php echo actLink($_artItem['art_id'],array('base'=>'articles'))?>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                        <?php pagenation('articles/index',$page,$totalpage)?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    seajs.use('apps/admin.list.js')
</script>
</body>
</html>
