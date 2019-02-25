<?php

use Illuminate\Database\Seeder;

class MemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //产生faker数据实例
        $faker = \Faker\Factory::create('zh_CN');//选用中国地域信息
        //循环产生500条数据
        $data = [];
        for($i=0; $i<500; $i++){
        	$data[] = [
	        	'username'  => $faker -> username,//生成用户名
		        'password'  => bcrypt('password'),//使用框架的内置方法来加密密码
		        'gender'    =>rand(1,3),//性别随机
		        'mobile'    =>$faker -> phoneNumber,//生成手机号
		        'email'     =>$faker -> email,//生成邮箱
		        'avatar'	=>'/statics/avatar.jpg',//生成邮箱
		        'created_at'=>date('Y-m-d H:i:s',time()),//创建时间
		        'type'    =>rand(1,2),//账号身份
		        'status'    =>rand(1,2),//账号状态
	        ];
        }
        //采用DB，门面写入到数据库
    	DB::table('member')->insert($data); 
    }
}
