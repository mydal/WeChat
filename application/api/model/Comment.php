<?php
/**
 * Created by PhpStorm.
 * User: 苏
 * Date: 2020/4/3
 * Time: 10:13
 */

namespace app\api\model;


use think\Model;

class Comment extends Model
{
    protected $table="comment";
    protected $autoWriteTimestamp=true;

    public function user(){
        return $this->belongsTo('User','userid','id');
    }

}