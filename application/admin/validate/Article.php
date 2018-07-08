<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/4
 * Time: 21:55
 */

namespace app\admin\validate;


use think\Validate;

class Article extends Validate
{
    //验证规则
//    protected $rule = [
//        'title' => 'require|max:25',
//        'url' => 'require',
//    ];
//
//    //验证错误提示
//    protected $message = [
//        'title.require' => '链接名称必须填写',
//        'title.max' => '链接名称长度不得大于25',
//        'url.require' => '链接地址必须填写',
//    ];
//
//    //验证场景
//    protected $scene = [
//        'add' => ['title','url'],
//        'edit' => ['title','url'],
//    ];
}