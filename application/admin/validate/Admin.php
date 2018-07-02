<?php
namespace app\admin\validate;
use think\Validate;
/**
 * Admin独立验证器
 */

class Admin extends Validate
{
    //验证规则
    protected $rule = [
        'username' => 'require|max:25',
        'password' => 'require',
    ];

    //验证错误提示
    protected $message = [
        'username.require' => '管理员名称必须填写',
        'username.max' => '管理员长度不得大于25',
        'password.require' => '管理员密码必须填写',
    ];

    //验证场景
    protected $scene = [
        'add' => ['username'=>'require','password'],
    ];
}