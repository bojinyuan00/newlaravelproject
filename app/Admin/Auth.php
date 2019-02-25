<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Auth extends Model
{
    //定义关联的数据表
    protected $table = 'auth';
    //禁用时间，因为权限表内没有时间字段
    public $timestamps = false;

    //关联自身
    public function auth(){
    	return $this->hasMany('App\Admin\Auth','pid','id');
    }
}
