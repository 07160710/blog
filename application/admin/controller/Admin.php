<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/1
 * Time: 20:42
 */

namespace app\admin\controller;

use think\Controller;
use think\Db;
use think\Loader;

class Admin extends Controller
{
    //列表页面
    public function lst(){
        return $this->fetch();
    }
    //添加页面
    public function add(){
        if(request()->isPost()){
            $data = [
                'username' => input('post.username'),
                'password' => md5(input('post.password')),
            ];

            //验证数据
            $validate = Loader::validate('Admin');
            if(!$validate->scene('add')->check($data)){
                $this->error($validate->getError());
            }


            $res = Db::name('admin')->insert($data);
            if($res){
                return $this->success('添加管理员成功！','lst');
            }else{
                return $this->error('添加管理员失败');
            }
            return;
        }
        return $this->fetch();
    }


}