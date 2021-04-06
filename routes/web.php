<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Route::get('user/add','UserController@add');
//
////用户执行添加路由
//Route::post('user/store','UserController@store');

//验证码路由
Route::get('/code/captcha/{tmp}','Admin\LoginController@captcha');

Route::group(['prefix'=>'admin','namespace'=>'Admin'],function() {
//后台登录路由
    Route::get('login','LoginController@login');
//验证码路由
    Route::get('code','LoginController@code');
//处理后台登录的路由
    Route::post('dologin','LoginController@doLogin');
//加密算法
    Route::get('jiami','LoginController@jiami');
});

//没有权限的
Route::get('noaccess','Admin\LoginController@noaccess');


//
Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>['hasRole','isLogin']],function (){
    //后台首页
    Route::get('index','LoginController@index');
//后台欢迎页
    Route::get('welcome','LoginController@welcome');
//后台推出登录路由
    Route::get('logout','LoginController@logout');

    //    后台用户模块相关路由
//    给用户授权相关路由
    Route::get('user/auth/{id}','UserController@auth');
    Route::post('user/doauth','UserController@doAuth');

    //修改用户状态 停用  启用
    Route::post('user/changestatus','UserController@changestatus');

    //删除所有选中用户路由
    Route::get('user/del','UserController@delAll');
    Route::resource('user','UserController');


    //角色模块
    //角色授权路由
    //处理授权路由
    Route::resource('role','RoleController');
    Route::get('role/auth/{id}','RoleController@auth');
    Route::post('role/doauth','RoleController@doAuth');
    Route::get('role/del','RoleController@delAll');

    //权限模块路由
    Route::resource('permission','PermissionController');
//分类路由
    //修改排序
    Route::post('cate/changeorder','RoleController@changeOrder');
    Route::resource('cate','CateController');

    //文章模块路由
    //上传路由
    //将markdown语法的内容转化为html语法的内容
    Route::post('article/pre_mk','ArticleController@pre_mk');
//    文章缩略图上传路由
    Route::post('article/upload','ArticleController@upload');
//    文章添加到推荐位路由
    Route::get('article/recommend','ArticleController@recommend');
    Route::resource('article','ArticleController');

});

