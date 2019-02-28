<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Paper;

//试卷控制器
class PaperController extends Controller
{
    //试卷列表
    public function index(){
    	//获取数据
    	$data=Paper::get();
    	//展示视图
    	return view('admin.paper.index',compact('data'));
    }
}
