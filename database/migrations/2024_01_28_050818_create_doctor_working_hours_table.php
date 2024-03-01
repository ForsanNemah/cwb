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
        //جدول مواعيد عمل الدكتور
        Schema::create('doctor_working_hours', function (Blueprint $table) {
            $table->id();

            $table->string('day'); //اليوم
            $table->string('for_hour'); //من الساعه
            $table->string('to_hour'); //الى الساعه
            $table->foreignId('doctor_id')->constrained()->cascadeOnDelete(); //
            $table->boolean('block')->nullable()->default(false);
            $table->foreignId('team_id')->constrained()->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_working_hours');
    }
};
