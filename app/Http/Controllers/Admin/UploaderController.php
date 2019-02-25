<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Member;//引入会员表模型
use Input;
use DB;
use Storage; //引入storage门面

class UploaderController extends Controller
{
	//处理异步请求过来的图片(本地)
	public function webuploader(Request $request){
		//判断是否有文件上传成功
		if($request->hasFile('file') && $request->file('file')->isValid()){//有文件并且成功
			// dd('nihao');
			//有文件上传
			$filename = sha1(time() . $request -> file('file') -> getClientOriginalName()) . '.' . $request -> file('file') -> getClientOriginalExtension();//重命名
			//文件路径
			$path=$request->file('file')->path();
			//文件保存.移动
			Storage::disk('public')->put($filename,file_get_contents($path));


			//返回数据
			$result=[
				'code' =>'1',//成功状态码
				'msg'  =>'文件上传成功',//提示信息
				'path' =>'/storage/'.$filename,//路径
			];

			
		}else{
			//返回值
			$result = [
				'code' =>'101',
				'msg'  =>$result->file('file')->getErrorMessage(),
			];

		}
		// dd($result);
		//返回信息
		// return response->json($result);
		return response()->json($result);
	}

	//处理异步请求过来的图片（七牛）
	public function qiniu(Request $request){
		//判断是否有文件上传成功
		if($request->hasFile('file') && $request->file('file')->isValid()){//有文件并且成功
			// dd('nihao');
			//有文件上传
			$filename = sha1(time() . $request -> file('file') -> getClientOriginalName()) . '.' . $request -> file('file') -> getClientOriginalExtension();//重命名
			//文件路径
			$path=$request->file('file')->path();
			//文件保存.移动
			Storage::disk('qiniu')->put($filename,file_get_contents($path));
			//获取下载地址
			$qiniupath=Storage::disk('qiniu')->getDriver()->downloadUrl($filename);              

			//返回数据
			$result=[
				'code' =>'1',//成功状态码
				'msg'  =>'文件上传成功',//提示信息
				'path' =>$qiniupath,//路径
			];

			
		}else{
			//返回值
			$result = [
				'code' =>'101',
				'msg'  =>$result->file('file')->getErrorMessage(),
			];

		}
		// dd($result);
		//返回信息
		// return response->json($result);
		return response()->json($result);
	}


}


