<?php


namespace app\Result;


class Result
{

    var $code;
    var $msg;
    var $data;

    public function __construct($code,$msg,$data)
    {
        $this->code=$code;
        $this->msg=$msg;
        $this->data=$data;
    }

   public static function success($data){
        return new Result(200,"success",$data);
    }

    public static function error($code,$msg){
        return new Result($code,$msg,null);
    }


}