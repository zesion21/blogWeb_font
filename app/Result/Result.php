<?php


namespace app\Result;



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

    public static function success($data,$msg="success"):\think\response\Json
    {
        return json(new Result(200,$data,$msg));
    }

}