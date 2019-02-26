<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use APP\Admin\Course;

class Course extends Controller
{
    //课程列表
    public function index(){

    	//获取数据
    	$data=Course::orderBy('sort','desc')->get();
    	//展示视图
    	return view('admin.course.index',compact('data'));
    }
}
