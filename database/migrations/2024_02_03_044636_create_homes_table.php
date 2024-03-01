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
        //للعرض في أول فقرة بعد السلايدر في الصفحة الرئيسية
        Schema::create('homes', function (Blueprint $table) {
            $table->id();
            $table->string('title1');
            $table->text('paragraph1');
            $table->string('image1');

            $table->string('title2');
            $table->text('paragraph2');
            $table->string('image2');

            $table->string('title3');
            $table->text('paragraph3');
            $table->string('image3');
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
        Schema::dropIfExists('homes');
    }
};
