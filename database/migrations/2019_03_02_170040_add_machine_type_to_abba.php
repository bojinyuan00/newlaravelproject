<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMachineTypeToAbba extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('abc',function($table){  
            $table->integer('aaa');  
            $table->string('sss',100);  
            $table->string('ddd',100); 
         }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('abc', function (Blueprint $table) {
            //
        });
    }
}
