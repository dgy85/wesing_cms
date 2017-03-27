<?php

$config['menu'] =  array(
    'Home'=>array('show'=>true,'text'=>'控制台','icon'=>'icon-dashboard','target'=>'sys-dashboard','children'=>array()),
    'Type'=>array('show'=>true,'text'=>'系统','icon'=>'icon-cogs','target'=>'sys-typeIndex','children'=>array(
        'Merchant'=>array('show'=>true,'text'=>'商户管理','icon'=>'icon-briefcase','target'=>'merchant','children'=>array()),
        'Auth'=>array('show'=>true,'text'=>'权限管理','icon'=>'icon-lock','target'=>'auth','children'=>array()),
        'Pays'=>array('show'=>true,'text'=>'支付方式','icon'=>'icon-building','target'=>'sys-typeIndex','children'=>array())
    )),
    'Search'=>array('show'=>true,'text'=>'订单','icon'=>'icon-search','target'=>'orders','children'=>array(
        'Orders'=>array('show'=>true,'text'=>'订单查询','icon'=>'icon-credit-card','target'=>'orders','children'=>array()),
        'Refund'=>array('show'=>true,'text'=>'退款管理','icon'=>'icon-money','target'=>'orders-refund','children'=>array()),
    )),
);