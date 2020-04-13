<?php
/**
 * Created by PhpStorm.
 * User: 苏
 * Date: 2020/3/4
 * Time: 15:12
 */

namespace app\admin\model;


use think\Model;



class Article extends Model
{

    protected $table="article";

    protected $autoWriteTimestamp=true;

    public function getStatusAttr($value){
        if($value==0){
            return '已发布';
        }else{
            return '未发布';
        }
    }

    public function article(){
        return $this->belongsTo('Mcate','cate_id');
    }
    public function articles(){
        return $this->belongsTo('Music','music_id');
    }



}