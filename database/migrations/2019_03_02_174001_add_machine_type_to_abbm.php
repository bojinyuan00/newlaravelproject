<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMachineTypeToAbbm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('abc', function($table){
            // $table->dropColumn('votes'); //删除表的字段
            $table->dropColumn('zzz', 'zxc'); //删除多个字段
            // $table->renameColumn('from', 'to');//修改表的字段

        }
    }
}
