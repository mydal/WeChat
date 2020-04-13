<?php
/**
 * Created by PhpStorm.
 * User: 苏
 * Date: 2020/3/4
 * Time: 15:13
 */
namespace app\common\validate;


use think\Validate;

class Article extends Validate
{
    protected $rule=[
        'title'=>'require|max:20',
        'desc'=>'require|max:255',
        'content'=>'require',
        'cate_id'=>'require',
        'status' =>'require'
    ];

    protected $message=[
        'title.require'=>'电影名称不能为空',
        'title.max'=>'电影名称最多不能超过20个字符',
        'desc.require'=>'电影简介不能为空',
        'desc.max'=>'电影简介最多不能超过255个字符',
        'content.require'=>'电影内容不能为空',
        'cate_id.require'   =>'电影类别不能为空',
        'status.require' =>'状态必须'

    ];

    protected $scene=[
        'add'=>'title',
        'edit'=>'title'
    ];

}