<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quests',function(Blueprint $table){
            $table->increments('quest_id');
            $table->integer('assigning_member_id');
            $table->integer('assigned_member_id');
            $table->char('title',45)->nullable()->default(NULL);
            $table->char('body',500)->nullable()->default(NULL);
            $table->integer('point')->nullable()->default(NULL);
            $table->timestamp('completed_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('quests');
    }
}
