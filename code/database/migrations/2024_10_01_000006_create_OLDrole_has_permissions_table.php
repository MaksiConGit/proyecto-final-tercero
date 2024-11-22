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
        Schema::create('OLDrole_has_permissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('OLDrole_id')->constrained()->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('OLDpermission_id')->constrained()->onDelete('restrict')->onUpdate('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('OLDrole_has_permissions');
    }
};
