<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vaccinations', function (Blueprint $table): void {
            $table->id();
            $table->string('patient_name');
            $table->string('purok');
            $table->string('vaccine');
            $table->string('dose'); // e.g. 1st dose, Booster
            $table->date('scheduled_at');
            $table->string('status'); // Scheduled, Done, Overdue
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vaccinations');
    }
};
