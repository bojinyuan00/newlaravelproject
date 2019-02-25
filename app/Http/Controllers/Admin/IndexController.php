<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Cache;

class IndexController extends Controller
{
    //后台首页
    public function index(){
    	return view('admin.index.index');
    }

    //后台首页-框架页面
    public function welcome(){
    	return view('admin.index.welcome');
    }
}
