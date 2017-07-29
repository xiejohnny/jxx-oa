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

//接口
$uri = $_SERVER['PATH_INFO'];
$uriArr = explode('/', trim($uri, '/'));
if(request()->method() == 'POST'){
    Route::group($uriArr[0], [
        $uriArr[1] => ['api'.$uri],
    ]);
}



//Route::miss('public/miss');

//前端
/*
if(request()->method() == 'GET') {
    Route::rule('/$', function () {
        include APP_PATH . 'front/view/index.html';
        exit;
    });
    Route::rule(':name$', function ($name) {
        load_view($name);
    });
    Route::rule(':path/:name$', function ($path, $name) {
        load_view($path.'/'.$name);
    });
}
*/