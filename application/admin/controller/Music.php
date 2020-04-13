<?php
/**
 * Created by PhpStorm.
 * User: 苏
 * Date: 2020/4/8
 * Time: 18:57
 */

namespace app\admin\controller;


use think\Controller;
use app\admin\model\Common;
use app\admin\model\Music as MusicModel;

class Music extends Controller
{
    public function lists(){
        $model=MusicModel::paginate(4);
        return view('lists',['model'=>$model]);

    }

    public function add(){
        if(request()->isPost()){
            $data=input('post.');
            //            图片上传
            $models=new Common();
            $file = request()->file('coverImgUrl');
            $files=$models->file($file);
            $data['coverImgUrl']=$files;



            $model=new MusicModel();
            $res=$model->save($data);
            if($res){
                $this->success('添加成功','lists');
            }else{
                $this->error('添加失败');
            }

        }
        return $this->fetch();

    }

    public function edit($id){
        $model=MusicModel::get($id);
        if(request()->isPost()){
            $data=input('post.');
            //            图片上传
            $models=new Common();
            $file = request()->file('coverImgUrl');
            $files=$models->file($file);
            $data['coverImgUrl']=$files;

//            halt($data);

            $res=$model->save($data,['id'=>$id]);
            if($res){
                $this->success('更新成功','lists');
            }else{
                $this->error('更新失败');
            }


        }
        return view('edit',['model'=>$model]);

    }

    public function del($id){
        $res=MusicModel::get($id)->delete();
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
        $res=MusicModel::destroy($allid);
        $num = count($allid);
        if ($res) {
            return ['status' => 1, 'message' => '删除成功', 'num' => $num];
        } else {
            return ['status' => 0, 'message' => '删除失败'];
        }
    }


}