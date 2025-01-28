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
        Schema::create('dres', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->date('date_of_exam');
            $table->unsignedBigInteger('user_id')->nullable(); 
            $table->text('findings')->nullable();
            $table->boolean('nodule_presence')->default(false);
            $table->boolean('tenderness')->default(false);
            $table->string('symmetry', 50)->nullable(); // e.g., "Symmetrical", "Asymmetrical", "Indeterminate"
            $table->text('patient_symptoms')->nullable();
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
        Schema::dropIfExists('dres');
    }
};
