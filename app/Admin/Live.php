<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Live extends Model
{
    //定义关联的数据表
    protected $table = 'live';

    //关联专业  一对一
    public function profession(){
    	return $this->hasOne('App\Admin\Profession','id','profession_id');
    }

    //关联直播  一对一
    public function profession(){
    	return $this->hasOne('App\Admin\Profession','id','profession_id');
    }

}
