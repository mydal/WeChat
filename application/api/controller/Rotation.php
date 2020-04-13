<?php
/**
 * Created by PhpStorm.
 * User: 苏
 * Date: 2020/3/27
 * Time: 10:47
 */

namespace app\api\controller; //电影首页轮播图


use think\Controller;
use app\api\model\Rotation as RotationModel;

class Rotation extends Controller
{
    public function getRotation()
    {
        $data = RotationModel::all();
        if ($data) {
            return show(1, "success", $data, 200);
        } else {
            return show(0, "error", [], 400);

        }

    }

    public function addRotation()
    {
        $data = input("post.");
        $model = RotationModel::create($data);
        if ($model) {
            return show(1, "success", $model, 201);

        } else {
            return show(0, "error", [], 400);

        }
    }

    public function updateRotation($id)
    {
        $data = input("put.");
        if (RotationModel::where("id", $id)->update($data)) {
            return show(1, "success", $data, 201);
        } else {
            return show(0, "error", [], 400);
        }


    }

    public function deleteRotation($id)
    {
        $res = RotationModel::destroy($id);
        if ($res) {
            return show(1,"success",[],204);

        } else {
            return show(0,"error",[],400);


        }
    }

    public function getRotationById($id)
    {
        $data = RotationModel::get($id);
        if($data){
            return show(1,"success",$data,200);

        }else{
            return show(0,"error",[],400);
        }


    }

}