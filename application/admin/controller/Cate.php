<?php
/**
 * Admin控制器
 */

namespace app\admin\controller;

use think\Controller;
use think\Db;
use think\Loader;
use app\admin\model\Cate as CateModel;

class Cate extends Controller
{
    //列表页面
    public function lst(){
        //模型引用
        $list = CateModel::paginate(3);
        $this->assign('list',$list);
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
            $validate = Loader::validate('Cate');
            if(!$validate->scene('add')->check($data)){
                $this->error($validate->getError());
            }


            $res = Db::name('cate')->insert($data);
            if($res){
                return $this->success('添加管理员成功！','lst');
            }else{
                return $this->error('添加管理员失败');
            }
            return;
        }
        return $this->fetch();
    }

    //编辑管理员信息
    public function edit(){
        //获取id
        $id = input('id');
        $results = db('cate')->find($id);
        if(request()->isPost()){
            $data = [
                'id' => input('post.id'),
                'username' => input('post.username'),
            ];

            //有无传值密码的处理
            if(input('post.password')){
                $data['password'] = md5(input('post.password'));
            }else{
                $data['password'] = $results['password'];
            }

            //验证数据
            $validate = Loader::validate('Cate');
            if(!$validate->scene('edit')->check($data)){
                $this->error($validate->getError());
            }

            $res = db('cate')->update($data);
            if($res){
                $this->success('修改管理员成功','lst');
            }else{
                $this->error('修改管理员失败');
            }
            //加return下面不再运行显示
            return;
        }



        //dump($res);
        $this->assign('res',$results);
        return $this->fetch();
    }


    //删除管理员模块
    public function del(){
        $id = input('id');
        if($id != 1){
            $res = db('cate')->delete($id);
            if($res){
                $this->success('删除管理员成功','lst');
            }else{
                $this->error('删除管理员失败');
            }
        }else{
            $this->error('初始化管理员不能删除');
        }
    }


}