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
        Schema::create('ultrasound_exams', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->date('date_of_ultrasound');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('type_of_ultrasound', 50); // e.g., "Transrectal", "Transabdominal"
            $table->decimal('prostate_volume', 5, 2)->nullable(); // Adjust precision as needed
            $table->text('anatomical_features')->nullable();
            $table->text('lesion_characteristics')->nullable();
            $table->text('fluid_presence')->nullable();
            $table->text('vascularity')->nullable();
            $table->text('composite_findings')->nullable();
            $table->text('recommendations')->nullable();
            $table->timestamps();

            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ultrasound_exams');
    }
};
