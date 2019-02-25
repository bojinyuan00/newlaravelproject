<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Protype;

class ProtypeController extends Controller
{
    //专业分类的列表
    public function index(){
    	//获取数据
    	$data=Protype::get();
    	// dd($data);
    	//展示视图
    	return view('admin.protype.index',compact('data'));
    }
}
