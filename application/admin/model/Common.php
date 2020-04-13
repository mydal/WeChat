<?php
/**
 * Created by PhpStorm.
 * User: 苏
 * Date: 2020/3/8
 * Time: 9:53
 */

namespace app\admin\model;


use think\Model;

class Common extends Model
{
    //图片上传
    public function file($file)
    {
        if ($file) {
//            $map=['ext'=>'jpg,png','size'=>2000000];
            $info = $file->move(ROOT_PATH . 'public' . DS . '/static/admin/uploads');
            if ($info) {
                $getSaveName=str_replace("\\","/",$info->getSaveName()); //转义
//                halt($getSaveName);
                $data['img']='/static/admin/uploads/' . $getSaveName;
                $data['pic'] = '/static/admin/uploads/' . $getSaveName;
                $data['icon'] = '/static/admin/uploads/' . $getSaveName;
                $data['icon1']='/static/admin/uploads/' . $getSaveName;
                $data['pics'] = '/static/admin/uploads/' . $getSaveName;
                $data['icon2'] = '/static/admin/uploads/' . $getSaveName;
                $pic = $data['pic'];
                $img=$data['img'];
                $icon=$data['icon'];
                $pics = $data['pics'];
//                halt($pics);
                $icon1=$data['icon1'];
                $icon2=$data['icon2'];
                return $icon;
            } else {
                return $file->getError();
            }
        }

    }



    }