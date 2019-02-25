<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;//引入input
use App\Admin\Auth;//引入权限模型类
use DB;

class AuthController extends Controller
{
    //权限列表
    public function index(){
    	// dd("nihao");
    	//查询全部的数据,可连接自身，查询出上级的名称
    	// $data = Auth::get();
    	$data = DB::table('auth as t1')->leftjoin('auth as t2','t1.pid','=','t2.id')->select('t1.*','t2.auth_name as parent_name')->get();
    	// dd($data);
    	
    	return view('admin.auth.index',compact('data'));
    }

    //添加权限
    public function add(){
    	//判断请求的类型
    	if(Input::method() == 'POST'){
    		//可对前台传过来的数据作为验证
    		//接收数据，并且排除token
    		$data = Input::except('_token');
    		$result = Auth::insert($data);//插入数据
    		//由于框架本身不支持响应布尔值，所以转化一种形式
    		return $result ? '1' : '0';//成功1，失败0
    	}else{
    		//查询父级权限的列表展示
    		$parents = Auth::where('pid','=','0')->get();
    		return view('admin.auth.add',compact('parents'));
    	}
    	
    }

    //删除权限
    public function del(){
    	// dd(Input::get());
    	$id=Input::get('id');
    	$auth=Auth::find($id);
    	$result=$auth->delete();
    	return $result ? '1' : '0';//成功1，失败0
    	// dd($result);
    }
}
