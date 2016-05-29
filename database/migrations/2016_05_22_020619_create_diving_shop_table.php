<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDivingShopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diving_shop', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->string('location_info');
            $table->string('equipment_desc');
            $table->string('transport');
            $table->string('transfers');
            $table->string('checkin_time');
            $table->integer('extra_cost');
            $table->string('before_file');
            $table->integer('non_diving_activities');
            $table->integer('physically_disabled_divers');
            $table->string('destination');
            $table->string('legal_name');
            $table->string('billing_address');
            $table->string('actual_address');
            $table->string('tax_number');
            $table->string('phone');
            $table->string('skype');
            $table->string('email');
            $table->string('whatsapp');
            $table->string('website');
            $table->integer('num_of_master');
            $table->integer('num_of_boat');
            $table->string('nitrox');
            $table->string('Distance to the Nearest Deco Chamber');
            $table->string('location_x');
            $table->string('location_y');
            $table->string('payment_method');
            $table->string('dive_types');
            $table->string('infrastructure');
            $table->string('seasonality ');
            $table->string('documents_required');
            $table->string('currency');
            $table->string('contact_manager');
            $table->string('main_image');
            $table->string('logo');
            $table->string('cancellation_policies');
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
        Schema::drop('diving_shop');
    }
}
