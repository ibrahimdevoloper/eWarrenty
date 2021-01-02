<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Battery extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batteries', function (Blueprint $table) {
            $table->id();
            $table->integer('capacity');
            $table->integer('cca_ampere');
            $table->decimal('weight',6,3);
            $table->string('number',20);
            $table->string('info',190)->Nullable();
            $table->string('dimensions',100);
            $table->string('description',190)->Nullable();
            $table->string('image');
            $table->string('front_image');
            $table->string('serial_number_image');
            $table->foreignId('terminal_id')->constrained("terminals");
            $table->foreignId('manufacturing_country_id')->constrained("manufacturing_countries");
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
