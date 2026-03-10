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
        Schema::create('trucks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dispatcher_id')->constrained()->cascadeOnDelete();
           $table->string('truck_number',50);
            $table->string('driver_name', 100);
           $table->string('driver_phone',20);
            $table->enum('equipment_type', ['dry_van', 'flatbed', 'reefer', 'step_deck']);
            $table->string('current_location', 255);
            $table->decimal('current_lat', 10, 8)->nullable();
            $table->decimal('current_lng', 11, 8)->nullable();
            $table->dateTime('available_from');
            $table->enum('status', ['available', 'booked', 'in_transit', 'offline'])->default('available');
            $table->integer('max_weight');
        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trucks');
    }
};
