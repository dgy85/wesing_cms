<?php tpl('wesing_header') ?>
<body>
<link rel="stylesheet" href="/assets/styles/css.css">
<div class="content">
    <div class="list">
        <ul>
            <?php
            if ($catelist && is_array($catelist))
                foreach ($catelist as $_cateItem):
                    ?>
                    <li>
                        <p class="title">
                            <img alt="<?php echo $_cateItem['cate_name'] ?>" src="<?php echo $_cateItem['cate_thub'] ?>" width="100%" class="dark_p"><span>+</span>
                        </p>
                        <ul class='list-se'>
                            <p class="title">
                                <img alt="<?php echo $_cateItem['cate_name'] ?>" src="<?php echo $_cateItem['cate_thub'] ?>" width="100%"><span>-</span>
                            </p>
                            <?php if ($_cateItem['singlepage'] && $_cateItem['page']): ?>
                                <li>
                                    <img src="/assets/images/arr2.png" class="t2"/>
                                    <p style="color:#a0a0a0;font-size:1em;text-indent:3em;"><?php echo str_ireplace("\r\n","<br/><p style=\"color:#a0a0a0;font-size:1em;text-indent:3em;\">",$_cateItem['page']['art_desc']) ?></p>
                                    <p style="text-align:right"><a
                                                href="<?php echo site_url('home/art/') . $_cateItem['page']['art_id'] ?>"
                                                style="color:#000;font-size:1em;">详情&gt;&gt;</a></p>
                                    <?php if ($_cateItem['page']['if_activity']): ?>
                                        <a href="#" class="join"><img src="/assets/images/wycj.png" width="100%"/></a>
                                    <?php endif; ?>
                                </li>
                            <?php elseif ($_cateItem['art']):?>
                                <li>
                                    <ul class="list3">
                                        <?php foreach ($_cateItem['art'] as $_artItem){
                                            printf('<li><a href="%s"><span>%s</span>%s</a></li>',site_url('home/art/'.$_artItem['art_id']),date('Y-m-d',strtotime($_artItem['art_ctime'])),$_artItem['art_title']);
                                        }?>
                                    </ul>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endforeach; ?>
        </ul>
    </div>

</div>
<script src="/assets/lib/js/jquery.min.js"></script>
<script src="/assets/apps/style.js"></script>
<script>
    jQuery(document).ready(function($)
    {
        $('.list ul li p').clickdown();
        $('.list-se p[class=title]').clickup();
        $('.list>ul>li').ad();
    });
</script>
</body>
</html>