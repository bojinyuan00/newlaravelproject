<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Member;//引入会员表模型
use Input;
use DB;

class MemberController extends Controller
{
    //会员列表的展示
    public function index(){
    	$data=Member::get();
    	// dd($data);
    	return view('admin.member.index',compact('data'));
    }


    //添加会员
    public function add(){
    	 if(Input::method() == 'POST'){
            // dd('nihao');
            // 'avatar'       =>'/statics/avatar.jpg',
    	 	$result=Member::insert([
                'username'     =>Input::get('username'),
                'password'     =>bcrypt('password'),
                'gender'       =>Input::get('gender'),
                'mobile'       =>Input::get('mobile'),
                'email'        =>Input::get('email'),
                'avatar'       =>Input::get('avatar'),
                'province_id'  =>Input::get('province_id'),
                'city_id'      =>Input::get('city_id'),
                'county_id'    =>Input::get('county_id'),
                'zhen_id'      =>Input::get('zhen_id'),
                'type'         =>Input::get('type'),
                'status'       =>Input::get('status'),
                'created_at'   =>date('Y-m-d H:i:s'),
                'updated_at'   =>date('Y-m-d H:i:s')
            ]);
            return $result ? 1 : 0;
    	 }else{
            $provinces=DB::table('area')->where('pid','0')->get();
            // dd($provinces);
    	 	return view('admin.member.add',compact('provinces'));//渲染视图
    	 }
    }

    //ajax四级联动获取下属地区
    public function getAreaById(){
        //接收id
        $id=Input::get('id');
        //根据id去查询下属地区
        $data=DB::table('area')->where('pid',$id)->get();
        return response()->json($data);
    }
}
