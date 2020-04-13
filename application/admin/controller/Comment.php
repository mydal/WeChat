<?php
/**
 * Created by PhpStorm.
 * User: 苏
 * Date: 2020/4/8
 * Time: 17:38
 */

namespace app\admin\controller;
use app\admin\model\News;
use app\admin\model\Comment as CommentModel;
use app\admin\model\User;
use think\Controller;

class Comment extends Controller
{
    public function lists()
    {
        $model = CommentModel::paginate(4);
        return view('lists', ['model' => $model]);
    }

    public function add()
    {
        $models= News::all();
        $model=User::all();
        if (request()->isPost()) {
            $data = input('post.');
//            halt($data['cate_id']);
            $model = new CommentModel();


            $res = $model->save($data);
            if ($res) {
                $this->success('添加成功', 'lists');
            } else {
                $this->error('添加失败');
            }
        }
        return view('add',['models'=>$models,'model'=>$model]);

    }

    public function edit($id)
    {
        $models= News::all();
        $m=User::all();
        $model = CommentModel::get($id);
        if (request()->isPost()) {
            $data = input('post.');
            $res = $model->save($data, ['id' => $id]);
            if ($res) {
                $this->success('更新成功', 'lists');
            } else {
//                halt($res);
                $this->error('更新失败');
            }
        }
        return view('edit', ['model' => $model,'models'=>$models,'m'=>$m]);

    }

    public function del($id)
    {
        $model = new CommentModel();
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
        $res=CommentModel::destroy($allid);
        $num = count($allid);
        if ($res) {
            return ['status' => 1, 'message' => '删除成功', 'num' => $num];
        } else {
            return ['status' => 0, 'message' => '删除失败'];
        }
    }

}