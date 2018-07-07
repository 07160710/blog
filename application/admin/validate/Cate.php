<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/7
 * Time: 16:31
 */

namespace app\admin\validate;


use think\Validate;

class Cate extends Validate
{
    //验证规则
    protected $rule = [
        'catename' => 'require|max:6|unique:cate',
    ];

    //验证错误提示
    protected $message = [
        'catename.require' => '栏目名称必须填写',
        'catename.max' => '栏目长度不得大于6',
        'catename.unique' => '栏目名称不能重复',
    ];

    //验证场景
    protected $scene = [
        'all' => ['catename'=>'require|max:6|unique:cate'],
        'edit' => ['catename'=>'require|unique:cate']
    ];
}