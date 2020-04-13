<?php
/**
 * Created by PhpStorm.
 * User: 苏
 * Date: 2020/4/8
 * Time: 18:23
 */

namespace app\admin\controller;


use think\Controller;
use app\admin\model\User as UserModel;

class User extends Controller
{
    public function lists(){
        $model=UserModel::paginate(4);
        return view('lists',['model'=>$model]);

    }
    public function del($id){
        $res=UserModel::get($id)->delete();
        if($res){
            $this->success('删除成功','lists');
        }else{
            $this->error('删除失败');
        }


    }

    public function delAll()
    {
        $data = $this->request->param();
        $allid = $data['id'];
        $res=UserModel::destroy($allid);
        $num = count($allid);
        if ($res) {
            return ['status' => 1, 'message' => '删除成功', 'num' => $num];
        } else {
            return ['status' => 0, 'message' => '删除失败'];
        }
    }

}