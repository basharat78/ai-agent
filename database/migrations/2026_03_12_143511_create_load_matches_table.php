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
        Schema::create('load_matches', function (Blueprint $table) {
            $table->id();
             $table->foreignId('load_id')->constrained()->onDelete('cascade');
            $table->foreignId('truck_id')->constrained()->onDelete('cascade');
            $table->foreignId('dispatcher_id')->constrained()->onDelete('cascade');
            $table->decimal('match_score', 5, 2);
            $table->text('match_reason')->nullable();
            $table->enum('status', ['pending', 'calling', 'confirmed', 'rejected', 'cancelled'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('load_matches');
    }
};
