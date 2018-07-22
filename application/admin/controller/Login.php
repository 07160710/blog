<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/4
 * Time: 21:53
 */

namespace app\admin\controller;

use think\Controller;
use app\admin\model\Admin;

class Login extends Controller
{
    //列表页面
    public function login(){
        //模型引用
        if(request()->isPost()){
            $data = input('post.');
            $admin = new Admin();
            if($admin->isLogin($data) == 1){
                return $this->error('用户名或者密码错误');
            }elseif($admin->isLogin($data) == 2){
                return $this->error('用户名或者密码错误');
            }elseif($admin->isLogin($data) == 3){
                return $this->success('登录成功');
            }
        }
        return $this->fetch();
    }
}