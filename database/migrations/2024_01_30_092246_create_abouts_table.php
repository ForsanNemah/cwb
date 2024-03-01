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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();

            $table->string('title1');
            $table->text('paragraph1');
            $table->string('title2');
            $table->longText('paragraph2');
            $table->string('director_name');
            $table->string('director_image');
            $table->string('director_info');
            $table->integer('hospital_rooms'); //عدد غرف العيادة
            $table->integer('year_of_experience'); //عدد سنوات  الخبرة
            $table->integer('happy_patients'); //عدد المرضى السعداء
            $table->integer('qualified_doctor'); //عدد الاطباء المؤهلين
            $table->string('video'); //رابط الفيديو
            $table->string('video_bg'); //خلفية ايقونه الفيديو
            $table->foreignId('language_id')->constrained()->cascadeOnDelete();
            $table->foreignId('team_id')->constrained()->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
