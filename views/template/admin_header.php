<!DOCTYPE html>
<html lang="zh_CN">
<head>
    <meta charset="utf-8" />
    <title>后台管理系统</title>
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <base target="_self">
    <link href="/assets/lib/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/assets/lib/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/assets/lib/css/ace.min.css" />
    <link rel="stylesheet" href="/assets/styles/local.css" />
    <link rel="stylesheet" href="/assets/lib/js/layer/skin/default/layer.css" />
    <script src="/assets/seajs.js"></script>
    <script src="/assets/seajsConfig.js"></script>
    <script>
        var PAGE_VAR = {
            SITE_URL:'<?php echo site_url('/')?>',
            BASE_URL:'<?php echo base_url('/')?>',
        }
        String.prototype.trimSpace = function(){
            return this.replace(/\s/g,'');
        };
    </script>
    <style>
        html,body{overflow-y: auto}
    </style>
</head>