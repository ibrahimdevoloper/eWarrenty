<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Market extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('markets', function (Blueprint $table) {
            $table->id();
            $table->string('name_en',30);
            $table->string('name_ar',30);
            $table->string('email',50)->nullable();
            $table->string('phone_number',50)->nullable();
            $table->string('country',50);
            $table->string('address',191);
            $table->string('username',30)->nullable();
            $table->string('password',30)->nullable();
            
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
