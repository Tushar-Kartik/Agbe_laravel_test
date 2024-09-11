<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->date('dob');
            $table->string('mobile_number', 15); 
            $table->string('password');
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('state_id');
            $table->unsignedBigInteger('city_id');
            $table->string('locality');
            $table->string('pincode',8);

            
            $table->foreign('country_id')->references('country_id')->on('country')->onDelete('cascade');
            $table->foreign('city_id')->references('city_id')->on('city')->onDelete('cascade');
            $table->foreign('state_id')->references('state_id')->on('state')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
