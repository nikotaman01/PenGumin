<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items',function(Blueprint $table){
            $table->increments('item_id');
            $table->integer('member_id');
            $table->char('product_id',255);
            $table->text('name');
            $table->char('price',45);
            $table->char('picture',100)->nullable()->default(NULL);
            $table->timestamp('did_get');
            $table->timestamp('did_approve');
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
        Schema::drop('items');
    }
}
