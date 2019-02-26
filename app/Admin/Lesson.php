<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    //定义关联的数据表
    protected $table = 'lesson';

    //关联点播关联课程
    public function course(){
    	return $this->hasOne('App\Admin\Course','id','course_id');
    }
}
