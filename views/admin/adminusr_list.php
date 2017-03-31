<?php tpl("admin_header") ?>
<body>
<div class="page-content">
    <div class="page-header">
        <span class="bigger-150">
            管理员列表 / <?php echo anchor('administrator/add','新增')?>
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
                                <th>用户名</th>
                                <th>创建时间</th>
                                <th>上次登录时间</th>
                                <th>上次登录地址</th>
                                <th></th>
                            </tr>
                            </thead>

                            <tbody>
                                <?php if(is_array($list)) foreach ($list as $_usr):?>
                                    <tr>
                                        <td class="center">
                                            <label>
                                                <input type="checkbox" class="ace" _itemId="<?php echo $_usr['id']?>"/>
                                                <span class="lbl"></span>
                                            </label>
                                        </td>
                                        <td>
                                            <a href="#"><?php echo $_usr['uname']?></a>
                                        </td>
                                        <td><?php echo $_usr['ctime']?></td>
                                        <td><?php echo $_usr['lastlogin']?></td>
                                        <td><?php echo long2ip($_usr['lastloginip'])?></td>
                                        <td>
                                            <?php echo actLink(45,array('test'=>'link','tar'=>'base'))?>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="left" style="font-weight: normal;border-bottom: none">
                                    <?php printf("&nbsp;&nbsp;共%d条记录&nbsp;&nbsp;当前第%d~%d条&nbsp;&nbsp;%d/%d",$total,$start,$end,$page,$totalpage)?>
                                </th>
                            </tr>
                            </thead>
                        </table>
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
