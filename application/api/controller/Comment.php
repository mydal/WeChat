<?php
/**
 * Created by PhpStorm.
 * User: 苏
 * Date: 2020/4/1
 * Time: 15:09
 */

namespace app\api\controller;


use think\Controller;
use app\api\model\User;
use app\api\model\Comment as CommentModel;
class Comment extends Controller
{
    public function addComment(){
        $token=request()->header("token");
        //查询令牌是否存在
        $user=User::where(["token"=>$token])->find();
        if(!$user){
            return show(0,"令牌不存在",null,400);
        }
        //获取user表中的用户id 存放到comment中
        $data=input("post.");//获取发送的comment和文章id
        $data["userid"]=$user->id;
//        halt($data);
        $model=CommentModel::create($data);
        if($model){
            $data["token"]=$token;
            return show(1,"添加成功",null,201);
        }
    }

    public function getCommentByArticleId($articleId){
        $model=CommentModel::all(["articleid"=>$articleId]);
        foreach($model as $value){
            $value["user"]=$value->user;
        }
        if($model){
            return show(1,"success",$model,200);
        }else{
            return show(0,"error",null,404);
        }

    }

    public function delComment($id){
        $token=request()->header("token");
        //查询令牌是否存在
        $user=User::where(["token"=>$token])->find();
        if(!$user){
            return show(0,"令牌不存在",null,400);
        }
        $res=CommentModel::destroy($id);
//        halt($user->id);
        if($res->userid===$user->id){
            if($res){
                return show(1,"success",null,200);
            }else{
                return show(0,"error",null,400);
            }

        }


    }

}