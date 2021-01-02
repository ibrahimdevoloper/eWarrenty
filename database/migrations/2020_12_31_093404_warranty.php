<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Warranty extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
            for random code 
            $length = 10;    
            echo substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,$length);

            for 6 digits it can give 2.25 million code
        */

        Schema::create('warranties', function (Blueprint $table) {
            $table->id();
            $table->dateTime('bought_date');
            $table->string('battery_serial_number',50);
            $table->string('warranty_code',7)->unique();
            $table->string('car_number',15);
            $table->string('customer_phone_number',50)->Nullable();
            $table->string('customer_address',200);
            $table->string('customer_country',50);
            $table->string('customer_email',50)->Nullable();
            $table->string('customer_name',50);
            $table->string('car_number_image');
            $table->string('battery_front_image');
            $table->string('fixed_battery_image');
            $table->string('notes',190)->nullable();
            $table->foreignId('battery_model_id')->constrained("batteries");
            $table->foreignId('car_property_id')->constrained("car_properties");
            $table->foreignId('market_id')->constrained("markets");
            $table->foreignId('car_type_id')->constrained("car_types");
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
