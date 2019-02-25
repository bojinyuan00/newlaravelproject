<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;//用来进行用户认证

class PublicController extends Controller
{
    //登录页面的展示
    public function login(){
        // dd('nihao');
    	//展示视图
    	return view('admin.public.login');
    }

    //登录页面验证数据
    public function check(Request $request){
    	//开始自动验证
    	$this->validate($request,[
    		//验证规则语法 需要验证的字段名=>'验证规则1|验证规则2|...'
    		'username' =>'required|min:2|max:20',
    		'password' =>'required|min:4',
    		'captcha'  =>'required|size:4|captcha'
    	]);
    	// dd("123");
    	$data=$request->only(['username','password']);//用户登录信息获取
    	$data['status']='2';//用户账号状态默认为开启
    	$result=Auth::guard('admin')->attempt($data,$request->get('online'));
        // dd($result);
        // $check=Auth::guard('admin')->check();
        // if(Auth::guard('admin')->check()){
        //     dd($check);
        // }else{
        //     dd("buhao");
        // }
        // $user=Auth::guard('admin')->user();
        // dd($user);
    	// dd($result);
    	//判断是否成功
    	if($result){
            // dd('nihao');
    		return redirect('/admin/index/index');
           // dd("niaho"); 
    	}else{
    		return redirect('/admin/public/login')->withErrors([
    			'loginError'=>'用户名或密码错误',
    		]);
    	}
        // $abc=DB::table('manager')->get();
    }

    //退出登录操作
    public function logout(){
        // dd("nihao");
        // //退出
        Auth::guard('admin')->logout();
        //跳转到登录页面
        return redirect('/admin/public/login');
    }
}
