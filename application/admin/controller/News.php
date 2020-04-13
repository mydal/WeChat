<?php
/**
 * Created by PhpStorm.
 * User: 苏
 * Date: 2020/3/9
 * Time: 18:12
 */

namespace app\admin\controller;

use app\admin\model\News as NewsModel;
use think\Controller;
use app\admin\model\Common;
use app\admin\model\Mcate;

use think\Validate;

class News extends Controller
{
    public function lists(){
        $model=NewsModel::paginate(4);
        return view('lists',['model'=>$model]);
    }

    public function add(){
        $m=Mcate::all();
        if(request()->isPost()){
            $data=input('post.');

//           图片上传
            $models=new Common();
            $file = request()->file('pics');
            $files=$models->file($file);
            $data['pics']=$files;

            $file = request()->file('icon1');
            $files=$models->file($file);
            $data['icon1']=$files;

            $file = request()->file('icon2');
            $files=$models->file($file);
            $data['icon2']=$files;

            $validate=Validate('news');
            if(!$validate->check($data)){
                $this->error($validate->getError());
            }
            $model=new NewsModel();
            $res=$model->save($data);
            if($res){
                $this->success('添加成功','lists');
            }else{
                $this->error('添加失败');
            }
        }
        return view('add',['m'=>$m]);

    }

    public function edit($id)
    {
        $m=Mcate::all();
        $model = NewsModel::get($id);
        if (request()->isPost()) {
            $data = input('post.');
            //           图片上传
            $models=new Common();
            $file = request()->file('pics');
            $files=$models->file($file);
            $data['pics']=$files;

            $file = request()->file('icon1');
            $files=$models->file($file);
            $data['icon1']=$files;

            $file = request()->file('icon2');
            $files=$models->file($file);
            $data['icon2']=$files;

            $validate = Validate('news');
            if (!$validate->check($data)) {
                $this->error($validate->getError());
            }

            $res = $model->save($data, ['id' => $id]);
            if ($res) {
                $this->success('更新成功', 'lists');
            } else {
//                halt($res);
                $this->error('更新失败');
            }
        }
        return view('edit', ['model' => $model,'m'=>$m]);

    }

    public function del($id)
    {
        $model = new NewsModel();
        $res = $model::get($id)->delete();
        if ($res) {
            $this->success('删除成功', 'lists');
        } else {
            $this->error('删除失败');
        }


    }

    public function delAll()
    {
        $data = $this->request->param();
        $allid = $data['id'];
        $res=NewsModel::destroy($allid);
        $num=count($allid);
        if($res){
            return ['status'=>1,'message'=>'删除成功','num'=>$num];
        }else{
            return ['status'=>0,'message'=>'删除失败'];
        }
    }

}