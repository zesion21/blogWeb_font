<?php


namespace app\controller;


use app\BaseController;
use app\model\Article;
use app\Result\Result;
use think\response\Json;

class articleController extends BaseController
{

 function   getListByType($type):Json{

    $list=  ( new Article())->where("log_CateID",$type)->select();

   return   Result::success($list);
}
}