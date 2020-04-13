<?php
/**
 * Created by PhpStorm.
 * User: 苏
 * Date: 2020/3/26
 * Time: 16:08
 */

namespace app\api\model;


use think\Model;  //电影详情

class Article extends Model
{
    protected $table="article";
    protected $autoWriteTimestamp=true;

    public function getImgAttr($value){
        $path="http://localhost:82";
        return $path.$value;
    }

    public function getIconAttr($value){
        $path="http://localhost:82";
        return $path.$value;

    }

    public function getPicAttr($value){
        $path="http://localhost:82";
        return $path.$value;

    }

//    模型关联
    public function music(){
        return $this->belongsTo('Music','music_id','id');
    }

}