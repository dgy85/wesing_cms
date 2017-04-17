<?php tpl("admin_header") ?>
<body>
<div class="page-content">
    <div class="page-header">
        <span class="bigger-150">
            活动注册信息
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
                                <th>活动分类</th>
                                <th>活动标题</th>
                                <th>姓　　名</th>
                                <th>登记时间</th>

                            </tr>
                            </thead>

                            <tbody>
                            <?php if (is_array($list)) foreach ($list as $_signinfoitem):?>
                                <tr>
                                    <td class="center">
                                        <label>
                                            <input type="checkbox" class="ace" _itemId="<?php echo $_signinfoitem['art_id']?>"/>
                                            <span class="lbl"></span>
                                        </label>
                                    </td>
                                    <td><?php echo $_signinfoitem['cate_name']?></td>
                                    <td>
                                        <a href="javascript:void(0);" onclick="turnPage('<?php echo $_signinfoitem['art_id']?>')"><?php echo $_signinfoitem['art_title']?></a>
                                    </td>
                                    <td>

                                       <?php echo $_signinfoitem['nick_name']?>

                                    </td>
                                    <td>
                                        <?php echo $_signinfoitem['sign_time']?>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                                    <?php pagenation('Signinfo/index',$page,$totalpage)?>
                    </div><!-- /.table-responsive -->
                </div><!-- /span -->
            </div><!-- /row -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.page-content -->
<script>
    seajs.use('apps/admin.list.js')
</script>
<script>
    function turnPage(art_id,art_content){
        layer.open({
            type: 2,
            title: '活动信息',
            maxmin: true,
            shadeClose: true, //点击遮罩关闭层
            area: ['830px', '560px'],
            content: 'Articles/detail/' + art_id
        });
    }
</script>
</body>
</html>
