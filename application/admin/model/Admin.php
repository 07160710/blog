<?php
namespace app\admin\model;
use think\Db;
use think\Model;
/**
 * Admin模型层
 */

class Admin extends Model
{
    public function isLogin($data)
    {
        $user = Db::name('admin')->where('username','=',$data['username'])->find();
        if($user){
            if($user['password'] == md5($data['password'])){
                return 3;
            }else{
                return 2;
            }
        }else{
            return 1;
        }
    }
}