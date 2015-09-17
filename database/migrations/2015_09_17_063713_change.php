<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Change extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('members',function($table){
            $table->string('password',60);
            $table->string('remember_token',100)->nullable()->default(NULL);
        });
        Schema::table('items', function($table)
        {
            $table->dropColumn(['password', 'remember_token']);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
