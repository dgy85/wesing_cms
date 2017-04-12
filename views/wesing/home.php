<?php tpl('wesing_header')?>
<body>
<link rel="stylesheet" href="/assets/styles/style.css">
<?php if($sliderlist):?>
<div class="index_banner" id="banner_tabs">
    <ul>
        <?php foreach ($sliderlist as $_slider){
            printf('<li><a href="%s"><img src="%s" width="100%%"></a></li>',$_slider['s_target'],$_slider['s_thub']);
        }?>
    </ul>
    <cite>
        <?php
            foreach ($sliderlist as $_idx=>$_slider){
                printf('<span class="%s">%d</span>',$_idx==0 ? 'cur':'',$_idx+1);
            }
        ?>
    </cite>
    <div class="c"></div>
</div>
<?php endif;?>
<!--logo-->
<div class="logo">
    <img src="/assets/images/logo.png" width="27.5%" class="logo1" /> </div>
<!--导航-->
<div class="menu">

    <?php
        $map = array(1,1,2,2,3,3);
        if($catelist && is_array($catelist))
            foreach ($catelist as $_key=>$_cateItem){
                $direction = ($_key)%2 ? 'r' : 'l';
                $rouCounter = isset($map[$_key]) ? $map[$_key] : 0;
                $class = $direction.$rouCounter;
                if($rouCounter == 0) continue;
                echo '<a href="'.site_url('home/cate/'.$_cateItem['cate_id']).'" class="'.$class.'"><img alt="'.$_cateItem['cate_name'].'" src="'.($_cateItem['cate_thub']).'" width="100%" /></a>';
            }
    ?>

<!--    <a href="list_xyhd.html" class="l1"><img src="/assets/images/menu_1.png" width="100%" /></a>-->
<!--    <a href="list_xyxw.html" class="r1"><img src="/assets/images/menu_2.png" width="100%" /></a>-->
<!--    <a href="list_xyzz.html" class="l2"><img src="/assets/images/menu_3.png" width="100%" /></a>-->
<!--    <a href="list_xyjz.html" class="r2"><img src="/assets/images/menu_4.png" width="100%" /></a>-->
<!--    <a href="list_zsxx.html" class="l3"><img src="/assets/images/menu_5.png" width="100%" /></a>-->
<!--    <a href="list_xygs.html" class="r3"><img src="/assets/images/menu_6.png" width="100%" /></a>-->
    <div class="c"></div>
</div>

<!--我的足迹按钮-->
<div class="index_bottom">
    <a href="<?php echo site_url('home/usr_center')?>"><img src="/assets/images/wdzj.png" width="100%" /></a>
    <p>无论身在何方，您都有机会与学院一起成长</p>
    <p class="yw">Wherever you are,<br />FDSM Alumni always have the chance to grow with the school</p>
</div>


<script type="text/javascript">
    seajs.use('apps/wesing.index.js')
</script>
</body>
</html>