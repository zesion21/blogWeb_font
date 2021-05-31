<?php /** @noinspection ALL */

namespace app\model;

use think\facade\Db;
use think\Model;

class UserModel extends Model
{

    protected $table = "user";
    protected $disuse = ['createTime'];

    public static function getImage()
    {
        return Db::query("select * from user");
    }
}
