<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    //定义关联的表
    public $table='profession';


     //定义关联操作
    public function protype(){
    	return $this->hasOne('App\Admin\Protype','id','protype_id');
    }
}
