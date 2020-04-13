<?php
/**
 * Created by PhpStorm.
 * User: 苏
 * Date: 2020/4/8
 * Time: 17:38
 */

namespace app\admin\model;


use think\Model;

class Comment extends Model
{
    protected $table="comment";
    protected $autoWriteTimestamp=true;

    public function user(){
        return $this->belongsTo('User','userid','id');
    }

    public function article(){
        return $this->belongsTo('News','articleid','id');
    }
}