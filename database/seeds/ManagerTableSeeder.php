<?php

use Illuminate\Database\Seeder;

class ManagerTableSeeder extends Seeder
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
        //循环产生数据
        $data = [];
        //循环生成数据
        for($i=0;$i<100;$i++){
        	 //通过访问具体的属性来获取数据
	        $data[] = [
	        	'username'  => $faker->username,//生成用户名
	        	'password'  => bcrypt('123456'),//使用框架的内置方法来加密密码
	        	'gender'    =>rand(1,3),//性别随机
	        	'mobile'    =>$faker->phoneNumber,//生成手机号
	        	'email'     =>$faker->email,//生成邮箱
	        	'role_id'   =>rand(1,6),//角色id
	        	'created_at'=>date('Y-m-d H:i:s',time()),//创建时间
	        	'status'    =>rand(1,2),//账号状态
	        ];
        }
        //采用DB，门面写入到数据库
    	DB::table('manager')->insert($data);
    }
    
}
