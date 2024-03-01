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
        //جدول الفروع
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('name'); //اسم الفرع
            $table->string('image'); //صورة الفرع
            $table->string('email'); //البريد
            $table->string('phone'); //رقم الهاتف
            $table->string('location'); //موقع الفرع
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
        Schema::dropIfExists('branches');
    }
};
