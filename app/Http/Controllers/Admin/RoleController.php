<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Role;//引入角色模型
use App\Admin\Auth;//引入权限模型类
use DB;
use Input;//引入input

class RoleController extends Controller
{
    //后台角色列表展示
    public function index(){
    	//列表数据
    	$data = Role::get();

    	return view('admin.role.index',compact('data'));
    }

     //后台角色权限分配
    public function assign(){
        // $data = DB::table('auth')->where('pid','=','0')->get();
        //判断请求的类型
        if(Input::method() == 'POST'){
            //接收数据
            $data=Input::only(['id','auth_id']);
            //实例化模型
            $role=new Role;
            $result=$role->assignAuth($data);
            //输出返回的结果
            return $result;

        }else{
            //查询父级权限的列表展示
           $data=Auth::query()->with('auth')->where('pid','=','0')->get()->ToArray();

           //判断当前角色具备的权限的id的集合
           $ids=Role::where('id',Input::get('id'))->value('auth_ids');
           return view('admin.role.assign',compact('data','ids'));
        }




        
        
    }
}
