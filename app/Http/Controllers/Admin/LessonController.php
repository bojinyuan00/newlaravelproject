<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LessonController extends Controller
{
    //课程点播列表
    public function index(){
    	return view('admin.lesson.index');
    }

    //课程列表
    public function play(){
    	return view('admin.lesson.play');
    }
}
