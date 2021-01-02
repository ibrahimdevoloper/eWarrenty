<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CarProperty extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_properties', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar',15);
            $table->string('name_en',15);
            // $table->integer('capacity');
            // $table->integer('cca_ampere');
            // $table->decimal('weight',3,3);
            // $table->foreignId('terminal_id')->constrained();
            // $table->string('dimensions',100);
            // $table->string('discription',190)->Nullable();
            // $table->foreignId('manufacturing_country_id')->constrained();
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
