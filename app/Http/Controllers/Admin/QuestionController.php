<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Question;
use Excel;//引入excel类
//试题控制器
class QuestionController extends Controller
{
    //试卷列表
    public function index(){
    	//获取数据
    	$data=Question::get();
    	//展示视图
    	return view('admin.question.index',compact('data'));
    }


    //定义导出方法
    public function export(){
    	//excel表格数据的数据内容，第一行未表头
    	$cellData = [
            ['序号','题干','所属试卷','分值','选项','正确答案','添加时间'],
            
        ];
        //查询数据
        $data=Question::all();
        foreach ($data as $key => $value) {
        	$cellData[]=[
        		$value->id,//序号
        		$value->question,//题干
        		$value->paper->paper_name,//所属试卷
        		$value->score,//分值
        		$value->options,//分值
        		$value->answer,//正确答案
        		$value->created_at,//添加时间

        	];
        }
        // dd($cellData);
        //使用excel('文件名')
        Excel::create('试题',function($excel) use ($cellData){
        	//在此处就可以使用ceeldata
            $excel->sheet('score', function($sheet) use ($cellData){
            	//写入行数据
                $sheet->rows($cellData);
            });
        })->export('xls');
    }
}
