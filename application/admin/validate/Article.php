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
    protected $rule = [
        'title' => 'require|max:10',
        'cateid' => 'require',
    ];

    //验证错误提示
    protected $message = [
        'title.require' => '文章标题必须填写',
        'title.max' => '文章标题长度不得大于25',
        'cateid.require' => '文章所属栏目必须选择',
    ];

    //验证场景
    protected $scene = [
        'add' => ['title','cateid'],
        'edit' => ['title'],
    ];
}