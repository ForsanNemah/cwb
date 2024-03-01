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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();

            $table->string('name')->require(); //اسم الموقع
            $table->string('email')->require()->unique(); //البريد الالكتروني
            $table->string('address')->require(); // العنوان

            $table->string('short_des_footer')->require(); // وصف قصير يعرض نهاية الموقع

            $table->string('phone1')->require(); //رقم الهاتف
            $table->string('phone2')->require(); //رقم الهاتف

            $table->string('logo')->require(); //شعار الموقع
            $table->string('icon')->require(); //أيقونة  الموقع

            $table->string('facebook')->require(); //رابط صفحة الفيسبوك
            $table->string('instagram')->require(); //رابطصفحة الانستجرام
            $table->string('twitter')->require(); //رابط صفحة تويتر
            $table->string('pinterest')->require(); //رابط صفحة pinterest

            $table->longText('google_map')->require(); //خريطة جوجل


            $table->foreignId('language_id')->constrained()->cascadeOnDelete(); //اللغة
            $table->foreignId('team_id')->constrained()->cascadeOnDelete();
            $table->boolean('block')->default(true); //هل الموقع مفعل او لا

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
