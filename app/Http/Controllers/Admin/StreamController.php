<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Stream;//引入直播流模型
use Input;

class StreamController extends Controller
{
    //直播流列表展示
    public function index(){
    	$data=Stream::get();
    	//展示视图
    	return view('admin.stream.index',compact('data'));
    }


    //添加直播流
    public function add(){
    	if(Input::method() == 'POST'){
    		//自动验证
    		//数据入表
    		$data = Input::except('_token');
    		//转化时间
    		$data['permited_at'] = strtotime($data['permited_at']);
    		//写入数据表
    		return Stream::insert($data) ? '1' : '0';
    	}else{
    		//展示视图
    		return view('admin.stream.add');
    	}
    }

}
