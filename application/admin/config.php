<?php
//配置文件
return [
    'view_replace_str' => [
        '__PUBLIC__' => SITE_URL.'/public/static/admin',
        '__IMG__' => SITE_URL.'/public/static',
    ],
    // +----------------------------------------------------------------------
    // | 模板设置
    // +----------------------------------------------------------------------
    'template' => [
        // 模板后缀
        'view_suffix'  => 'htm',
    ],

];