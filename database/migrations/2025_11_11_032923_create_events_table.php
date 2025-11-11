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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('title_en')->nullable();
            $table->text('desc')->nullable();
            $table->text('desc_en')->nullable();
            $table->string('location');
            $table->string('location_en')->nullable();
            $table->string('location_url')->nullable();
            $table->date('date');
            $table->time('time')->nullable();
            $table->boolean('is_shown')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
