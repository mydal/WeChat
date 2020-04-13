<?php
/**
 * Created by PhpStorm.
 * User: 苏
 * Date: 2020/3/9
 * Time: 18:47
 */

namespace app\common\validate;


use think\Validate;

class News extends Validate
{
    protected $rule=[
        'title'=>'require|max:20',
        'pics' =>'require',

        'status'=>'require',
        'content'=>'require',

    ];

    protected $message=[
        'title.require'=>'电影名称必须',
        'title.max'    =>'电影名称长度最多不能超过20个字符',
        'pics.require' =>'电影图片必须',
        'status.require'=>'电影状态必须',
        'content.require'       =>'电影内容必须',
    ];

    protected $scene=[
        'add'=>'title',
        'edit'=>'title'
    ];

}