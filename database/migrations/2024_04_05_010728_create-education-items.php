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
        Schema::create('education_items', function (Blueprint $table) {
            $table->id();
            $table->string('last_name', length: 255);
            $table->string('first_name', length: 255);
            $table->string('patro_name', length: 255)->nullable();;
            $table->string('email', length: 255);
            $table->string('phone_number', length: 255);
            $table->string('speciality', length: 255);
            $table->string('address_home', length: 255);
            $table->string('address_work', length: 255);
            $table->string('picked_month', length: 255);
            $table->string('picked_time', length: 255);
            $table->string('terms', length: 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education_items');
    }
};
