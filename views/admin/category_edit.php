<?php tpl("admin_header") ?>
<?php $ifHidden = $singlepage ? '' : 'hidden'?>
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
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 上级分类</label>

                            <div class="col-sm-9">
                                <select name="parentid" id="parentid" class="col-xs-10 col-sm-5">
                                    <option value="">作为顶级分类</option>
                                    <?php
                                    if($catelist && is_array($catelist))
                                        foreach ($catelist as $_cateItem){
                                            printf('<option value="%d" %s>%s</option>',$_cateItem['cate_id'],$_cateItem['cate_id']==$parentid ? 'selected':'',$_cateItem['cate_name']);
                                        }
                                    ?>
                                </select>
                                <span class="help-inline col-xs-12 col-sm-7 text-danger">
                                    <span class="middle"></span>
                                </span>
                            </div>
                        </div>

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
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 分类大图</label>

                            <div class="col-sm-9">
                                <input readonly type="text" id="meta_image" value="<?php echo $cate_metaimage?>" name="meta_image" placeholder="分类大图" class="col-xs-10 col-sm-5">
                                &nbsp;&nbsp;<input type="button" id="uploadmetaButton" value="Upload" />
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

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 是否单页</label>

                            <div class="col-sm-1" style="padding-top: 7px">
                                <input type="checkbox" id="ifpage" name="ifpage" class="col-xs-10 col-sm-5" <?php echo $singlepage?'checked':''?>>
                                <span class="help-inline col-xs-12 col-sm-7 text-danger">
												<span class="middle"></span>
											</span>
                            </div>
                        </div>

                        <div class="form-group switch-content <?php echo $ifHidden?>">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 是否活动</label>

                            <div class="col-sm-1" style="padding-top: 7px">
                                <input type="checkbox" id="ifactivity" name="ifactivity" class="col-xs-10 col-sm-5" <?php echo isset($if_activity) && $if_activity ? 'checked' : ''?>>
                                <span class="help-inline col-xs-12 col-sm-7 text-danger">
												<span class="middle"></span>
											</span>
                            </div>
                        </div>

                        <div class="form-group switch-content <?php echo $ifHidden?>">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 内容概要</label>

                            <div class="col-sm-9">
                                <textarea id="description" name="description" placeholder="内容概要" class="col-xs-10 col-sm-5"><?php echo isset($art_desc)?$art_desc : ""?></textarea>
                                <span class="help-inline col-xs-12 col-sm-7 text-danger">
                                    <span class="middle"></span>
                                </span>
                            </div>
                        </div>

                        <div class="form-group switch-content <?php echo $ifHidden?>">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 页面内容</label>

                            <div class="col-sm-1" style="padding-top: 7px">
                                <textarea name="pagecontentArea" id="pagecontent" cols="30" rows="10"><?php echo isset($art_content) ? $art_content : ''?></textarea>
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
