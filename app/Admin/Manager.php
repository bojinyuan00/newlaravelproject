<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;//使用trait

class Manager extends Model implements \Illuminate\Contracts\Auth\Authenticatable//(因为这个目录下的文件下的方法为抽象，所以转到上述的方法目录类之内)
{
    //定义当前模型需要关联的数据表
    protected $table='manager'; 
    //使用trait，就相当于将整个trait代码复制到这个位置
    use Authenticatable;

    //定义与角色模型的关联操作
    public function role(){
    	return $this->hasOne('App\Admin\Role','id','role_id');
    }
    
}
