<?php


namespace app\controller;


use app\BaseController;
use app\model\Article;
use app\Result\Result;
use think\db\exception\DbException;
use think\facade\Validate;
use think\Model;
use think\response\Json;
use think\validate\ValidateRule;

class articleController extends BaseController
{

    function getListByType($type = -1): Json
    {
        $list = [];
        try {
            if ($type > 0)
                $list = (new Article())->where("log_CateID", $type)->hidden(['log_Content'])->select();
            else
                $list = (new Article())->where("log_CateID", "<>", 0)->hidden(['log_Content'])->select();
        } catch (DbException $e) {
        }


        return Result::success($list);
    }

    function getDetailById($id):Json{

         $v=  Validate::rule(["id"=>ValidateRule::isRequire()]);
        $article=[];
         if($v->check(["id"=>$id])){
             try {
                 $article=    Article::where("log_ID",$id)->find();
             }catch (DbException $e){

             }
         }

        return Result::success( $article );
    }


}