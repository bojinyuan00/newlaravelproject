<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });


//后台路由
Route::group(['prefix'=>'admin'],function(){
	// Route::get('test1','home\TestController@test');//后台登录页面
	Route::get('public/login','Admin\PublicController@login')->name('login');//后台登录页面
	Route::post('public/check','Admin\PublicController@check');//后台登录页面
	Route::get('public/logout','Admin\PublicController@logout');//后台登出路由
	
	// Route::get('index/index','Admin\IndexController@index')->middleware('auth:admin');//后台首页
	// Route::get('index/welcome','Admin\IndexController@welcome')->middleware('auth:admin');//后台首页

	

});

//后台路由(需要权限判断)
// Route::group(['prefix'=>'admin','middleware'=>'auth:admin'],function(){
Route::group(['prefix'=>'admin','middleware'=>['auth:admin','checkrbac']],function(){
	Route::get('manager/index','Admin\ManagerController@index');//后台管理员列表页

	//后台首页模块
	Route::get('index/index','Admin\IndexController@index');//后台首页
	Route::get('index/welcome','Admin\IndexController@welcome');//后台首页

	//后台的权限模块
	Route::get('auth/index','Admin\AuthController@index');//后台权限首页
	Route::any('auth/add','Admin\AuthController@add');//后台权限添加
	Route::post('auth/del','Admin\AuthController@del');//后台权限删除

	//角色的管理模块
	Route::get('role/index','Admin\RoleController@index');//后台角色列表
	Route::any('role/assign','Admin\RoleController@assign');//后台角色权限分配

	//会员的管理模块
	Route::get('member/index','Admin\MemberController@index');//会员列表页
	Route::any('member/add','Admin\MemberController@add');//会员添加页
	Route::post('uploader/webuploader','Admin\UploaderController@webuploader');//异步上传(本地路由方法)
	Route::post('uploader/qiniu','Admin\UploaderController@qiniu');//七牛上传(路由方法)
	Route::get('member/getareabyid','Admin\MemberController@getAreaById');//会员添加页


	//专业分类 与 专业管理路由
	Route::get('protype/index','Admin\ProtypeController@index');//专业分类列表
	Route::get('profession/index','Admin\ProfessionController@index');//专业列表


	//课程与点播课程的路由管理
	Route::get('course/index','Admin\CourseController@index');//课程列表
	Route::get('lesson/index','Admin\LessonController@index');//点播列表
	Route::get('lesson/play','Admin\LessonController@play');//视频列表

	//试卷、试题的列表
	Route::get('paper/index','Admin\PaperController@index');//试卷列表
	Route::get('question/index','Admin\QuestionController@index');//试题列表
	Route::get('question/export','Admin\QuestionController@export');//试题导出
	Route::any('question/import','Admin\QuestionController@import');//试题导入




});