<?php
namespace app\admin\model;
use think\captcha\Captcha;
use think\Db;
use think\Model;
/**
 * Admin模型层
 */

class Admin extends Model
{
    public function isLogin($data)
    {
        $captcha = new Captcha();
        if(!$captcha->check($data['code'])){
            return 4;
        }
        $user = Db::name('admin')->where('username','=',$data['username'])->find();
        if($user){
            if($user['password'] == md5($data['password'])){
                \session('id',$user['id']);
                session('user',$user['username']);
                return 3;
            }else{
                return 2;
            }
        }else{
            return 1;
        }
    }
}