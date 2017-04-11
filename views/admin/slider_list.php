<?php tpl("admin_header") ?>
<body>
<div class="page-content">
    <div class="page-header">
        <span class="bigger-150">
            焦点图列表 / <?php echo anchor('slider/add','新增')?>
        </span>
    </div><!-- /.page-header -->

    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <div class="row">
                <div class="col-xs-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover newRec">
                            <thead>
                            <tr>
                                <th class="center">
                                    <label>
                                        <input type="checkbox" class="ace"/>
                                        <span class="lbl"></span>
                                    </label>
                                </th>
                                <th>标题</th>
                                <th>类型</th>
                                <th>展示图</th>
                                <th>链接地址</th>
                                <th></th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php if(is_array($list)) foreach ($list as $_slider):?>
                                <tr>
                                    <td class="center">
                                        <label>
                                            <input type="checkbox" class="ace" _itemId="<?php echo $_slider['s_id']?>"/>
                                            <span class="lbl"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <?php echo $_slider['s_title']?>
                                    </td>
                                    <td><?php echo isset($typeMap[$_slider['s_type']])?$typeMap[$_slider['s_type']] : "未知类型"?></td>
                                    <td><?php printf('<a href="%s" target="_blank">%s</a>',$_slider['s_thub'],$_slider['s_thub'])?></td>
                                    <td><?php echo $_slider['s_target']?></td>
                                    <td>
                                        <?php echo actLink($_slider['s_id'],array('base'=>'slider'))?>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                        <?php pagenation('slider/index',$page,$totalpage)?>
                    </div><!-- /.table-responsive -->
                </div><!-- /span -->
            </div><!-- /row -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.page-content -->
<script>
    seajs.use('apps/common.js')
</script>
</body>
</html>
