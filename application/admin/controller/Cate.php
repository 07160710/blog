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
                'catename' => input('post.catename'),
            ];

            //验证数据
            $validate = Loader::validate('Cate');
            if(!$validate->scene('all')->check($data)){
                $this->error($validate->getError());
            }

            $res = Db::name('cate')->insert($data);
            if($res){
                return $this->success('添加栏目成功！','lst');
            }else{
                return $this->error('添加栏目失败');
            }
            return;
        }
        return $this->fetch();
    }

    //编辑栏目信息
    public function edit(){
        //获取id
        $id = input('id');
        $results = db('cate')->find($id);
        if(request()->isPost()){
            $data = [
                'id' => input('post.id'),
                'catename' => input('post.catename'),
            ];

            //验证数据
            $validate = \think\Loader::validate('Cate');
            if(!$validate->scene('edit')->check($data)){
                dump($data);
                $this->error($validate->getError());
            }

            $res = db('cate')->update($data);
            if($res !== false){
                $this->success('修改栏目成功','lst');
            }else{
                $this->error('修改栏目失败');
            }
            //加return下面不再运行显示
            return;
        }

        //dump($res);
        $this->assign('res',$results);
        return $this->fetch();
    }


    //删除栏目模块
    public function del(){
        $id = input('id');
        $res = db('cate')->delete($id);
        if($res){
            $this->success('删除栏目成功','lst');
        }else{
            $this->error('删除栏目失败');
        }
    }
}