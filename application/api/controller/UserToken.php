<?php
/**
 * Created by PhpStorm.
 * User: 苏
 * Date: 2020/4/1
 * Time: 10:05
 */

namespace app\api\controller;


use think\Controller;
use app\api\model\User;

class UserToken extends Controller
{
    public function token(){
        $code=input("post.code");//接收微信小程序发送过来的code
        //初始化curl
        $ch=curl_init();
        //设置选项
        $appid="wxad72f080afae7980";
        $secret="ebf7abfded334145e4de09d7ec2c3969";
        //登录凭证校验
        $url="https://api.weixin.qq.com/sns/jscode2session?appid=$appid&secret=$secret&js_code=$code&grant_type=authorization_code";

        /**
         * curl_init() 和 curl_close() 分别是初始化CURL连接和关闭CURL连接，
         * curl_exec() 执行CURL请求，如果没有错误发生，该函数的返回是对应URL返回的数据,json字符串的格式；如果发生错误，该函数返回 FALSE。需要注意的是，判断输出是否为FALSE用的是全等号，这是为了区分返回空串和出错的情况。
         * CURL函数库里最重要的函数是curl_setopt(),它可以通过设定CURL函数库定义的选项来定制HTTP请求。上述代码片段中使用了三个重要的选项：
         * CURLOPT_URL 指定请求的URL；
         * CURLOPT_RETURNTRANSFER 设置为1表示稍后执行的curl_exec函数的返回是URL的返回字符串，而不是把返回字符串定向到标准输出并返回TRUE；
         * CURLLOPT_HEADER设置为0表示不返回HTTP头部信息。
         */
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_HEADER,0);
        //设置为不是https也可以访问
        /**
         * CURLOPT_SSL_VERIFYHOST
         * 设置为 1 是检查服务器SSL证书中是否存在一个公用名(common name)。译者注：公用名(Common Name)
         * 一般来讲就是填写你将要申请SSL证书的域名 (domain)或子域名(sub domain)。
         * 设置成 2，会检查公用名是否存在，并且是否与提供的主机名匹配。
         * 0 为不检查名称。 在生产环境中，这个值应该是 2（默认值）。
         * 值 1 的支持在 cURL 7.28.1 中被删除了。
         */
//        curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,0);
//        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);

        //执行curl获取HTML文档内容
        $output=curl_exec($ch);
        if($output===false){
            echo "CURL Error:".curl_error($ch);
        }
        //释放curl句柄
        curl_close($ch);
//        return $output;

        //将json解码转换为数组
        $curl_result=json_decode($output,true); //assoc 值为TRUE时返回数组，FALSE时返回对象；

        //判断错误信息
        if(isset($curl_result["errcode"])){
            return json([
                "status"=>0,
                "msg"=>" Invalid parameter" //无效的参数
            ],400);
        }

        $model=User::get(["openid"=>$curl_result["openid"]]);
        if($model){
            $userid=$model->id;
        }else{
            $data=array(
                "openid"=>$curl_result["openid"],
                "nickName"=>input("post.nickName"),
                "avatarUrl"=>input("post.avatarUrl")
            );
            $model=User::create($data);
            $userid=$model->id;
        }
        //生成令牌
        $token=$this->generalToken(32);
        User::where("id",$userid)->update(["token"=>$token]);
        return json([
            "token"=>$token
        ]);


    }

    //生成令牌
    public function generalToken($length){
        //令牌就是生成一系列的随机字符串
        $str="ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
        $result="";
        for($i=0;$i<$length;$i++){
            $result.=$str[rand(0,61)]; //rand() 函数返回随机整数。
        }
        //获取当前时间戳
        $time=$_SERVER["REQUEST_TIME"];
        return md5($result.$time);
    }

}