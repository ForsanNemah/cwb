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

        //مواعيد دوام العيادة
        Schema::create('weekly_timetables', function (Blueprint $table) {
            $table->id();
            $table->string('day');
            $table->string('for_hour');
            $table->string('to_hour');
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
        Schema::dropIfExists('weekly_timetables');
    }
};
