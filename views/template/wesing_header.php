<!doctype html>
<html lang="zh_CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge;chrome=1">
    <script src="/assets/lib/js/swiper.jquery.min.js"></script>
    <script src="/assets/seajs.js"></script>
    <script src="/assets/seajsConfig.js"></script>
    <title></title>
    <script>
        var PAGE_VAR = {SITE_URL:'<?php echo site_url()?>'};
//        touch.on('body','swiperight ',function (e) {
//            console.log("向右滑动",e);
//        })
        touch.on('body', 'swipeleft swiperight', function(ev){
            console.log("you have done", ev.type);
        });
    </script>
</head>