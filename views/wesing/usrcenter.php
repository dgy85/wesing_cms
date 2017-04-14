<?php tpl('wesing_header') ?>
<body>
<link rel="stylesheet" href="/assets/styles/css.css">
<div class="user_info">
    <img src="/assets/images/user_temp.png" alt="" width="25%" />
    <p>USER_NAME</p>
    id_No.1234567
</div>
<!--列表部分-->
<div class="t1">我的报名</div>
<div class="list2">
    <ul>
        <?php
        if($signlist)
            foreach ($signlist as $_sign):
        ?>
        <li>
            <p>活动名称&nbsp;&nbsp;<?php echo $_sign['art_title']?></p>
            <p>报名日期&nbsp;&nbsp;<?php echo date('Y-m-d',strtotime($_sign['sign_time']))?></p>
            <a href="<?php echo site_url('home/art/'.$_sign['art_id'])?>">点击活动详情</a>&gt;&gt;
        </li>
        <?php endforeach;?>
    </ul>
</div>


<!--底部-->
<div class="bottom_cont"></div>
<div class="web_bottom">
    <p>无论身在何方，您都有机会与学院一起成长</p>
    Wherever you are,FDSM Alumni always have the chance to grow with the school
</div>



</body>
</html>
