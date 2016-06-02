<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDivingProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diving_product', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_id');
            $table->integer('position_id');
            $table->string('type');
            $table->string('name');
            $table->string('price');
            $table->timestamp('start_date');
            $table->timestamp('end_date');
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
        Schema::drop('diving_product');
    }
}
