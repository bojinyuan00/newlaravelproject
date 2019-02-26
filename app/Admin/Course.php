<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //定义关联的数据表
    protected $table = 'course';

    //课程关联专业（1V1）
    public function profession(){
    	return $this->hasOne('APP\Admin\Profession','id','profession_id');
    }
}
