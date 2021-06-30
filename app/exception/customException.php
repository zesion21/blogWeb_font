<?php


namespace app\exception;


use app\Result\Result;
use think\db\exception\DbException;
use think\exception\Handle;
use think\exception\HttpException;
use think\exception\ValidateException;
use think\Response;
use Throwable;

class customException extends Handle
{

    public function render($request, Throwable $e): Response
    {
        // 参数验证错误
        if ($e instanceof ValidateException) {
            return Result::error(10003,$e->getMessage());
        }

        // 请求异常
        if ($e instanceof customException && $request->isAjax()) {
            return Result::error(10002,$e->getMessage());
        }

        //数据库异常
        if($e instanceof DbException){
            return  Result::error(10001,"服务器错误");
        }
        //其他错误返回服务器错误
//        if($e ){
//            return  Result::error(10004,"未知错误");
//        }

        // 其他错误交给系统处理
        return parent::render($request, $e);
    }

}