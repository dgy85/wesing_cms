<?php tpl("admin_header") ?>
<body>
<div class="page-content">
    <div class="page-header">
        <span class="bigger-150">
            分类信息列表 / <?php echo anchor('article/add','新增')?>
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
                                <th>Domain</th>
                                <th>Price</th>
                                <th class="hidden-480">Clicks</th>

                                <th>
                                    <i class="icon-time bigger-110 hidden-480"></i>
                                    Update
                                </th>
                                <th class="hidden-480">Status</th>

                                <th></th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr>
                                <td class="center">
                                    <label>
                                        <input type="checkbox" class="ace"/>
                                        <span class="lbl"></span>
                                    </label>
                                </td>
                                <td>
                                    <a href="#">ace.com</a>
                                </td>
                                <td>$45</td>
                                <td class="hidden-480">3,330</td>
                                <td>Feb 12</td>
                                <td class="hidden-480">
                                    <span class="label label-sm label-warning">Expiring</span>
                                </td>
                                <td>
                                    <?php echo actLink(45,array('test'=>'link','tar'=>'base'))?>
                                </td>
                            </tr>

                            <tr>
                                <td class="center">
                                    <label>
                                        <input type="checkbox" class="ace"/>
                                        <span class="lbl"></span>
                                    </label>
                                </td>

                                <td>
                                    <a href="#">base.com</a>
                                </td>
                                <td>$35</td>
                                <td class="hidden-480">2,595</td>
                                <td>Feb 18</td>

                                <td class="hidden-480">
                                    <span class="label label-sm label-success">Registered</span>
                                </td>

                                <td>
                                    <?php echo actLink(33)?>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="left" style="font-weight: normal;border-bottom: none">
                                    条数记录
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
