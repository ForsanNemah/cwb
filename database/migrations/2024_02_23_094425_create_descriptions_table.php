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
        Schema::create('descriptions', function (Blueprint $table) {
            $table->id();

            $table->text('home');
            $table->text('department');
            $table->text('appointment');
            $table->text('doctor');
            $table->text('gallery');
            $table->text('people_say');
            $table->text('blog');
            $table->text('connect');
            $table->boolean('block')->nullable()->default(false);
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
        Schema::dropIfExists('descriptions');
    }
};
