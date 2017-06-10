<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\Route;

//首页
Route::rule('/','front/Index/index');
//登录
Route::rule('/login','front/Index/login');

//后台
/*
//员工控制器
Route::controller('staff','admin/Staff');
//角色控制器
Route::controller('role','admin/Role');
//菜单控制器*/
//Route::controller('menu','api/Menu');



$uri = $_SERVER['PATH_INFO'];
$uriArr = explode('/', trim($uri, '/'));
Route::group($uriArr[0], [
    $uriArr[1] => ['api'.$uri],
]);