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
        Schema::create('loads', function (Blueprint $table) {
            $table->id();
               $table->string('source', 50); // truckstop, dat, etc.
            $table->string('external_id', 100);
            $table->string('broker_name', 100);
            $table->string('broker_phone', 20);
            $table->string('broker_email', 100)->nullable();
            $table->string('origin_city');
            $table->string('origin_state');
            $table->string('destination_city');
            $table->string('destination_state');
            $table->decimal('origin_lat', 10, 8)->nullable();
            $table->decimal('origin_lng', 11, 8)->nullable();
            $table->date('pickup_date');
            $table->string('equipment_type', 50);
            $table->integer('weight');
            $table->decimal('rate', 10, 2)->nullable();
            $table->decimal('rate_per_mile', 6, 2)->nullable();
            $table->integer('distance_miles')->nullable();
            $table->string('commodity', 255)->nullable();
            $table->decimal('ai_score', 5, 2)->nullable();
            $table->enum('status', ['fetched', 'matched', 'calling', 'confirmed', 'rejected', 'expired'])->default('fetched');
            $table->timestamp('fetched_at')->useCurrent();
            $table->timestamps();
            
            $table->unique(['source', 'external_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loads');
    }
};
