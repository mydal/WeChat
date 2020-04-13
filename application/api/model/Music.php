<?php
/**
 * Created by PhpStorm.
 * User: 苏
 * Date: 2020/3/27
 * Time: 11:53
 */

namespace app\api\model;


use think\Model; //电影音乐

class Music extends Model
{
    protected $table="music";
    protected $autoWriteTimestamp=true;

    public function getCoverImgUrlAttr($value){
        $path="http://localhost:82";
        return $path.$value;
    }

}