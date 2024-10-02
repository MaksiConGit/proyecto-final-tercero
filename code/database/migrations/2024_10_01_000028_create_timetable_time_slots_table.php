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
        Schema::create('timetable_time_slots', function (Blueprint $table) {
            $table->id();
            $table->foreignId('timetable_id')->constrained()
                                        ->onDelete('restrict')
                                        ->onUpdate('cascade');
            $table->foreignId('time_slot_id')->constrained()
                                        ->onDelete('restrict')
                                        ->onUpdate('cascade');
            $table->boolean('is_deleted')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timetable_time_slots');
    }
};
