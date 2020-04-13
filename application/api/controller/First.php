<?php
/**
 * Created by PhpStorm.
 * User: 苏
 * Date: 2020/3/27
 * Time: 11:27
 */

namespace app\api\controller; //电影首页


use think\Controller;
use app\api\model\First as FirstModel;

class First extends Controller
{
    public function getFirst()
    {
        $data = FirstModel::all();
        if ($data) {
            return show(1, "success", $data, 200);
        } else {
            return show(0, "error", [], 400);

        }

    }

    public function addFirst()
    {
        $data = input("post.");
        $model = FirstModel::create($data);
        if ($model) {
            return show(1, "success", $model, 201);

        } else {
            return show(0, "error", [], 400);

        }

    }

    public function updateFirst($id)
    {
        $data = input("put.");
        if (FirstModel::where("id", $id)->update($data)) {
            return show(1, "success", $data, 201);

        } else {
            return show(0, "error", [], 400);


        }


    }

    public function deleteFirst($id)
    {
        $res = FirstModel::destroy($id);
        if ($res) {
            return show(1,"success",[],204);

        } else {
            return show(0,"error",[],400);


        }
    }

    public function getFirstById($id)
    {
        $data = FirstModel::get($id);
        if($data){
            return show(1,"success",$data,200);

        }else{
            return show(0,"error",[],400);


        }

    }


}