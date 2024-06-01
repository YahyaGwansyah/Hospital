<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('queues', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('patient_id');
            // $table->unsignedBigInteger('doctor_id');
            // $table->dateTime('appointment_time');
            // $table->string('status')->default('pending');
            // $table->timestamps();
            // $table->foreign('patient_id')->references('patients')->on('patients')->onDelete('cascade');
            // $table->foreign('doctor_id')->references('doctors')->on('doctors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('queues');
    }
};
