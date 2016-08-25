<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomMetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_meta', function (Blueprint $table) {
            $table->increments('id');
            $table->string('desc');
            $table->string('value');
            $table->string('type');
            $table->string('position');
            $table->integer('sort');
            $tbale->string('url');
            $table->integer('is_active');
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
        Schema::drop('custom_meta');
    }
}
