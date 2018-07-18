<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/4
 * Time: 21:54
 */

namespace app\admin\model;
use think\Model;

class Article extends Model
{
    //多篇文章属于一个栏目
    public function cate()
    {
        return $this->belongsTo('cate','cateid');
    }
}