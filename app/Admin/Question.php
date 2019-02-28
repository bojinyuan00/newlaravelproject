<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //定义关联的表
    public $table='question';


     //定义关联操作
    public function paper(){
    	return $this->hasOne('App\Admin\Paper','id','paper_id');
    }
}
