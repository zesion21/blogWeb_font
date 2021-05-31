<?php /** @noinspection PhpUnhandledExceptionInspection */

namespace app\controller;

use app\BaseController;
use app\model\UserModel;
use app\Result\Result;
use think\App;

class userController extends BaseController
{
    public $uM;
    public function __construct(App $app)
    {
        $this->uM = new UserModel;
        parent::__construct($app);
    }

    public function getAll(): \think\response\Json
    {

        $user = $this->uM->where("user_id", 1)->select();
//        $this->uM->save([
//            "user_name"=>"玛卡巴卡",
//            "age"=>15,
//            "createTime"=>date("Y-m-d H:i:s")
//        ]);
        return Result::success( $user);
    }

}
