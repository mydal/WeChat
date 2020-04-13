<?php
/**
 * Created by PhpStorm.
 * User: 苏
 * Date: 2020/4/1
 * Time: 10:20
 */

namespace app\api\model;


use think\Model;

class User extends Model
{
    protected $table="user";
    protected $autoWriteTimestamp=true;

//    指定隐藏的字段
    protected $hidden=['id','openid','create_time','update_time','token'];

}