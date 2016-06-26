 <?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDivingPositionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diving_position', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('location');
            $table->string('location_x');
            $table->string('location_y');
            $table->string('dive_method');
            $table->string('water_temparate');
            $table->string('depth');
            $table->string('dive_types');
            $table->string('visibility');
            $table->string('best_dive_period');
            $table->string('description');
            $table->string('what_to_see');
            $table->string('country');
            $table->string('province');
            $table->string('city');
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
        Schema::drop('diving_position');
    }
}
