<?php tpl("admin_header") ?>
<body>
<div class="page-content">
    <div class="page-header">
        <span class="bigger-150">
            新增内容 / <?php echo anchor('articles','返回')?>
        </span>
    </div><!-- /.page-header -->

    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <div class="row">
                <div class="col-xs-12">
                    <form class="form-horizontal" role="form" method="post">

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 所属分类</label>

                            <div class="col-sm-9">
                                <select name="category" id="category" class="col-xs-10 col-sm-5">
                                    <option value="">---请选择分类---</option>
                                </select>
                                <span class="help-inline col-xs-12 col-sm-7 text-danger">
												<span class="middle"></span>
											</span>
                            </div>
                        </div>

                        <div class="space-4"></div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 内容概要</label>

                            <div class="col-sm-9">
                                <textarea id="art_description" name="art_description" placeholder="内容概要" class="col-xs-10 col-sm-5"></textarea>
                                <span class="help-inline col-xs-12 col-sm-7 text-danger">
                                    <span class="middle"></span>
                                </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 内容</label>

                            <div class="col-sm-9">
                                <textarea id="art_content" name="art_content" placeholder="内容概要" class="col-xs-10 col-sm-6" style="height: 400px"></textarea>
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
<link rel="stylesheet" href="/assets/lib/js/kindeditor/themes/default/default.css">
<script>
    seajs.use('apps/art.add.js')
</script>
</body>
</html>
