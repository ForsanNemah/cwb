<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    //تخصصات الدكاترة
    public function up(): void
    {
        Schema::create(
            'specialities',
            function (Blueprint $table) {
                $table->id();
                $table->string('speciality'); //التخصص
                $table->foreignId('doctor_id')->constrained()->cascadeOnDelete(); //
                $table->boolean('block')->nullable()->default(false);
                $table->foreignId('team_id')->constrained()->cascadeOnDelete();
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('specialities');
    }
};
