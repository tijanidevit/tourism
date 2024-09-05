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
        Schema::create('destination_visits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('destination_id')->constrained('destinations')->cascadeOnDelete();
            $table->date('date_of_visit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destination_visits');
    }
};
