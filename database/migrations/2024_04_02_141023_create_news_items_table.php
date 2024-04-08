<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('news_items', function (Blueprint $table) {
            $table->string('id', length: 255)->primary();
            $table->string('phrase', length: 255);
            $table->date('date_published');
            $table->string('title', length: 255);
            $table->string('summary', length: 1000);
            $table->text('content');
            $table->string('file')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        //
    }
    
};
