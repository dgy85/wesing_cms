<?php tpl("admin_header") ?>
<body>
<div class="page-content">
    <div class="page-header">
        <span class="bigger-150">
            编辑分类 / <?php echo anchor('category','返回')?>
        </span>
    </div><!-- /.page-header -->

    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <div class="row">
                <div class="col-xs-12">
                    <form class="form-horizontal" role="form" method="post">
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 分类名称</label>

                            <div class="col-sm-9">
                                <input type="text" id="categoryname" name="categoryname" value="<?php echo $cate_name?>" placeholder="分类名称" class="col-xs-10 col-sm-5">
                                <span class="help-inline col-xs-12 col-sm-7 text-danger">
                                    <span class="middle"></span>
                                </span>
                            </div>
                        </div>

                        <div class="space-4"></div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 分类缩略图</label>

                            <div class="col-sm-9">
                                <input readonly type="text" id="thub" value="<?php echo $cate_thub?>" name="thub" placeholder="分类缩略图" class="col-xs-10 col-sm-5">
                                &nbsp;&nbsp;<input type="button" id="uploadthubButton" value="Upload" />
                                <span class="help-inline col-xs-12 col-sm-7 text-danger">
												<span class="middle"></span>
											</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 分类排序</label>

                            <div class="col-sm-9">
                                <input type="text" id="sort" value="<?php echo $cate_sort?>" name="sort" placeholder="分类排序" class="col-xs-10 col-sm-5">
                                <span class="help-inline col-xs-12 col-sm-7 text-danger">
												<span class="middle"></span>
											</span>
                            </div>
                        </div>
                        <input type="hidden" name="documentid" value="<?php echo $cate_id?>">
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
<link rel="stylesheet" href="/assets/lib/js/kindeditor/themes/default/default.css">
<script>
    seajs.use('apps/category.edit.js')
</script>
</body>
</html>
