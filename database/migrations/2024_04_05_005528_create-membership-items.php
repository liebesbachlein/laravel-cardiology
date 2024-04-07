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
        Schema::create('membership_items', function (Blueprint $table) {
            $table->id();
            $table->string('last_name', length: 255);
            $table->string('first_name', length: 255);
            $table->string('patro_name', length: 255)->nullable();
            $table->string('email', length: 255);
            $table->string('phone_number', length: 255);
            $table->date('date_birth');
            $table->string('place_birth', length: 255);
            $table->string('address', length: 255);
            $table->string('id_doc', length: 255);
            $table->date('date_doc');
            $table->string('place_doc', length: 255);
            $table->text('education');
            $table->text('add_education')->nullable();
            $table->text('experience')->nullable();
            $table->text('interests')->nullable();
            $table->date('date_member');
            $table->string('terms', length: 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('membership_items');
    }
};
