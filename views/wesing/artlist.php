<?php tpl('wesing_header') ?>
<body>
<link rel="stylesheet" href="/assets/styles/css.css">
<?php
    $cateInfo = current($catelist);
    if($cateInfo && $cateInfo['cate_metaimage']){
        printf('<img src="%s" alt="" width="100%%" class="list_top"/>',$cateInfo['cate_metaimage']);
    }
?>
<!--列表部分-->
<div class="list4">
    <ul id="contentContainer">
<!--        <li><a href="xq_xyxw.html"><span>2017-01-01</span>最有意义的投资，在复旦管院</a></li>-->
<!--        <li><a href="xq_xyxw.html"><span>2017-01-01</span>“准”校友导师聊想法：夏春校友采访</a></li>-->
<!--        <li><a href="xq_xyxw.html"><span>2017-01-01</span>“资深”校友导师说经验：夏一梅校友采访</a></li>-->
<!--        <li><a href="xq_xyxw.html"><span>2017-01-01</span>最有意义的投资，在复旦管院</a></li>-->
<!--        <li><a href="xq_xyxw.html"><span>2017-01-01</span>“准”校友导师聊想法：夏春校友采访</a></li>-->
        <?php
            if($cateInfo && isset($cateInfo['art']) && is_array($cateInfo['art'])) foreach ($cateInfo['art'] as $_artItem){
                printf('<li><a href="%s"><span>%s</span>%s</a></li>',
                    site_url('home/art/'.$_artItem['art_id']),
                    date('Y-m-d',strtotime($_artItem['art_ctime'])),
                    $_artItem['art_title']);
            }
            else{
                printf('<li><a href="#" onclick="javascript:history.go(-1)">当前无内容，返回上一页</a></li>');
            }
        ?>
    </ul>
</div>
<?php
    if($cateInfo['totalPage']>$page){
        printf('<a href="javascript:void(0)" class="more"><img src="/assets/images/more.png" alt="" width="100%%"/></a>');
    }
?>

<!--底部-->
<div class="bottom_cont"></div>
<div class="web_bottom">
    <p>无论身在何方，您都有机会与学院一起成长</p>
    Wherever you are,FDSM Alumni always have the chance to grow with the school
</div>
<script src="/assets/lib/js/jquery.min.js"></script>
<script src="/assets/apps/style.js"></script>
<script>
    $(function(){
        var page = <?php echo $page?>;
        $('.more').on('click',function(){
            $.getJSON(
                PAGE_VAR.SITE_URL+'home/cate/<?php echo $cateid?>/'+(++page),
                function (response) {
                    if(response.responsePage<=page){
                        $('.more').hide();
                    }
                    $(response.responseBody).appendTo($('#contentContainer'));
                }
            )
        });
    })
</script>
</body>
</html>