<?php
/**
 * Created by PhpStorm.
 * User: 苏
 * Date: 2020/3/9
 * Time: 18:45
 */

namespace app\admin\model;

use think\Model;

class News extends Model
{
    protected $table="list";
    protected $autoWriteTimestamp=true;

    public function  getStatusAttr($value){
        if($value==0){
            return '已发布';
        }else{
            return '未发布';
        }
    }

    public function news(){
        return $this->belongsTo('Mcate','list_id');
    }



}