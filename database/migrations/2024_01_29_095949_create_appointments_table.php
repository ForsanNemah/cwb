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
        //جدول الحجوزات والمواعيد
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->date('booking_date'); //تاريخ الحجز
            $table->text('message');
            $table->foreignId('department_id')->constrained()->cascadeOnDelete(); //القسم
            $table->foreignId('doctor_id')->constrained()->cascadeOnDelete(); //الدكتور
            $table->foreignId('branch_id')->constrained()->cascadeOnDelete(); //الفر
            $table->foreignId('team_id')->constrained()->cascadeOnDelete();

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
