<?php
/**
 * Created by PhpStorm.
 * User: 苏
 * Date: 2020/3/27
 * Time: 10:48
 */

namespace app\api\model;


use think\Model;//电影首页轮播图

class Rotation extends Model
{
    protected $table="rotation";
    protected $autoWriteTimestamp=true;

    public function getPicAttr($value){
        $path="http://localhost:82";
        return $path.$value;
    }

}