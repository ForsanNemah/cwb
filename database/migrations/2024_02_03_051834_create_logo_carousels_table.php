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
        //عرض شعارات العيادة
        Schema::create('logo_carousels', function (Blueprint $table) {
            $table->id();
            $table->string('logo');
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
        Schema::dropIfExists('logo_carousels');
    }
};
