<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/4
 * Time: 21:53
 */

namespace app\admin\controller;

use think\Controller;
use think\Db;
use think\Loader;
use app\admin\model\Links as LinksModel;

class Links extends Controller
{
    //列表页面
    public function lst(){
        //模型引用
        $list = LinksModel::paginate(3);
        $this->assign('list',$list);
        return $this->fetch();
    }
    //添加页面
    public function add(){
        if(request()->isPost()){
            $data = [
                'title' => input('post.title'),
                'url' => input('post.url'),
                'description' => input('post.description'),
            ];

            //验证数据
            $validate = Loader::validate('Links');
            if(!$validate->scene('add')->check($data)){
                $this->error($validate->getError());
            }


            $res = Db::name('links')->insert($data);
            if($res){
                return $this->success('添加链接成功！','lst');
            }else{
                return $this->error('添加链接失败');
            }
            return;
        }
        return $this->fetch();
    }

    //编辑链接信息
    public function edit(){
        //获取id
        $id = input('id');
        $links = db('links')->find($id);
        if(request()->isPost()){
            $data = [
                'id' => input('post.id'),
                'title' => input('post.title'),
                'url' => input('post.url'),
                'description' => input('post.description'),
            ];

            //验证数据
            $validate = Loader::validate('Links');
            if(!$validate->scene('edit')->check($data)){
                $this->error($validate->getError());
            }

            $res = db('Links')->update($data);
            if($res){
                $this->success('修改链接成功','lst');
            }else{
                $this->error('修改链接失败');
            }
            //加return下面不再运行显示
            return;
        }

        //dump($res);
        $this->assign('links',$links);
        return $this->fetch();
    }


    //删除链接模块
    public function del(){
        $id = input('id');
        $res = db('Links')->delete($id);
        if($res){
            $this->success('删除链接成功','lst');
        }else{
            $this->error('删除链接失败');
        }
    }
}