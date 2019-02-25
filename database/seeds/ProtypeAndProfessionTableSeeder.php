<?php

use Illuminate\Database\Seeder;

class ProtypeAndProfessionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //创建两个数据表的模拟数据
         //产生faker数据实例
        $faker = \Faker\Factory::create('zh_CN');//选用中国地域信息
        
    }
}
