<?php tpl("admin_header") ?>
<body>
<div class="page-content">
    <div class="page-header">
        <span class="bigger-150">
            微信用户列表
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
                                <th>用户昵称</th>
                                <th>用户头像</th>
                                <th>用户key</th>
                                <th>登录类型</th>
                                <th>注册时间</th>
                                <th></th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php if(is_array($list)) foreach ($list as $_usr):?>
                                <tr>
                                    <td class="center">
                                        <label>
                                            <input type="checkbox" class="ace" _itemId="<?php echo $_usr['usr_id']?>"/>
                                            <span class="lbl"></span>
                                        </label>
                                    </td>
                                    <td><?php echo $_usr['nick_name']?></td>
                                    <td><a href="<?php echo $_usr['usr_thub']?>"><?php echo $_usr['usr_thub']?></a> </td>
                                    <td><?php echo $_usr['open_key']?></td>
                                    <td><?php echo $_usr['key_type']?></td>
                                    <td><?php echo $_usr['regtime']?></td>
                                    <td>
                                        <?php echo actLink($_usr['usr_id'],array('base'=>'administrator'))?>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                        <?php pagenation('usr/index',$page,$totalpage)?>
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
