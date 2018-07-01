<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/1
 * Time: 14:40
 */

namespace app\index\controller;


use think\Controller;

class Cate extends Controller
{
    //cate主页显示
    public function index(){
        return $this->fetch('cate');
    }
}