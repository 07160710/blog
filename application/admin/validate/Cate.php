<?php
namespace app\admin\validate;
use think\Validate;
/**
 * Cate独立验证器
 */

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
        'catename.unique:cate' => '栏目名称不能重复',
    ];

    //验证场景
    protected $scene = [
        'all' => ['catename'=>'require|unique:cate'],
        'edit' => ['catename'=>'require|unique:cate'],
    ];
}