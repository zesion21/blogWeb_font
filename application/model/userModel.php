<?php


namespace app\model;


use think\Db;
use think\Model;

class userModel extends Model
{
    protected $table = 't_user';


    public  static  function addUser(){

        $user=new userModel;
        $user->save([
            "user_name"=>"顾维钧",
            "age"=>"20",
            "sex"=>"男"
        ]);

}
//    protected $connection = 'db_config';
//    function getUserById()
//    {
//
//        Db::table("t_user")->where("id", 1)->find();
//
//    }

}