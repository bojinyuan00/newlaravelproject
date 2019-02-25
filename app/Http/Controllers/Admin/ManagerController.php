<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Manager;
use Auth;


class ManagerController extends Controller
{
    //管理员列表展示
    public function index(){
    	$data=Manager::get();
    	return view('admin.manager.index',compact('data'));
    }
}
