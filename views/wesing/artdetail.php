<?php tpl('wesing_header') ?>
<body>
<link rel="stylesheet" href="/assets/styles/css.css">

<div class="cont_xq">
    <div class="xq_t"><?php echo $art_title?></div>
    <p class="xq_time"><?php echo date("Y-m-d",strtotime($art_ctime))?></p>
    <p>&nbsp;</p>
    <div id="pagecontainer">
        <?php echo $art_content?>
    </div>

    <?php if($if_activity){
        printf('<a href="%s" class="join"><img src="/assets/images/wycj.png" width="100%%" /></a>',site_url('home/sign/'.$art_id));
    }?>
</div>

<style>
    #pagecontainer p{color:#a0a0a0; font-size:0.8em;text-indent:3em;}
</style>
<!--底部-->
<div class="bottom_cont"></div>
<div class="web_bottom">
    <p>无论身在何方，您都有机会与学院一起成长</p>
    Wherever you are,FDSM Alumni always have the chance to grow with the school
</div>
</body>
</html>
