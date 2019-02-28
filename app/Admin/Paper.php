<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    //定义关联的表
    public $table='paper';


     //定义关联操作
    public function course(){
    	return $this->hasOne('App\Admin\Course','id','course_id');
    }
}
