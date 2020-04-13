<?php
/**
 * Created by PhpStorm.
 * User: 苏
 * Date: 2020/3/27
 * Time: 11:26
 */

namespace app\api\model;


use think\Model; //电影首页

class First extends Model
{
    protected $table="list";
    protected $autoWriteTimestamp=true;

    public function getPicsAttr($value){
        $path="http://localhost:82";
        return $path.$value;
    }

    public function getIcon1Attr($value){
        $path="http://localhost:82";
        return $path.$value;
    }

    public function getIcon2Attr($value){
        $path="http://localhost:82";
        return $path.$value;
    }
}