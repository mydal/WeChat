<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\Route;
//电影首页轮播图
Route::get('rotations','api/rotation/getRotation'); //查询
Route::post('rotations','api/rotation/addRotation');//添加
Route::put('rotations/:id','api/rotation/updateRotation',[],['commentId'=>'\d+']);//更新
Route::delete('rotations/:id','api/rotation/deleteRotation',[],['commentId'=>'\d+']);//删除
Route::get('rotation/:id','api/rotation/getRotationById',[],['id'=>'\d+']);//查询单条

//电影首页
Route::get('firsts','api/First/getFirst'); //查询
Route::post('firsts','api/First/addFirst');//添加
Route::put('firsts/:id','api/First/updateFirst',[],['commentId'=>'\d+']);//更新
Route::delete('firsts/:id','api/First/deleteFirst',[],['commentId'=>'\d+']);//删除
Route::get('first/:id','api/First/getFirstById',[],['id'=>'\d+']);//查询单条

//电影详情
Route::get('articles','api/article/getArticle'); //查询
Route::post('articles','api/article/addArticle');//添加
Route::put('articles/:id','api/article/updateArticle',[],['commentId'=>'\d+']);//更新
Route::delete('articles/:id','api/article/deleteArticle',[],['commentId'=>'\d+']);//删除
Route::get('article/:id','api/article/getArticleById',[],['id'=>'\d+']);//查询单条

//登录
Route::post('token','api/user_token/token');

//发表电影评论
Route::post('comments','api/comment/addComment');

//根据电影内容查询所有的评论
Route::get('comments/:articleId','api/Comment/getCommentByArticleId',[],['articleid'=>'\d+']);

//删除电影评论
Route::delete('comments/:id','api/Comment/delComment',[],['id'=>'\d+']);
return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],

];
