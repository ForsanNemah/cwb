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
        //جدول لعرض اقوال الناس
        Schema::create('saying_people', function (Blueprint $table) {
            $table->id();

            $table->string('name'); //الاسم
            $table->string('image'); //الصورةالشخصية
            $table->string('job'); //الوظيفه
            $table->text('content'); //المحتوى
            $table->foreignId('language_id')->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('saying_people');
    }
};
