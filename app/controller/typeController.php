<?php


namespace app\controller;


use app\BaseController;
use app\model\Type;
use app\Result\Result;
use think\Model;
use think\response\Json;

class typeController extends BaseController
{

    public  function getAllType():Json{

        $typeList=  ( new Type)->where("cate_ParentID",0)->select();

        $typeList->each(function ($item){
              $item['child']= (new Type())->where("cate_ParentID",$item["cate_ID"])->select() ;
            $item['child']->each(function ($i){
                $i['child']= (new Type())->where("cate_ParentID",$i["cate_ID"])->select() ;
            });
        });

        return Result::success( $typeList);
    }
}