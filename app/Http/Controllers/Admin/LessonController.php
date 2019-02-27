<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Lesson;
use Input;

class LessonController extends Controller
{
    //课程点播列表
    public function index(){
    	//获取数据
    	$data=Lesson::get();
    	//展示视图
    	return view('admin.lesson.index',compact('data'));
    }

    //课程列表
    public function play(){
    	//获取播放的视频id
    	$id=Input::get('id');
    	$addr=Lesson::where('id',$id)->value('video_addr');
    	// dd($video_addr);
    	//播放视频
    	return "<video src=\"$addr\" controls='controls' height=95% width=98%>您的浏览器不支持 video 标签。</video>";
    }
}
