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
        $table->text('description')->nullable();
        $table->string('location');
        $table->dateTime('start_time');
        $table->dateTime('end_time')->nullable();
        $table->integer('capacity');
        $table->decimal('price', 8, 2);
        $table->string('image')->nullable();
        $table->boolean('is_active')->default(true);
        $table->string('organizer_name')->nullable();
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
