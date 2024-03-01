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
        //السيرة الذاتية للدكتور

        Schema::create('biographies', function (Blueprint $table) {
            $table->id();
            $table->text('biography'); //السيرةالذاتية
            $table->foreignId('doctor_id')->constrained()->cascadeOnDelete(); //
            $table->foreignId('team_id')->constrained()->cascadeOnDelete();
            $table->boolean('block')->nullable()->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biographies');
    }
};
