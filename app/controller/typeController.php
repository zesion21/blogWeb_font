<?php


namespace app\controller;


use app\BaseController;
use app\model\Type;
use app\Result\Result;
use think\facade\Db;
use think\db\exception\DataNotFoundException;
use think\db\exception\DbException;
use think\db\exception\ModelNotFoundException;
use think\Exception;
use think\Model;
use think\response\Json;

class typeController extends BaseController
{


    /**
     * @throws Exception
     */
    public function getAllType(): Json
    {

        $typeList = [];

        try {
            $typeList=(new Type)->where("cate_ParentID", 0)->select();
            $typeList->each(function ($item) {
                $item['child'] = (new Type())->where("cate_ParentID", $item["cate_ID"])->select();
                $item['child']->each(function ($i) {
                    $i['child'] = (new Type())->where("cate_ParentID", $i["cate_ID"])->select();
                });
            });
        } catch (DbException $e) {
            throw new Exception("未知错误",10005);
        }
        return Result::success($typeList);
    }


}