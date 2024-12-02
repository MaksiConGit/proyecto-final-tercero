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
        Schema::create('institution_principals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('institution_id')->constrained()
                                        ->onDelete('restrict')
                                        ->onUpdate('cascade');
            $table->foreignId('principal_id')->constrained()
                                        ->onDelete('restrict')
                                        ->onUpdate('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institution_principals');
    }
};
