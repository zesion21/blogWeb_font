<?php


namespace app\controller;


use app\model\userModel;
use app\Result\Result;
use think\Controller;
use think\Db;

class User extends  Controller
{
  function  getAll(){
//      userModel::addUser();
      $res= Db::query('select * from t_user');
      return Result::success( $res);
  }

  function  hello(){
      return "hello";
  }
}