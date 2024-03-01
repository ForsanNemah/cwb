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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();


            $table->string('name'); //الاسم
            $table->string('email'); //البريد الالكتروني
            $table->string('image'); //الصورة الشخصية
            $table->string('phone'); //رقم الهاتف
            $table->string('address')->require(); //العنوان
            $table->string('speciality')->require(); //تخصص الدكتور في العيادة(وظيفته )
            $table->foreignId('department_id')->constrained()->cascadeOnDelete(); //القسم
            $table->foreignId('branch_id')->constrained()->cascadeOnDelete(); //عالفر
            //روابط التواصل الاجتماعي
            $table->string('instagram')->require();
            $table->string('facebook')->require();
            $table->string('twitter')->require();
            $table->string('pinterest')->require(); //رابط صفحة pinterest
            $table->string('dribbble')->require(); //رابط صفحة dribbble

            $table->string('experience')->require(); //الخبرة
            $table->string('types_of')->require(); //دوام كامل
            $table->foreignId('language_id')->constrained()->cascadeOnDelete(); //اللغة
            $table->foreignId('team_id')->constrained()->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
