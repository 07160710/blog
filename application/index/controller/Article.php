<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/1
 * Time: 14:41
 */

namespace app\index\controller;

class Article extends Base
{
    //article主页显示
    public function index(){
        return $this->fetch('article');
    }
}