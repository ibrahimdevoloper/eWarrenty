<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class WarrantyDuration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warranty_durations', function (Blueprint $table) {
            $table->id();
            // $table->integer('capacity');
            // $table->integer('cca_ampere');
            // $table->decimal('weight',6,3);
            // $table->string('number',20);
            // $table->string('info',190)->Nullable();
            // $table->string('dimensions',100);
            // $table->string('description',190)->Nullable();
            // $table->string('image',190);
            // $table->string('front_image',190);
            // $table->string('serial_number_image',190);
            $table->foreignId('battery_id')->constrained("batteries");
            $table->foreignId('car_property_id')->constrained("car_properties");
            $table->integer('duration');
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
        //
    }
}
