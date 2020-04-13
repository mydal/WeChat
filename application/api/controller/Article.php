<?php
/**
 * Created by PhpStorm.
 * User: 苏
 * Date: 2020/3/26
 * Time: 16:08
 */

namespace app\api\controller; //电影详情


use think\Controller;
use app\api\model\Article as ArticleModel;

class Article extends Controller
{
    public function getArticle()
    {
        $data = ArticleModel::all();
        if ($data) {
            return show(1,"success",$data,200);
        } else {
            return show(0,"error",[],400);

        }

    }

    public function addArticle()
    {
        $data = input("post.");
        $model = ArticleModel::create($data);
        if ($model) {
            return show(1,"success",$model,201);

        } else {
            return show(0,"error",[],400);

        }

    }

    public function updateArticle($id)
    {
        $data = input("put.");
        if (ArticleModel::where("id", $id)->update($data)) {
            return show(1,"success",$data,201);


        } else {
            return show(0,"error",[],400);


        }


    }

    public function deleteArticle($id)
    {
        $res = ArticleModel::destroy($id);
        if ($res) {
            return show(1,"success",[],204);

        } else {
            return show(0,"error",[],400);


        }
    }

    public function getArticleById($id)
    {
        $data = ArticleModel::get($id);
//        return $data->music;
        $data["music"]=$data->music;
        if($data){
            return show(1,"success",$data,200);

        }else{
            return show(0,"error",[],400);


        }

    }


}