<?php tpl("admin_header") ?>
<body>
<div class="page-content">
    <div class="page-header">
        <span class="bigger-150">
            新增管理员 / <?php echo anchor('administrator','返回')?>
        </span>
    </div><!-- /.page-header -->

    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <div class="row">
                <div class="col-xs-12">
                    <form class="form-horizontal" role="form" method="post">
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 管理员账号</label>

                            <div class="col-sm-9">
                                <input type="text" id="adminName" name="adminname" placeholder="管理员账号" class="col-xs-10 col-sm-5">
                                <span class="help-inline col-xs-12 col-sm-7 text-danger">
                                    <span class="middle"></span>
                                </span>
                            </div>
                        </div>

                        <div class="space-4"></div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 登录密码</label>

                            <div class="col-sm-9">
                                <input type="password" id="adminpass" name="adminpass" placeholder="登录密码" class="col-xs-10 col-sm-5">
                                <span class="help-inline col-xs-12 col-sm-7 text-danger">
												<span class="middle"></span>
											</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 确认密码</label>

                            <div class="col-sm-9">
                                <input type="password" id="confirmpass" name="confirmpass" placeholder="确认密码" class="col-xs-10 col-sm-5">
                                <span class="help-inline col-xs-12 col-sm-7 text-danger">
												<span class="middle"></span>
											</span>
                            </div>
                        </div>

                        <div class="clearfix form-actions">
                            <div class="col-md-12">
                                <button class="btn btn-info btn-sm" type="submit">
                                    <i class="icon-ok bigger-110"></i>
                                    提交
                                </button>

                                &nbsp; &nbsp; &nbsp;
                                <button class="btn  btn-sm" type="reset">
                                    <i class="icon-undo bigger-110"></i>
                                    重置
                                </button>
                            </div>
                        </div>
                    </form>
                </div><!-- /span -->
            </div><!-- /row -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.page-content -->
<script>
    seajs.use('apps/admin.add.js')
</script>
</body>
</html>
