<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_order', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pid');
            $table->integer('uid');
            $table->integer('type');
            $table->string('start_date');
            $table->string('end_date');
            $table->integer('divers');
            $table->integer('money');
            $table->integer('is_paid');
            $table->string('paytime');
            $table->string('discount');
            $table->string('need_pay');
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
        Schema::drop('user_order');
    }
}
