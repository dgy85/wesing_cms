<?php tpl("admin_header") ?>
<body>
<div class="page-content">
    <div class="page-header">
        <span class="bigger-150">
            新增焦点图 / <?php echo anchor('slider','返回')?>
        </span>
    </div><!-- /.page-header -->

    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <div class="row">
                <div class="col-xs-12">
                    <form class="form-horizontal" role="form" method="post">

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 标题</label>

                            <div class="col-sm-9">
                                <input type="text" id="slidername" name="slidername" placeholder="标题" class="col-xs-10 col-sm-5">
                                <span class="help-inline col-xs-12 col-sm-7 text-danger">
                                    <span class="middle"></span>
                                </span>
                            </div>
                        </div>

                        <div class="space-4"></div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 展示图片</label>

                            <div class="col-sm-9">
                                <input readonly type="text" id="thub" name="thub" placeholder="展示图片" class="col-xs-10 col-sm-5">
                                &nbsp;&nbsp;<input type="button" id="uploadmetaButton" value="Upload" />
                                <span class="help-inline col-xs-12 col-sm-7 text-danger">
												<span class="middle"></span>
											</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 链接类型</label>

                            <div class="col-sm-4" style="text-align: left">
                                <label class="control-label" style="float: left">
                                    <input type="radio" name="stype" checked value="link">
                                    链接
                                </label>
                                <label class="control-label" style="float: left;margin-left: 20px">
                                    <input type="radio" name="stype" value="web"> 外部网址
                                </label>
                                <span class="help-inline col-xs-12 col-sm-7 text-danger">
												<span class="middle"></span>
											</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 链接地址</label>

                            <div class="col-sm-9">
                                <input type="text" id="target" value="" name="target" placeholder="链接地址" class="col-xs-10 col-sm-5">
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
    seajs.use('apps/slider.add.js')
</script>
</body>
</html>
