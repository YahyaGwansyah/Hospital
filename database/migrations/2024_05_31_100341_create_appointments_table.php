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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('patient_id')->references('patients')->constrained('patients')->onDelete('cascade');
            // $table->foreignId('doctor_id')->references('doctors')->constrained('doctors')->onDelete('cascade');
            // $table->foreignId('room_id')->references('rooms')->constrained('rooms')->onDelete('cascade');
            // $table->date('appointment_date');
            // $table->enum('status', ['paid', 'pending']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
