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
        Schema::create('psas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->date('date_of_test');
            $table->decimal('psa_level', 8, 2); // Adjust precision and scale as needed
            $table->string('reference_range', 50); 
            $table->integer('age');
            $table->string('race_ethnicity', 50);
            $table->text('family_history')->nullable();
            $table->text('medical_history')->nullable();
            $table->text('medications')->nullable();
            $table->text('symptomatology')->nullable();
            $table->text('follow_up_recommendations')->nullable();
            $table->timestamps();

            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('psas');
    }
};
