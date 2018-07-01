<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/1
 * Time: 20:42
 */

namespace app\admin\controller;


use think\Controller;

class Admin extends Controller
{
    //列表页面
    public function lst(){
        return $this->fetch();
    }
    //添加页面
    public function add(){
        return $this->fetch();
    }


}