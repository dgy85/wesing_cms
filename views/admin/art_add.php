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
                                    <?php
                                        if($list) foreach ($list as $_cateItem):
                                            printf('<option value="%d" %s>%s</option>',$_cateItem['cate_id'],isset($_cateItem['children']) ? "disabled" : "",$_cateItem['cate_name']);
                                            if($_cateItem['children']) foreach ($_cateItem['children'] as $_child){
                                                printf('<option value="%d">%s</option>',$_child['cate_id'],$_child['cate_name']);
                                            }

                                        endforeach;
                                    ?>
                                </select>
                                <span class="help-inline col-xs-12 col-sm-7 text-danger">
												<span class="middle"></span>
											</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 内容标题</label>

                            <div class="col-sm-9">
                                <input type="text" id="art_title" name="art_title" placeholder="内容标题" class="col-xs-10 col-sm-5">
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

                        <div class="form-group switch-content">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 是否活动</label>

                            <div class="col-sm-1" style="padding-top: 7px">
                                <input type="checkbox" id="ifactivity" name="ifactivity" class="col-xs-10 col-sm-5">
                                <span class="help-inline col-xs-12 col-sm-7 text-danger">
												<span class="middle"></span>
											</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 内容</label>

                            <div class="col-sm-9">
                                <textarea id="art_content" name="art_content" placeholder="内容概要" class="col-sm-10" style="height: 400px"></textarea>
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
