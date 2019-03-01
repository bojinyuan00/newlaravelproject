<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Question;
use Excel;//引入excel类、
use Input;
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
            $excel->sheet('题目', function($sheet) use ($cellData){
            	//写入行数据
                $sheet->rows($cellData);
            });
        })->export('xls');
    }


    //题目导出
   	public function import(){
   		//判断请求的类型
   		if(Input::method()=='POST'){
   			//数据的导入操作
   			$filePath = 'storage\app\public'. . Input::get('excelpath');//文件的路径
   			// dd(Input::get());
		    Excel::load('storage\app]\public\8edb0e1e9e6f718fe8dfdf11ca98da7d07967b57.xlsx', function($reader) {//加载读取
		        // $data = $reader->all();//这个方法是获取所有的表
		        $data = $reader -> getSheet(0) -> ToArray();
		        echo '<pre>';
		        var_dump($data);die;
		        //先读取全部的数据
		        $temp=[];
		        foreach ($data as $key => $value) {
		        	//排除表头
		        	if($key=='0'){
		        		continue;//跳出本次循环，开始下次循环
		        	}
		        	//此时value为数组
		        	$temp[]=[
		        		'question'=>$value[0],//题干
		        		'paper_id'=>Input::get('paper_id'),//试卷id
		        		'score'=>$value[3],//分数
		        		'options'=>$value[1],//选项
		        		'answer'=>$value[2],//答案
		        		'created_at'=>date('Y-m-d H:i:s')//创建时间
		        	];
		        }
		        //写入数据
		        // echo '<pre>';
		        // var_dump($data);
		        // 
		        $result = Question::insert($temp);
   				echo $result ? '1' : '0';  
		    });   					
   		}else{
   			//先查询出试卷列表
   			$paperlists = \App\Admin\Paper::get();
   			return view('admin.question.import',compact('paperlists'));
   		}
   		
   	}
}
