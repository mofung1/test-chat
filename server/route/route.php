<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use think\facade\Route;

Route::get('think', function () {
    return 'hello,ThinkPHP5!';
});

//Route::get('hello/:name', 'index/hello');
Route::domain('index','index');

//Route::domain('index', function () {
//    // 动态注册域名的路由规则
//    Route::rule('test', 'index/hello');
//    Route::rule('check','index/checkSql');
//    Route::rule('testBehavior','index/testBehavior');
//    Route::bind('index');
//});

return [

];
