<?php

namespace app\index\controller;

use think\Controller;

class Cate extends Base
{
    //cate主页显示
    public function index()
    {
        return $this->fetch('cate');
    }
}