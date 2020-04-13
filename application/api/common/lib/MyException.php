<?php
/**
 * Created by PhpStorm.
 * User: 苏
 * Date: 2020/3/31
 * Time: 9:57
 */

namespace app\api\common\lib;

use Exception;
use think\exception\Handle;

class MyException extends Handle
{
    public function render(Exception $e)
    {
        return json([
            'error'=>1,
            'msg'=>$e->getMessage()
        ],500);
    }

}