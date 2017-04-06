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
                            <img alt="<?php echo $_cateItem['cate_name'] ?>" src="<?php echo $_cateItem['cate_thub'] ?>" width="100%" class="dark_p">
                        </p>
                        <ul class='list-se'>
                            <p class="title">
                                <img alt="<?php echo $_cateItem['cate_name'] ?>" src="<?php echo $_cateItem['cate_thub'] ?>" width="100%">
                            </p>
                            <?php if ($_cateItem['singlepage'] && $_cateItem['page']): ?>
                                <li>
                                    <img src="/assets/images/arr2.png" class="t2"/>
                                    <p style="color:#a0a0a0;font-size:1em;text-indent:3em;"><?php echo $_cateItem['page']['art_desc'] ?></p>
                                    <p style="text-align:right"><a
                                                href="<?php echo site_url('home/art/') . $_cateItem['page']['art_id'] ?>"
                                                style="color:#000;font-size:1em;">详情&gt;&gt;</a></p>
                                    <?php if ($_cateItem['page']['if_activity']): ?>
                                        <a href="#" class="join"><img src="/assets/images/wycj.png" width="100%"/></a>
                                    <?php endif; ?>
                                </li>
                            <?php elseif ($_cateItem['art']): ?>
                                <li>
                                    <ul class="list3">
                                        <li><a href="xq_xyzfhd.html"><span>2017-01-01</span>活动名称00001</a></li>
                                        <li><a href="xq_xyzfhd.html"><span>2017-01-01</span>活动名称00002</a></li>
                                        <li><a href="xq_xyzfhd.html"><span>2017-01-01</span>活动名称00003</a></li>
                                        <li><a href="xq_xyzfhd.html"><span>2017-01-01</span>活动名称00004</a></li>
                                        <li><a href="xq_xyzfhd.html"><span>2017-01-01</span>活动名称00005</a></li>
                                    </ul>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endforeach; ?>
            <!--            <li>-->
            <!--                <p class="title"><img src="pic/list_xyhd/b2.jpg" width="100%" class="dark_p"></p>-->
            <!--                <ul class='list-se'>-->
            <!--                    <p class="title"><img src="pic/list_xyhd/b2.jpg" width="100%"></p>-->
            <!--                    <li>-->
            <!--                        <img src="img/arr2.png" class="t2" />-->
            <!--                        <p style="color:#a0a0a0;font-size:1em;text-indent:3em;">文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容</p>-->
            <!--                        <p style="text-align:right"><a href="#" style="color:#000;font-size:1em;">详情&gt;&gt;</a></p>-->
            <!--                        <a href="#" class="join"><img src="img/wycj.png" width="100%" /></a>-->
            <!--                    </li>-->
            <!--                </ul>-->
            <!--            </li>-->
            <!--            <li>-->
            <!--                <p class="title"><img src="pic/list_xyhd/b3.jpg" width="100%" class="dark_p"></p>-->
            <!--                <ul class='list-se'>-->
            <!--                    <p class="title"><img src="pic/list_xyhd/b3.jpg" width="100%"></p>-->
            <!--                    <li>-->
            <!--                        <img src="img/arr2.png" class="t2" />-->
            <!--                        <p style="color:#a0a0a0;font-size:1em;text-indent:3em;">文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容</p>-->
            <!--                        <p style="text-align:right"><a href="#" style="color:#000;font-size:1em;">详情&gt;&gt;</a></p>-->
            <!--                        <a href="#" class="join"><img src="img/wycj.png" width="100%" /></a>-->
            <!--                    </li>-->
            <!--                </ul>-->
            <!--            </li>-->
            <!--            <li>-->
            <!--                <p class="title"><img src="pic/list_xyhd/b4.jpg" width="100%" class="dark_p"></p>-->
            <!--                <ul class='list-se'>-->
            <!--                    <p class="title"><img src="pic/list_xyhd/b4.jpg" width="100%"></p>-->
            <!--                    <li>-->
            <!--                        <img src="img/arr2.png" class="t2" />-->
            <!--                        <p style="color:#a0a0a0;font-size:1em;text-indent:3em;">文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容</p>-->
            <!--                        <p style="text-align:right"><a href="#" style="color:#000;font-size:1em;">详情&gt;&gt;</a></p>-->
            <!--                        <a href="#" class="join"><img src="img/wycj.png" width="100%" /></a>-->
            <!--                    </li>-->
            <!--                </ul>-->
            <!--            </li>-->
            <!--            <li>-->
            <!--                <p class="title"><img src="pic/list_xyhd/b5.jpg" width="100%" class="dark_p"></p>-->
            <!--                <ul class='list-se'>-->
            <!--                    <p class="title"><img src="pic/list_xyhd/b5.jpg" width="100%"></p>-->
            <!--                    <li>-->
            <!--                        <img src="img/arr2.png" class="t2" />-->
            <!--                        <p style="color:#a0a0a0;font-size:1em;text-indent:3em;">文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容</p>-->
            <!--                        <p style="text-align:right"><a href="#" style="color:#000;font-size:1em;">详情&gt;&gt;</a></p>-->
            <!--                        <a href="#" class="join"><img src="img/wycj.png" width="100%" /></a>-->
            <!--                    </li>-->
            <!--                </ul>-->
            <!--            </li>-->
            <!--            <li>-->
            <!--                <p class="title"><img src="pic/list_xyhd/b6.jpg" width="100%" class="dark_p"></p>-->
            <!--                <ul class='list-se'>-->
            <!--                    <p class="title"><img src="pic/list_xyhd/b6.jpg" width="100%"></p>-->
            <!--                    <li>-->
            <!--                        <ul class="list3">-->
            <!--                            <li><a href="xq_xyzfhd.html"><span>2017-01-01</span>活动名称00001</a></li>-->
            <!--                            <li><a href="xq_xyzfhd.html"><span>2017-01-01</span>活动名称00002</a></li>-->
            <!--                            <li><a href="xq_xyzfhd.html"><span>2017-01-01</span>活动名称00003</a></li>-->
            <!--                            <li><a href="xq_xyzfhd.html"><span>2017-01-01</span>活动名称00004</a></li>-->
            <!--                            <li><a href="xq_xyzfhd.html"><span>2017-01-01</span>活动名称00005</a></li>-->
            <!--                        </ul>-->
            <!--                    </li>-->
            <!--                </ul>-->
            <!--            </li>-->

        </ul>
    </div>

</div>
<script src="/assets/lib/js/jquery.min.js"></script>
<script src="/assets/apps/style.js"></script>
</body>
</html>