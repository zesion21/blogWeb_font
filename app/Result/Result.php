<?php


namespace app\Result;



use think\response\Json;

class Result
{
    var $code;
    var $msg;
    var $data;

    public function __construct($code,$data,$msg)
    {
        $this->data=$data;
        $this->code=$code;
        $this->msg=$msg;
    }

    public static function success($data,$msg="success"):Json
    {
        return json(new Result(200,$data,$msg));
    }

    public  static  function  error($code,$msg="未知错误"):Json{

        return json(new Result($code,null,$msg));
    }

}