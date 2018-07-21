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
use app\admin\model\Article as ArticleModel;

class Article extends Controller
{
    //列表页面
    public function lst(){
        //模型引用
        //$list = ArticleModel::paginate(3);
        //链接查询
        //$list = db('article')->alias('a')->join('cate c','c.id=a.cateid')->field('a.id,a.title,a.pic,a.author,a.state,c.catename')->paginate(3);
        //var_dump($list);
        //关联查询
        $list = ArticleModel::paginate(3);
        $this->assign('list',$list);
        return $this->fetch();
    }
    //添加页面
    public function add(){
        if(request()->isPost()){
            $data = [
                'title' => input('post.title'),
                'author' => input('post.author'),
                'keywords' => input('post.keywords'),
                'desc' => input('post.desc'),
                'content' => input('post.content'),
                'time' => time(),
                'cateid' =>input('post.cateid'),
            ];

            if(input('post.state') == 'on'){
                $data['state'] = 1;
            }
            //判断是否有文件上传
            if($_FILES['pic']['tmp_name']){
                $file = request()->file('pic');
                $info = $file->move(ROOT_PATH.'public'.DS.'static/uploads');
                $data['pic'] = '/uploads/'.$info->getSaveName();
            }
            //验证数据
            $validate = Loader::validate('Article');
            if(!$validate->scene('add')->check($data)){
                $this->error($validate->getError());
            }


            $res = Db::name('article')->insert($data);
            if($res){
                return $this->success('添加文章成功！','lst');
            }else{
                return $this->error('添加文章失败');
            }
            return;
        }
        //显示栏目
        $caters = db('cate')->select();
        $this->assign('caters',$caters);
        return $this->fetch();
    }

    //编辑文章信息
    public function edit(){
        //获取id
        $id = input('id');
        $articles = db('article')->find($id);
        if(request()->isPost()){
            $data = [
                'id' => input('post.id'),
                'title' => input('post.title'),
                'author' => input('post.author'),
                'desc' => input('post.desc'),
                'keywords' => input('post.keywords'),
                'content' => input('post.content'),
                'cateid' => input('post.cateid'),
            ];
            if(input('post.state') == 'on'){
                $data['state'] = 1;
            }
            //判断是否有文件上传
            if($_FILES['pic']['tmp_name']){
                $pics = SITE_URL.'/public/static'.$articles['pic'];
                @unlink($pics);
                $file = request()->file('pic');
                $info = $file->move(ROOT_PATH.'public'.DS.'static/uploads');
                $data['pic'] = '/uploads/'.$info->getSaveName();
            }

            //验证数据
            $validate = Loader::validate('Article');
            if(!$validate->scene('edit')->check($data)){
                $this->error($validate->getError());
            }

            $res = db('article')->update($data);
            if($res){
                $this->success('修改文章成功','lst');
            }else{
                $this->error('修改文章失败');
            }
            //加return下面不再运行显示
            return;
        }
        $caters = db('cate')->select();
        $this->assign('caters',$caters);
        //dump($res);
        $this->assign('article',$articles);
        return $this->fetch();
    }


    //删除文章模块
    public function del(){
        $id = input('id');
        $res = db('Article')->delete($id);
        if($res){
            $this->success('删除文章成功','lst');
        }else{
            $this->error('删除文章失败');
        }
    }
}